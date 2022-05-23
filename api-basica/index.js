const express = require('express')
const cors = require('cors')
const bodyParser = require('body-parser')
const routes = require('./routes/routes')

const app = express()

app.use(bodyParser.urlencoded({extended: false}))
app.use(express.json())
app.use(cors())
app.use(routes)



app.listen(8000, () => {
    console.log('Server is ok and running at http://localhost:8000')
})