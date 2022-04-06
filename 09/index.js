const express = require('express')



const app = express();
app.use(express.json())
app.use(express.urlencoded({ extended: true}))

const route = require('./routes/routes')
app.use('/api/', route)

app.listen(3000,() => console.log('api iniciou'))
