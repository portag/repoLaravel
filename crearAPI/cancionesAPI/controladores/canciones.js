const { findById } = require("../models/canciones");
const Cancion = require("../models/canciones")


async function createCancion(req, res) {
    const cancion = new Cancion();
    const params = req.body;

    cancion.titulo = params.titulo;
    cancion.grupo = params.grupo;
    cancion.duracion = params.duracion;
    cancion.anio = params.anio;
    cancion.genero = params.genero;
    cancion.puntuacion = params.puntuacion;


    cancion.description = params.description;

    try {
        //insertar en mogodb
        const canStore = await cancion.save();

        if (!canStore) {
            restart.status(400).send({
                msg: "cancion no guardada"
            })
        } else {
            res.status(200).send({
                cancion: canStore
            });
        }
    } catch (error) {
        res.status(500).send(error);

    }
}


async function getCancion(req, res) {
    try {
        const canciones = await Cancion.find().sort({ created_at: -1 })

        if (!canciones) {
            res.status(400).send({ "msg": "error al obtener canciones" })
        } else {
            res.status(200).send(canciones)
        }
    } catch (error) {
        res.status(100).send(error)
    }
}


async function topCancion(req, res) {
    try {
        const canciones = await Cancion.find().sort({ puntuacion: -1 }).limit(10);

        if (!canciones) {
            res.status(400).send({ "msg": "error al obtener canciones" })
        } else {
            res.status(200).send(canciones)
        }
    } catch (error) {
        res.status(100).send(error)
    }
}



async function getGenero(req, res) {
    const cancion = new Cancion();
    const params = req.body;

    cancion.genero = params.genero;
    try {
        const canciones = await Cancion.find({ genero: cancion.genero })

        if (!canciones) {
            res.status(400).send({ "msg": "error al obtener canciones" })
        } else {
            res.status(200).send(canciones)
        }
    } catch (error) {
        res.status(100).send(error)
    }
}


async function getOneCancion(req, res) {
    const idCancion = req.params.id;
    try {
        const canciones = await Cancion.findById(idCancion);
        if (!canciones) {
            res.status(400).send({ "msg": "error al obtener la cancion" })
        } else {
            res.status(200).send(canciones)
        }
    } catch (error) {
        res.status(500).send(error);
    }
}


async function deleteCancion(req, res) {
    const idCancion = req.params.id;
    try {
        const cancion = await Cancion.deleteOne({_id: idCancion});
        if (!cancion) {
            res.status(400).send("error al borrar la cancion.");
        } else {
            res.status(200).send("cancion borrada");
        }
    } catch (error) {
        res.status(500).send(error);
    }
}


async function updatePuntuacion(req, res) {

    const idCancion = req.params.id;
    const cuerpo = req.body;
    cuerpo.puntuacion;


    try {
        const canciones = await Cancion.findByIdAndUpdate(idCancion, { $inc: { puntuacion: cuerpo.puntuacion } });
        if (!canciones) {
            res.status(400).send({ "msg": "error al actualizar la cancion" })
        } else {
            res.status(200).send({ msg: "cancion actualizada" })
        }
    } catch (error) {
        res.status(500).send(error);
    }


}


module.exports = {
    createCancion,
    getCancion,
    updatePuntuacion,
    getGenero,
    topCancion,
    getOneCancion,
    deleteCancion
}