//import packages
const express = require('express');
const session = require('express-session');
const cookieParser = require('cookie-parser');

//Routers
const adminRouter = require('./Routes/adminRoutes');
const scoreboardRouter = require('./Routes/scoreboardRoutes');
const userRouter = require('./Routes/userRoutes');

//Some Controllers
const userAuthController = require('./Controllers/userAuthController');



//make an instance
let app = express();


//Cookie Parser
app.use(cookieParser());
//Sessions
app.use(
    session({
    secret:"JSDSKDBSKFSFMAFNNAFKANFAN",
    resave:false,
    saveUnitialized:false,
    cookie: {
      maxAge: 3600000000, 
    }
  })
);



// Set 'views' directory to store your EJS templates
app.set('views', __dirname + '/views');

// Set EJS as the view engine
app.set('view engine', 'ejs');

//MiddleWares
app.get('/',(req,res)=>{
    res.status(200).sendFile('homePage.html',{root:'./public/homePage'});
});
app.use(express.json());
app.use('/admin',adminRouter);
app.use('/user',userRouter);
app.use('/scoreboard',scoreboardRouter);

//Serving Static files
app.use(userAuthController.protect,express.static('public'));


module.exports = app;
