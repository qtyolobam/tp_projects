const nodemailer = require('nodemailer')
const ncpParticipantModel = require('../Models/ncpParticipantModel');
const ccParticipantModel = require('../Models/ccParticipantModel');
const eventsModel = require('../Models/eventsModel');
const scoreModel = require('../Models/scoreModel');

//Transporter Config
let smtpConfig = {
    host: 'smtp.gmail.com',
    port: 465,
    secure: true, // use SSL
    auth: {
        user: 'rrane230@gmail.com',
        pass: 'kpbulskgyfigselw'
    }
};
let transporter = nodemailer.createTransport(smtpConfig);




//Getting the admin Dashboard
exports.getAdminDashboardPage = async (req,res) => {
    try{

        res.status(200).render('adminDashboard/adminDashboard');
    
    }catch(err){
        return res.status(400).json({
            status:"fail",
            message:"Couldnt Fetch Admin Dashboard!",
            error: err.message  // Include the error message in the response
        });
    }
}


//Getting all the participants in the DB
exports.getAllParticipants = async (req,res)=>{  //Expects  Nothing(GET)
    try{

        const ncpParticipantList = await ncpParticipantModel.find();
        const ccParticipantList = await ccParticipantModel.find();

        res.status(200).json({
            status:"success",
            data:{
                ncpParticipantList,
                ccParticipantList
            }
        });
    }
    catch(err){

        res.status(400).json({
            status:"fail",
            message:err.message,

        });

    }
};


//Adding a participant to the DB(CC OR NCP) 
exports.addParticipant = async (req, res) => {  //  (POST) Expects CC with desired id or ncp details
    try {

        let participantModel;
        let type;
        let reqParticipant;
        const indianPhoneRegex = /^[6-9]\d{9}$/;
        if (req.body.name && req.body.password && req.body.email && req.body.id) {
            participantModel = ccParticipantModel;
            type = "CC";
        } else {
            if(!(indianPhoneRegex.test(req.body.phoneNumber)))  {

                throw new Error('Please enter a valid phone number!');
    
            }
            participantModel = ncpParticipantModel;
            type = "NCP";
        }
        
        
        
        if(await participantModel.find({ "email": req.body.email }).count() > 0){

            throw new Error("Email already used for another participant!");
        
        }
        
        //Determining the ID and creating the participant Object
        const id = await participantModel.countDocuments() + 1;
        
        if(type==="CC") reqParticipant = Object.assign({ _id: type + req.body.id }, req.body);
        else reqParticipant = Object.assign({ _id: type + id }, req.body);
        
        const participant = await participantModel.create(reqParticipant);

        const newScoreEntry = await scoreModel.create({ _id : participant._id, points: 0 });

        
        newScoreEntry.save();
        participant.save();

        //Sending the success response
        res.status(201).json({
            status: "success",
            data: {
                message: type + " participant added!",
                participant
            }
        });

    } catch (err) {
        
        res.status(400).json({
            status: "fail",
            message: err.message,
        });
    }
};


//Viewing the events registered by a participants
exports.viewEventRegistrations = async (req, res) => {  //(POST) Expects participantid
    try {
        
        const participantId = req.body.id;
        let reqParticipant;
        let participantType;

        // Getting the participant 
        const ccParticipant = await ccParticipantModel.findById(participantId);
        const ncpParticipant = await ncpParticipantModel.findById(participantId);
        if(ccParticipant){
            reqParticipant = ccParticipant;
            participantType="cc";
        }else if(ncpParticipant){
            reqParticipant = ncpParticipant;
            participantType="ncp";
        }
        else {
            throw new Error('Participant not found. Cannot get Events for the given participant!');
        }
        

        const participantName = participantType === 'cc' ? reqParticipant.name : `${reqParticipant.firstName} ${reqParticipant.lastName}`;
        

        //Sending the success response
        res.status(200).json({
            status: "success",
            data: {
                Name: participantName,
                EventsRegistered: reqParticipant.eventsRegistered
            }
        });

    }catch(err){

        res.status(400).json({
            status: "fail",
            message: err.message,
        });
    
    }
};

