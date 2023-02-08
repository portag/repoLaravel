const express = require("express");
const UserController = require("../controladores/user");

const api = express.Router();

//EndPoints
api.post("/user", UserController.register);
api.post("/login",UserController.login);


module.exports = api;