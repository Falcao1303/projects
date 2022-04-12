class errorNotFound extends Error{
    constructor(){
        super('Produto não encontrado')
        this.name = 'errorNotFound'
        this.idError = 0
    }
}

module.exports = errorNotFound