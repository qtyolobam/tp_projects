const mongoose = require('mongoose');

const scoreSchema = new mongoose.Schema({
  _id: String,
  points: { type: Number, default: 0 },
});

const scoreModel = mongoose.model('Score', scoreSchema);

module.exports = scoreModel;