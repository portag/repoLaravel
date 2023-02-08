const express = require('express');
const app = express();
app.use(express.json())
app.use(express.urlencoded({extended:true}))
//Cargar rutas
const canciones_routes = require("./route/canciones");
const user_routes = require("./route/user");


//Ruta base
app.use("/api", canciones_routes);
app.use("/api", user_routes);


module.exports = app;