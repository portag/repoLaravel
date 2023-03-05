const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const cancionSchema = Schema({
    titulo: {
        type: String,
        require: true
    },
    grupo: {
        type: String,
        require: false
    },
    duracion: {
        type: String,
        require: false
    },
    anio: {
        type: String,
        require: false
    },
    genero: {
        type: String,
        require: false
    },
    puntuacion: {
        type: Number,
        require: false
    }
});

module.exports = mongoose.model("Cancion", cancionSchema);