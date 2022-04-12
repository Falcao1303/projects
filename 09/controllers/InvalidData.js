class InvalidData extends Error {
    constructor(campo) {
        const message = `O campo '${campo}' está inválido!`
        super(message)
        this.name = 'InvalidData'
        this.idError = 1
    }
}

module.exports = InvalidData