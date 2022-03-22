const Sequelize = require('sequelize');
const db = require ('./connections');



const Produto = db.define('produto',{
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
})

module.exports = Produto;
 