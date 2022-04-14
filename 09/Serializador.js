const NotSupportedValue = require('./controllers/NotSupportedValue')

class Serializador {
    json(data){
        return JSON.stringify(data)
    }

    serialize(data){

        if(this.contentType === 'application/json'){
            return this.json(
                this.objectFilter(data)
            )
        }
        throw new NotSupportedValue(this.contentType)
    }

    }

module.exports = {
    Serializador : Serializador,
    AcceptedFormats : ['application/json']
}