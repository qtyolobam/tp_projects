const scoreModel = require("../Models/scoreModel")


exports.getScoreboard = async (req,res) => {

    try {
        // Retrieve scores in descending order
        const scores = await scoreModel.find().sort({ points: -1 });
    
        res.render('scoreboard/scoreboard', { scores });

      } catch (error) {
        res.status(500).send('Internal Server Error');
      }


}