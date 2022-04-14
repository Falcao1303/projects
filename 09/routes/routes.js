const route = require('express').Router()
const tableModelProducts = require('../controllers/transictions') 
const Produto = require('../controllers/produto')
const ProductSerialize = require ('../Serializador').ProductSerialize


    route.get('/produto/',async  (req,res) =>{
     const results = await tableModelProducts.listar();
     res.status(200)
     const serializeProduct = new ProductSerialize(
        res.getHeader('Content-Type')
    )
    res.send(
        serializeProduct.serialize(results) 
    )         
    })
    
    route.post('/',async(req,res,next)=>{
        try{
            const dados = req.body
            const produto = new Produto(dados)
             await produto.criar()
             res.status(201)
             const serializeProduct = new ProductSerialize(
                res.getHeader('Content-Type')
            )
             res.send(
                serializeProduct.serialize(produto) 
             )      
        }catch(erro){
            next(erro)
        }

    })

    route.get('/produto/:idProduto',async(req,res,next)=>{
        try{
            const id = req.params.idProduto
            const produto = new Produto({ id : id})
            await produto.carregar()
            res.status(200)
            const serializeProduct = new ProductSerialize(
                res.getHeader('Content-Type')
            )
            res.send(
                serializeProduct.serialize(produto) 
            )
        }catch(erro){
            next(erro)
        }
    })

    route.put('/produto/:idProduto',async(req,res,next)=>{
        try{
            const id = req.params.idProduto
            const dadosRecebidos = req.body
            const dados = Object.assign({},dadosRecebidos,{id : id})
            const produto = new Produto(dados)
            await produto.atualizar()
            res.status(204)
            res.end()
        }catch(erro){
            next(erro)
        }
    })

    route.delete('/produto/:idProduto',async(req,res,next)=>{
        try{
            const id = req.params.idProduto
            const produto = new Produto({ id : id})
            await produto.carregar()
            await produto.remover()
            res.status(204)
            res.end()
        }catch(erro){
            next(erro)
        }
    })

module.exports = route

