const express = require('express');
const userController = require('../Controllers/userController');
const userAuthController = require('../Controllers/userAuthController');


//Creating the adminRouter
const router = express.Router();

//Routing the paths

router.route("/register")
    .post(userAuthController.register)

router.route("/dashboard")
    .get(userAuthController.protect,userController.getUserDashboard);


router.route("/login")
    .post(userAuthController.login)

router.route("/logout")
    .get(userAuthController.logout);

router.route("/registerForEvent")
    .post(userAuthController.protect,userController.registerForEvent)

module.exports = router;