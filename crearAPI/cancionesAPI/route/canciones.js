const express = require("express");
const CancionController = require("../controladores/canciones");
const md_auth = require("../middleware/autenticated")
const api = express.Router();

//EndPoints
api.post("/cancion",[md_auth.ensureAuth], CancionController.createCancion);
api.get("/list",[md_auth.ensureAuth], CancionController.getCancion);
api.put("/puntuacion/:id", [md_auth.ensureAuth],CancionController.updatePuntuacion);
api.get("/filtro/:genero", [md_auth.ensureAuth], CancionController.getGenero);
api.get("/top", [md_auth.ensureAuth], CancionController.topCancion);
api.get("/cancion/:id", [md_auth.ensureAuth],CancionController.getOneCancion);
api.delete("/cancion/:id", [md_auth.ensureAuth],CancionController.deleteCancion);




module.exports = api;