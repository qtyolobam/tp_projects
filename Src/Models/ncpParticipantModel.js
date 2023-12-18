const mongoose = require('mongoose');

const ncpParticipantSchema = new mongoose.Schema({
    firstName: {
        type: String,
        required: true
    },
    lastName: {
        type: String,
        required: true

    },
    email: {
        type: String,
        unique: true,
        required: true
    },
    phoneNumber: {
        type: String,
        required: true
    },
    idProof: {
        type: String,
        required: true
    },
    password: {
        type: String,
        required: true,
        select:false
    },
    eventsRegistered:{
        type:Array,
        default:[]
    },
    _id:{
        type: String,
    },
    points:{
        type:Number,
        default:0,
    }
});

// Define the main model that will use the participant schema
const ncpParticipantModel = mongoose.model('ncpParticipants', ncpParticipantSchema);

module.exports = ncpParticipantModel;