import {promises as fs} from "fs";


const {readFile, writeFile} = fs;
init();

async function init(){
    await createFiles();
    console.log(await citiesCounter("SP"));
    await moreOrLessCities(false);
    await moreOrLessCities(true);
    await getBiggerOrLowerNameCities(false);
    await getGenaralBiggerOrLowerCityName(true);
    await getGenaralBiggerOrLowerCityName(false);
}


async function createFiles(){

    let data = await readFile("./json/Estados.json");
    const states = JSON.parse(data);

    data =  await readFile("./json/Cidades.json");
    const cities = JSON.parse(data);
    
    for (const state of states){
       const stateCities = cities.filter(city=> city.Estado === state.ID);
       await writeFile(`./states/${state.Sigla}.json`, JSON.stringify(stateCities));
    }
}


async function citiesCounter(uf){
    const data = await readFile(`./states/${uf}.json`);
    const cities = JSON.parse(data);
    return cities.length;
}

async function moreOrLessCities(more){
    const states = JSON.parse(await readFile("./json/Estados.json"));
    const list = [];
    for (const state of states){
        const count = await citiesCounter(state.Sigla);
        list.push({uf:state.Sigla,count});
    }

    list.sort((a,b)=>{
        if(a.count < b.count)return 1;
        else if(a.count>b.count) return -1;
        else return 0;

    })

    const result = [];
    if(more){
        list.slice(0 , 5).forEach(item=> result.push(item.uf + "-" + item.count));
    }else{
        list.slice(-5).forEach(item=> result.push(item.uf + "-" + item.count));
    }


    console.log(result);
}


async function getBiggerOrLowerNameCities(bigger){
    const states = JSON.parse(await readFile("./json/Estados.json"));
    const result = [];
    
    for (let state of states){
        let city; 
        if(bigger){
            city = await getBiggerNameForState(state.Sigla);
            result.push(city.Nome + "-" + state.Sigla);
        }else{
        city = await getLowerNameForState(state.Sigla);
            result.push(city.Nome + "-" + state.Sigla);
        }

    }
    console.log(result);
}

async function getBiggerNameForState(uf){
    const cities = JSON.parse(await readFile(`./states/${uf}.json`));

    let result;

    cities.forEach(city=>{
        if(!result) result = city;
        else if (city.Nome.length > result.Nome.length)
        result = city;
        else if ((city.Nome.length === result.Nome.length) &&
         (city.Nome.toLowerCase() < result.Nome.toLowerCase()))
         result = city;
    });
    return result;

}

    
async function getLowerNameForState(uf){
    const cities = JSON.parse(await readFile(`./states/${uf}.json`));

    let result;

    cities.forEach(city=>{
        if(!result) result = city;
        else if (city.Nome.length < result.Nome.length)
        result = city;
        else if ((city.Nome.length === result.Nome.length) &&
         (city.Nome.toLowerCase() < result.Nome.toLowerCase()))
         result = city;
    });
    return result;
}


async function getGenaralBiggerOrLowerCityName(bigger){
    const states = JSON.parse(await readFile("./json/Estados.json"));
    const list = [];
    for (let state of states){
        let city;
        if(bigger){
            city = await getBiggerNameForState(state.Sigla);

        }else{
            city = await getLowerNameForState(state.Sigla);
        }
        list.push({name: city.Nome, uf: state.Sigla});
    }
    const result = list.reduce((prev,current)=>{
        if(bigger){
            if(prev.name.length > current.name.length)return prev;
            else if (prev.name.length < current.name.length) return current;
            else return prev.name.toLowerCase() < current.name.toLowerCase() ? prev : current
        }else{
            if(prev.name.length < current.name.length)return prev;
            else if (prev.name.length > current.name.length) return current;
            else return prev.name.toLowerCase() < current.name.toLowerCase() ? prev : current
        }

       
    });
    console.log(result.name + "-" + result.uf);
}