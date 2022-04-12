const ProdutoTable = require('./transictions')
const InvalidData = require('./InvalidData')
const DataNotFound = require('./DataNotFound')
class Produto {
    constructor({ id, nome, preco, quantidade, createdAt, updateAt}){
        this.id = id
        this.nome = nome
        this.preco = preco
        this.quantidade = quantidade
        this.createdAt = createdAt
        this.updateAt = updateAt
    }

    async criar(){
        this.validar();
        const results = await ProdutoTable.inserir({
            nome: this.nome,
            preco: this.preco,
            quantidade: this.quantidade
        })

        this.id = results.id
        this.createdAt = results.createdAt
        this.updateAt = results.updateAt
    }

    async carregar(){
        const produtoEncontrado = await ProdutoTable.findId(this.id)
        this.nome = produtoEncontrado.nome
        this.preco = produtoEncontrado.preco
        this.quantidade = produtoEncontrado.quantidade
        this.createdAt = produtoEncontrado.createdAt
        this.updateAt = produtoEncontrado.updateAt

    }

    async atualizar(){
       await ProdutoTable.findId(this.id)
       const campos = ['nome', 'preco', 'quantidade']
       const dadosAtualizar = {}

       campos.forEach((campo) => {
           const valor = this[campo]
           if(valor !== undefined){
               dadosAtualizar[campo] = valor
           }
       })

       if(Object.keys(dadosAtualizar).length === 0){
        throw new DataNotFound();
   }
       await ProdutoTable.atualizar(this.id, dadosAtualizar)
    }

    remover(){
        return ProdutoTable.remover(this.id)
    }

    validar(){
        const campos = ['nome', 'preco', 'quantidade']
        campos.forEach(campo=> {
            const valor = this[campo];
            if(valor === undefined || valor.length < 3){
                throw new InvalidData(campo);
            }
            });
    }

}

module.exports = Produto