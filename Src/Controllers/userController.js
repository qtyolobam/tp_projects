const eventsModel = require('../Models/eventsModel');
const ncpParticipantModel = require('../Models/ncpParticipantModel');
const ccParticipantModel = require('../Models/ccParticipantModel');
const scoreModel = require('../Models/scoreModel');
const ejs = require('ejs');




exports.getUserDashboard = async (req,res) => {

    try{
    let participant;
    let ccParticipant = await ncpParticipantModel.findOne( { email : req.session.user } );
    let ncpPrticipant = await ccParticipantModel.findOne( { email : req.session.user } );
    if(ccParticipant){
        participant=ccParticipant;
    }else{
        participant=ncpPrticipant;
    }

    res.status(200).render('userDashboard/userDashboard',{ participant : participant });
    
    
    }catch(err){
        return res.status(400).json({
            status:"fail",
            message:"Couldnt Fetch user details!",
            error: err.message  // Include the error message in the response
        });
    }
}


//Participant registering for an event
exports.registerForEvent = async (req, res) => { //(POST) Expects participant ID, eventID ,participant email 

    try {
        // Getting all the required data
        const email = req.session.user;
        const eventID = req.body.event;

        //Throwing need all details to register error
        if (!email || !eventID ) {
            
            throw new Error('Need all (eventid, email) for registering for an event!');

        }

        let ncp = await ncpParticipantModel.findOne( { email , email } );
        let cc  = await ccParticipantModel.findOne( { email , email } );
        let reqParticipant;
        //Throwing participant not found error
        if(!ncp && !cc){
           
            throw new Error("Participant Not found in the DB to register!");

        }

        // Get the specified event
        let event = await eventsModel.findOne({ eventID });

        // Return if event not found
        if (!event) {
            
            throw new Error('Event not found');
            
        }

        if(ncp){
            reqParticipant = ncp;
        }else{
            reqParticipant = cc;

        }
        // Check if the participant already exists in the participantsRegistered array
        const existingParticipant = event.participantsRegistered.find(
            (participant) => participant.participantId === reqParticipant._id
        );

        if (existingParticipant) {
            
            throw new Error('Participant already registered for this event');

        }

        var currentTime = new Date();

        // Checking if the current time is before the event duration
        if (currentTime > event.duration) {

            throw new Error("Cannot register for this event as signup duration has passed!");

        }
        // New Participant Object
        const newParticipant = {
            participantId: reqParticipant._id,
            participantEmail: email,
            status: 'waiting',
        };

        
        
        //Pushing the event to the participant object in DB
        if(!(reqParticipant.eventsRegistered.includes(`${event.eventName}`))){
            reqParticipant.eventsRegistered.push(`${ event.eventName}`);
        }


        // Push the newParticipant to the participantsRegistered list
        event.participantsRegistered.push(newParticipant);
        
        
        reqParticipant.points+=parseInt(process.env.REGISTRATION_POINTS);
        const newScoreUpdate = await scoreModel.findByIdAndUpdate(
            reqParticipant._id,
            { $set: { points: reqParticipant.points } },
            { new: true }
          )
    
        // Saving the updated event and participant
        
        await newScoreUpdate.save();
        reqParticipant.save();
        
        // Saving the event modifications
        await event.save();

        res.status(200).json({
            status: 'success',
            message: `Registered for ${event.eventName} successfully`,
            data: {
                newParticipant,
            },
        });
    } catch (err) {
        res.status(400).json({
            status: 'fail',
            message: err.message,
        });
    }
};

