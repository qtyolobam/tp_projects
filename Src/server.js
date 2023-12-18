//Importing the packages
const mongoose = require('mongoose');
const dotenv = require('dotenv');
// Setting up the path for local process env variables
dotenv.config({path:'./config.env'});
//Importing the app from app.js module
const app = require('./app');




mongoose.connect(process.env.CONN_STR)
    .then((conn)=>{
    console.log("Successfully Connected to the DB!");
    })
    .catch((errr)=>{
        console.log("DB connection Error");
    })
    

//Setting up the port
const port = 3000 || process.env.port;


//Listening to requests(Starting up the server)
app.listen(port,()=>{

    console.log(`Server listening at port ${port}`);

});




