const express = require('express')



module.exports = route=>{
        route.get('/', (req,res) =>{
        res.send("ola mundo")
    })

}
