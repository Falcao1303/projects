const customExpress = require('./config/customExpress')
const conexao = require('./infraestrutura/conexao')
const tabelas = require('./infraestrutura/tabelas')


conexao.connect(erro =>{
  if(erro){
      console.log("erro ao conectar db!")
  }else{
      console.log("db conectado!")
      tabelas.init(conexao);
      const app = customExpress();
      app.listen(3000, () => console.log('servidor rodando na porta 3000'))
  }
})



