const mongoose = require('mongoose');

const eventsSchema = new mongoose.Schema({
    eventName:{
        type:String,
        required: true
    },
    eventID:{
        type:String,
        unique:true,
        required:true
    },
    eventSlots:{
        type:Number,
        required:true
    },
    participantsRegistered:{
        type:Array,
        default:[]
    },
    duration:{
        type:Date,
        required:true
    },
    points:{
        type:Object,
        default:{
            firstPodium:30,
            secondPodium:20,
            thirdPodium:10
        }
    },
    winners:{
        type:Object,
        default:{
            firstPodium:"",
            secondPodium:"",
            thirdPodium:""
        }
    }
});

// Define the main model that will use the participant schema
const eventsModel = mongoose.model('events', eventsSchema);

module.exports = eventsModel;