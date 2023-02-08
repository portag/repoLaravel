const mongoose = require("mongoose")
const app = require("./app")
const port = 3000
const urlMongo = "mongodb+srv://emilioporta:7OcN8OqFJD87Ep3g@cluster0.6vyyyce.mongodb.net/test";

mongoose.set("strictQuery", false)

mongoose.connect(urlMongo, (err, res) => {

  try {
    if (err) {
      throw err
    } else {
      console.log("la conexion a la base de datos es correcta")

      app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
      })

    }
  } catch (error) {
    console.error(error);
  }

});

