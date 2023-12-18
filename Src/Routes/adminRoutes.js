const express = require('express');
const adminController = require('../Controllers/adminController');
const adminAuthController = require('../Controllers/adminAuthController');

//Creating the adminRouter
const router = express.Router();


// Routing the paths

//Logging in
router.route("/login")
    .post(adminAuthController.login)

//Logging Out
router.route("/logout")
    .get(adminAuthController.logout);

//Getting to the Admin Dashboard
router.route("/dashboard")
    .get(adminAuthController.protect,adminController.getAdminDashboardPage)


//Adding an event to DB
router.route("/events")
    .post(adminAuthController.protect,adminController.addEventToDB)


router.route("/participant")
    // Getting all the list of Participants
    .get(adminAuthController.protect,adminController.getAllParticipants)
    // Adding a Participant
    .post(adminAuthController.protect,adminController.addParticipant)

    
router.route("/participant/givePoints")
//Rewarding Points
    .post(adminAuthController.protect,adminController.rewardPoints)


router.route("/viewParticipantEvents")
    // Getting all the Event Registrations for a participant
    .post(adminAuthController.protect,adminController.viewEventRegistrations)    


router.route("/confirmParticipant")
    //Changing status to Confirmed for a participant
    .post(adminAuthController.protect,adminController.confirmEventParticipant)


module.exports = router;