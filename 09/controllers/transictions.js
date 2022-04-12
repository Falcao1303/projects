const Model = require('../models/produto-table')
const NotFound = require('./errorNotFound')

module.exports = {
    listar(){
        return Model.findAll();
    },

    inserir(produto){
        return Model.create(produto);
    },

    async findId(id){
        const encontrado = await Model.findOne({
            where :{
                id: id 
            }
        })

        if (!encontrado){
            throw new NotFound()
        }

        return encontrado
    },

    atualizar(id, dadosAtualizar){
        return Model.update(dadosAtualizar, {
            where : {id : id}
    })
    },

    remover(id){
        return Model.destroy({
            where : {id : id}
        })
    }
}