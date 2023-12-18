const scoreboardController = require("../Controllers/scoreboardController");
const express = require('express');

const router = express.Router();

router.route('/')
    .get(scoreboardController.getScoreboard);

module.exports = router;