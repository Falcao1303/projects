const express = require('express')
const consign = require('consign')


const app = express();
app.use(express.json())
app.use(express.urlencoded({ extended: true}))

consign()
 .include('routes')
 .include('controllers')
 .into(app)
app.listen(3000,() => console.log('api iniciou'))
