class DataNotFound extends Error{
    constructor(){
        super("Não foram fornecidos dados para atualizar!")
        this.name = 'DataNotFound'
        this.idError = 2
    }
}

module.exports = DataNotFound