exports.login = async (req,res) => {
  try{

      const { id,password } = req.body;
    
      if(!id || !password){
          
        throw new Error("Please proide an id and a password!");
    
      }
    
      //Check if id and psswd pair is correct
    
      if(!(id === "Shitij" && password === "imgay")){
          
        throw new Error("Incorrect ID or Password!");
    
      }
    
      req.session.admin=true;
    
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

      if(!req.session.admin){
  
        throw new Error("Admin not logged in!");
  
      }

      const check = req.session.admin;
       
      if(!(check === true)){
        
        throw new Error("Incorrect Session, login again!");
    
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

        res.status(500).json({ status: 'error', error: 'Failed to logout' });

      } else {

        res.json({ status: 'success' });

      }
    });
    
  }









  