const ncpParticipantModel = require('../Models/ncpParticipantModel');
const ccParticipantModel = require('../Models/ccParticipantModel');
const scoreModel = require('../Models/scoreModel');

exports.register = async (req, res) => {
  try {
      let participantModel;
      let type="NCP";
      participantModel = ncpParticipantModel;
      let email = req.body.email;

      const indianPhoneRegex = /^[6-9]\d{9}$/;
      
      if(!(indianPhoneRegex.test(req.body.phoneNumber)))  {

        throw new Error('Please enter a valid phone number!');

    }

      if(await participantModel.find({ email }).count() > 0){

          throw new Error("Email already in use by another participant!");

      }

      const id = await participantModel.countDocuments() + 1;
      const reqParticipant = Object.assign({ _id: "NCP" + id }, req.body);
      const participant = await participantModel.create(reqParticipant);
      const newScoreEntry = await scoreModel.create({ _id : participant._id, points: 0 });

      newScoreEntry.save();
      participant.save();

      req.session.user=email;
      res.status(201).json({
          status: "success",
          data: {
              message: type + " Participant Created!",
              participant,
              redirect:"/user/dashboard"
          },
      });

  } catch (err) {
      res.status(400).json({
          status: "fail",
          message: err.message,
      });
  }
};


exports.login = async (req,res) => {
  
  try{

      const { email,password } = req.body;

      if(!email || !password){
          
        throw new Error("Please proide an email and a password!");

      }

      //Check if email and psswd pair exist in DB

      const ncpParticipant = await ncpParticipantModel.findOne( { email } ).select('+password');
      const ccParticipant = await ccParticipantModel.findOne( { email } ).select('+password');
      let reqParticipant;

      if(ncpParticipant){
          
          reqParticipant=ncpParticipant;
      
      }
      else if(ccParticipant){
          
          reqParticipant=ccParticipant;
      
      }
      else{
          
        throw new Error("Incorrect Email!");

      }

      if(!reqParticipant || !(password===reqParticipant.password)){
          
        throw new Error("Incorrect email or password!");

        
      }
      req.session.user=email;
    
      res.status(200).json({
          status:"success",
          redirect:"to dashboard"
      });
  
  }catch(err){

    res.status(400).json({
      status:"fail",
      message:err.message
    });

  }


}


exports.protect = async (req,res,next) => {
  try{


    if(( req.path.startsWith('/admin') ||  req.path===('/') || req.path.startsWith('/homePage')  || req.path.startsWith('/Carousel')  ||  req.path.startsWith('/userLogin')  || req.path.startsWith('/userRegister')  || req.path==="/scoreboard" )){

        next(); 
        return; 

    }

      if (!req.session || !req.session.user) {
        // Perform the action when 'user' is not present
        throw new Error("User logged out!"); // Redirect to login page, adjust the URL as needed
      }

        const email = req.session.user;
        const ncpParticipant = await ncpParticipantModel.findOne( { email } ).select('+password');
        const ccParticipant = await ccParticipantModel.findOne( { email } ).select('+password');
        let reqParticipant;
        if(ncpParticipant){
            
            reqParticipant=ncpParticipant;
        
        }
        else if(ccParticipant){
            
            reqParticipant=ccParticipant;
        
        }
        else{
            
          throw new Error("User not found!");

        }
    
    //Allow user to access routes
    next();

  }catch(err){
      
      res.status(400).json({
          status:"fail",
          message:err.message
      });

  }
}


exports.logout = (req, res) => {

  req.session.destroy((err) => {
    if (err) {
      console.error('Error destroying session:', err);
      res.status(500).json({ status: 'error', error: 'Failed to logout' });
    } else {
      res.json({ status: 'success' });
    }
  });
  
}