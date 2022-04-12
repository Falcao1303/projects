const express = require('express')
const NotFound = require('./controllers/errorNotFound')
const InvalidData = require('./controllers/InvalidData')
const DataNotFound = require('./controllers/DataNotFound')
const NotSupportedValue = require('./controllers/NotSupportedValue')
const AcceptedFormats = require('./Serializador').AcceptedFormats



const app = express();
app.use(express.json())

app.use((req,res,next)=>{
    let requiredFormat = req.header('Accept')

    if(requiredFormat === '*/*'){
        requiredFormat = 'application/json'
    }

    if (AcceptedFormats.indexOf(requiredFormat) === -1){
        res.status(406)
        res.end()
        return;
    }

    res.setHeader('Content-Type',requiredFormat)
    next()
})
app.use(express.urlencoded({ extended: true}))

const route = require('./routes/routes')
app.use('/api/', route)

app.use((erro,req,res,next)=>{
    let errorStatus = 500
    if(erro instanceof NotFound){
        errorStatus = 404
    }

    if(erro instanceof NotSupportedValue){
        errorStatus = 406
    }
    if(erro instanceof InvalidData || erro instanceof DataNotFound){
        errorStatus = 400
    }
      res.status(errorStatus)

    res.send(
        JSON.stringify({
            mensagem: erro.message,
            id : erro.idError
        })
    )
})


app.listen(3000,() => console.log('api iniciou'))

