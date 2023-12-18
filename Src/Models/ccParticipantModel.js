const mongoose = require('mongoose');

const ccParticipantSchema = new mongoose.Schema({
    name:{
        type:String,
        unique: true,
        required: true
    },
    password: {
        type: String,
        required: true,
        select:false
    },
    email:{
        type:String,
        unique:true,
        required: true
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
        required:true
    }
});

// Define the main model that will use the participant schema
const ccParticipantModel = mongoose.model('ccParticipants', ccParticipantSchema);

module.exports = ccParticipantModel;