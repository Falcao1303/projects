const Model = require('../models/produto-table')

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
            throw new Error('Produto não encontrado!')
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