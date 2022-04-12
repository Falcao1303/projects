const NotSupportedValue = require('./controllers/NotSupportedValue')

class Serializador {
    json(dados){
        return JSON.stringify(dados)
    }

    serialize(dados){
        if(this.contentType === 'application/json'){
            return this.json(dados)
        }
        throw new NotSupportedValue(this.contentType)
    }
}

module.exports = {
    Serializador : Serializador,
    AcceptedFormats : ['application/json']
}