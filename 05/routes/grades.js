import express from "express";
import {promises as fs} from "fs";

const router = express.Router();

const {readFile, writeFile} = fs;


router.post("/",async(req,res)=>{
    let grade = req.body;
    try{
        let json = JSON.parse(await readFile(global.fileName,"utf8"));
        grade = {id: json.nextId++,timestamp: new Date(), ...grade};
        json.grades.push(grade);

        await writeFile(global.fileName, JSON.stringify(json));

        res.send(grade);
    }catch(err){
        res.status(400).send({error: err.message});
    }
})


router.put("/",async(req,res)=>{
    let newGrade = req.body;
    try{
        let json = JSON.parse(await readFile(global.fileName,"utf8"));
        let index = json.grades.findIndex(grade => grade.id === newGrade.id); 

        if(index === -1){
            throw new Error("ID incorreto!!");
        }

        if(newGrade.student){
            json.grades[index].student = newGrade.student;
        }
        if(newGrade.subject){
            json.grades[index].subject = newGrade.subject;
        }
        if(newGrade.type){
            json.grades[index].type = newGrade.type;
        }
        if(newGrade.student){
            json.grades[index].value = newGrade.value;
        }
        await writeFile(global.fileName, JSON.stringify(json));


        res.send(json.grades[index]);
    }catch(err){
        res.status(400).send({error: err.message});
    }
})


router.delete("/:id",async(req,res)=>{
    try{
        let json = JSON.parse(await readFile(global.fileName,"utf8"));

        let index = json.grades.findIndex(grade => grade.id === parseInt(req.params.id,10)); 

        if(index === -1){
            throw new Error("ID incorreto!!");
        }

        const grades = json.grades.filter(grade => grade.id !== parseInt(req.params.id,10));
        json.grades = grades; 

        await writeFile(global.fileName,JSON.stringify(json));
        
        res.end();
    }catch(err){
        res.status(400).send({error: err.message});
    }
})


router.get("/:id",async(req,res)=>{
    try{
        let json = JSON.parse(await readFile(global.fileName,"utf8"));
        const grade = json.grades.find(grade => grade.id === parseInt(req.params.id,10));
        if(grade){
            res.send(grade);
        }else{
            throw new Error("ID incorreto!!");
        }
    }catch(err){
        res.status(400).send({error: err.message});
    }
})

router.post("/total",async(req,res)=>{
    try{
        const params = req.body;
        const json = JSON.parse(await readFile(global.fileName,"utf8"));
        const grades = json.grades.filter(grade=> grade.student === params.student && grade.subject === params.subject);
        
        const total = grades.reduce((prev, curr)=>{
            return prev + curr.value
        },0)
       res.send({total});



    }catch(err){
        res.status(400).send({error: err.message});
    }
})


router.get("/average/:subject/:type",async(req,res)=>{
    try{
        const params = req.params;
        const json = JSON.parse(await readFile(global.fileName,"utf8"));
        const grades = json.grades.filter(grade=> grade.subject === req.params.subject && grade.type === req.params.type);
        if(!grades.length){
            throw new Error("Não foram encontrados registros, paramêtros incorretos");
        } 
        const total = grades.reduce((prev, curr)=>{
            return prev + curr.value
        },0)
        res.send({average : total/ grades.length});
    }catch(err){
        res.status(400).send({error: err.message});
    }
})



router.post("/best",async(req,res)=>{
    try{
        const params = req.body;
        const json = JSON.parse(await readFile(global.fileName,"utf8"));
        const grades = json.grades.filter(grade=> grade.subject === params.subject && grade.type === params.type);

        if(!grades.length){
            throw new Error("Não foram encontrados registros, paramêtros incorretos");
        } 

        grades.sort((a,b)=>{
            if(a.value < b.value) return 1;
            else if(a.value > b.value)return -1;
            else return 0;
        });

        const top3 = grades.slice(0,3)




       res.send(top3);



    }catch(err){
        res.status(400).send({error: err.message});
    }
})

export default router;

