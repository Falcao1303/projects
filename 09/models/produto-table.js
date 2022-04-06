const Sequelize = require('sequelize');
const conexao = require ('./connections');



const Produto = {
    id: {
        type: Sequelize.INTEGER,
        autoIncrement : true,
        allowNull : false,
        primaryKey: true
    },
    nome: {
        type: Sequelize.STRING,
        allowNull : false
    },
    preco: Sequelize.DECIMAL,
    quantidade: Sequelize.INTEGER
}

module.exports = conexao.define('produto',Produto);
 