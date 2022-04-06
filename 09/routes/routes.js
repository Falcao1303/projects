const route = require('express').Router()
const tableModelProducts = require('../controllers/transictions') 
const Produto = require('../controllers/produto')


    route.get('/produto/',async  (req,res) =>{
     const results = await tableModelProducts.listar();
     res.status(200)   
    res.send(JSON.stringify(results));
    })
    
    route.post('/',async(req,res)=>{
        try{
            const dados = req.body
            const produto = new Produto(dados)
             await produto.criar()
             res.status(201)
             res.send(
                 JSON.stringify(produto)
             )      
        }catch(erro){
            res.status(400)
            res.send(
                JSON.stringify({
                    mensagem: erro.message
                })
            )
        }

    })

    route.get('/produto/:idProduto',async(req,res)=>{
        try{
            const id = req.params.idProduto
            const produto = new Produto({ id : id})
            await produto.carregar()
            res.status(200)
            res.send(
                JSON.stringify(produto)
            )
        }catch(erro){
            res.status(404)
            res.send(
                JSON.stringify({
                    mensagem: erro.message
                })
            )
        }
    })

    route.put('/produto/:idProduto',async(req,res)=>{
        try{
            const id = req.params.idProduto
            const dadosRecebidos = req.body
            const dados = Object.assign({},dadosRecebidos,{id : id})
            const produto = new Produto(dados)
            await produto.atualizar()
            res.status(204)
            res.end()
        }catch(erro){
            res.status(400)
            res.send(
                JSON.stringify({
                    mensagem: erro.message
                })
            )
        }
    })

    route.delete('/produto/:idProduto',async(req,res)=>{
        try{
            const id = req.params.idProduto
            const produto = new Produto({ id : id})
            await produto.carregar()
            await produto.remover()
            res.status(204)
            res.end()
        }catch(erro){
            res.status(404)
            res.send(
                JSON.stringify({
                    mensagem: erro.message
                })
            )
        }
    })

module.exports = route

