const Sequelize = require('sequelize')
const conexao = new Sequelize('testes','root','admin',{
    dialect: 'mysql',
    host: '127.0.0.1',
    port: '3307'
}) 

module.exports = conexao;