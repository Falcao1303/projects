let allUsers = [];
let filteredUsers = [];
const MINIMUM_ALLOWED_INPUT_SIZE = 1 
const inputSearch = document.querySelector('#inputSearch');
const buttonSearch = document.querySelector('#buttonSearch');
const form = document.querySelector('form');
const divRight = document.querySelector('#divStatistics');
const divLeft = document.querySelector('#divUsers');
const enabledButtonClass = 'bg-green-500'

async function start(){
    await readUsers();
    enableControls();
    enableEvents();

}


async function readUsers(){
    const resource = await fetch ('http://localhost:3001/users') ;
    const json = await resource.json();
    allUsers = json.map(({login, name, dob, gender, picture}) => {
        const fullName = `${name.first} ${name.last}`;
        const searchName = fullName.toLocaleLowerCase();
        
        return{
            id:login.uuid,
            name:fullName,
            searchName,
            age: dob.age,
            gender: gender,
            picture: picture.medium,
        };
    });

    filteredUsers = [...allUsers];
}

function enableControls(){
    inputSearch.disabled = false;
    inputSearch.focus();
}

function enableEvents(){
    inputSearch.addEventListener('input', ({currentTarget}) => {
        const shouldEnable = 
        currentTarget.value.length >= MINIMUM_ALLOWED_INPUT_SIZE;

        buttonSearch.disabled = !shouldEnable;

        shouldEnable 
        ? buttonSearch.classList.add(enabledButtonClass) 
        : buttonSearch.classList.remove(enabledButtonClass);
    
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const searchTerm = inputSearch.value;
        doFilterUsers(searchTerm);
    });
}

function doFilterUsers(searchTerm){
    const lowerCaseSearchTerm = searchTerm.toLocaleLowerCase();

    filteredUsers = allUsers
    .filter(user => user.searchName.includes(lowerCaseSearchTerm))
    .sort((a,b) => a.name.localeCompare(b.name));
   
    render();
}

function render(){
    renderRight();
    renderLeft()
}

function renderRight(){
    if (filteredUsers.length === 0){
        divRight.textContent = 'Nada a ser exibido!';
        return;
    }

    const maleUsers = filteredUsers.filter(({gender})=> gender === 'male').length;
    const femaleUsers = filteredUsers.filter(({gender})=> gender === 'female').length;

    const sumAges = filteredUsers.reduce((accumulator, {age})=> accumulator+age,0
    );

    const averageAges = (sumAges/ filteredUsers.length)
    .toFixed(2)
    .replace('.', ',');

    divRight.innerHTML = `
        <h2 class = 'margin-auto text-center text-xl font-semibold mb-2'>
        Estatísticas
        </h2>

        <ul>
            <li>Sexo Masculino: <strong>${maleUsers}</strong></li>
            <li>Sexo Feminino: <strong>${femaleUsers}</strong></li>
            <li>Soma das idades: <strong>${sumAges}</strong></li>
            <li>Média das idades: <strong>${averageAges}</strong></li>
        </ul>
    `;
}


function renderLeft(){
    if (filteredUsers.length === 0){
        divLeft.textContent = 'Nenhum usuário encontrado com esse filtro!';
        return;
    }

    divLeft.innerHTML = `
    <h2 class = 'margin-auto text-center text-xl font-semibold mb-2'>
     ${filteredUsers.length} usuário(s) econtrado(s)
    </h2>

    <ul>
        ${filteredUsers.map(user => {
            return `
             <li class = 'flex flex-row items-center mb-2 space-x'>
                <img class = 'rounded-full' src="${user.picture}" alt="${user.name}" title = "${user.name}"/>
                <span>${user.name}, ${user.age} anos</span>          
                </li>
            `;
        } )
        .join('')}
    <ul>
    `
}
start();