//Confirm the participant for an event and sending the mail!
exports.confirmEventParticipant = async (req,res)=>{   //(POST) Expects Participantid and eventID

    try {

        const eventID = req.body.eventID;
        const id = req.body.participantId;
        let mailSent;

        // Find the event by eventid
        const event = await eventsModel.findOne({ eventID });

        //Throwing event not found error
        if (!event) {   

            throw new Error('Event not found');
        
        }

        // Find the participant in the participantsRegistered array
        const participant = event.participantsRegistered.find(p => p.participantId === id);


        //Throwing participant not found error
        if (!participant) {

            throw new Error('Participant not found for this event');

        }

        //Checking that Event Slot is available
        if(event.eventSlots > 0){
            // Check and update the participant's status
            if (participant.status !== 'confirmed') {
                
                await eventsModel.updateOne(
                    { "eventID": eventID, "participantsRegistered.participantId": id },
                    { $set: { "participantsRegistered.$.status": "confirmed" } }
                );
                
                event.eventSlots-=1;


                // Send an email to the participant
                const mailOptions = {
                    from: 'rrane230@gmail.com',
                    to: participant.participantEmail,
                    subject: 'Confirmation Email',
                    text: `You have been confirmed for the event ${event.eventName}`
                };

                transporter.sendMail(mailOptions, (error, info) => {
                    if (error) {
                        mailSent=false;
                    } else {
                        mailSent=true;
                    }
                });
                
            }else if(participant.status === 'confirmed'){

                throw new Error("Participant already confirmed, cannot confirm again!");

            }
        }
        else{

            throw new Error("Events slots are full!");
        }   
        // Save the updated event
        await event.save();

        participant.status = "confirmed";

        //Sending the response
        res.status(200).json({
            status:"success",
            data:{
            message: 'Participant confirmed successfully',
            participant,
            mailSent
            }
        });


    } catch (err) {

        res.status(400).json({
            status: "fail",
            message: err.message,
        });

    }
};


//Adding an event to DB
exports.addEventToDB = async (req,res) => { //(POST) Expects eventName,eventID,eventSlots,duration

    try {
        
        const eventData = req.body;
        eventData.duration = new Date(eventData.duration);
        //Throwing event already added in the DB error
        if (await eventsModel.find({ $or: [{ eventName: req.body.eventName }, { eventID: req.body.eventID }] }).count() > 0) {
            
            throw new Error("Event is already added in the database. Please check!");
        }
    

        const event = await eventsModel.create(eventData);
        res.status(201).json({
            status: "success",
            data: {
                message:"Event added!",
                event,
            }
        });

    } catch (err) {
        res.status(400).json({
            status: "fail",
            message: err.message,
        });
    }
};


//Rewarding points to the participants
exports.rewardPoints = async (req, res) => { //(POST) Expects participantId,eventID,points
    try {

        const { participantId, eventID, points } = req.body;
        let participantModel;
        let isValid = false;

        if (participantId.startsWith("CC")) {
            participantModel = ccParticipantModel;
        } else {
            participantModel = ncpParticipantModel;
        }

        const event = await eventsModel.findOne({ eventID });

        if (!event) {
            
            throw new Error("Event Not found with that id!");
            
        }

        isValid = event.participantsRegistered.find((ele) => ele.participantId === participantId);

        if (!isValid) {
            
            throw new Error("Participant not registered for that event, couldn't allocate points!");

        }

        const toUpdate = await participantModel.findOne({ _id : participantId });
        
        if (["arb", "firstPodium", "secondPodium", "thirdPodium"].includes(points.type)) {

             
            // Updating the podium based on the type
            if(points.type==="arb"){

            }
            else if (points.type === "firstPodium" && event.winners.secondPodium!==participantId && event.winners.thirdPodium!==participantId) {
                if(event.winners.firstPodium===participantId) throw new Error('Participant is already given the same podium!');
                event.winners = {
                    ...event.winners,
                    firstPodium: participantId,
                };
            } else if (points.type === "secondPodium" && event.winners.firstPodium!==participantId && event.winners.thirdPodiumPodium!==participantId ) {
                if(event.winners.secondPodium===participantId) throw new Error('Participant is already given the same podium!');
                event.winners = {
                    ...event.winners,
                    secondPodium: participantId,
                };
            } else if (points.type === "thirdPodium" && event.winners.secondPodium!==participantId && event.winners.firstPodium!==participantId ) {
                if(event.winners.thirdPodium===participantId) throw new Error('Participant is already given the same podium!');
                event.winners = {
                    ...event.winners,
                    thirdPodium: participantId,
                };
            } else{

                throw new Error("Participant is already given another podium, please check!");

            }
            toUpdate.points += points.value;
           

            const newScoreUpdate = await scoreModel.findByIdAndUpdate(
                toUpdate._id,
                { $set: { points: toUpdate.points } },
                { new: true }
              )
        
            // Saving the updated event and participant
            
            await newScoreUpdate.save();
            await event.save();
            await toUpdate.save();

            
            
            // Returning the success response
            return res.status(200).json({
                status: "success",
                message: "Points allocated and podium(if asked) updated successfully!",
                points:points.value,
                updatedParticipant: toUpdate._id,
            });
            
        } else {
            
            throw new Error("Invalid podium type send either of these{arb,firstPodium,secondPodium,thirdPodium}");
            
        }
    } catch (error) {
        return res.status(500).json({
            status: "error",
            message: "An error occurred while updating points and podium.",
            error: error.message,
        });
    }
};


exports.modifyEventInDb = async (req,res) => {     // accepts parameters to be modified in the event
    
    try{
        if(!req.body){

        throw new Error('Need something to update!');

    }

    eventsModel.updateOne({ eventID : req.body.eventID },{$set: req.body } );
    
    }catch(err){

        return res.status(500).json({
            status: "error",
            message: "An error occurred while updating the event",
            error: err.message,
        });

    }

}