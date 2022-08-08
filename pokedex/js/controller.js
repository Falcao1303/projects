var app = angular.module('pokedex',[]);

app.controller('pokedexController',pokedexController)


pokedexController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function pokedexController($scope, $http, $rootScope, $location, $window) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.getList = getList;
    vm.firstPage = firstPage;
    vm.lastPage = lastPage;
    vm.nextPage = nextPage;
    vm.previousPage = previousPage;
    vm.getImagens = getImagens;
    vm.page = 1;
    vm.offset = 0;
    iniciarController();


    function iniciarController(){
        vm.next = false;
        getList();
    }


    function firstPage(){
        vm.searchLast = $http({
            method: 'GET',
            url: 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=20'
        }).then(function successCallback(response) {
            vm.list = response.data.results;
                 for(let index = 0; index <= 19; index++){
                    getImagens(vm.list[index]['url'],vm.list[index]);
                 }
                 vm.page = 1;
        }
     );
    }

    function getImagens(url,item){
        vm.searchImages = $http({
            method: 'GET',
            url: url
        }).then(function (response){
                angular.extend(item,{image: response.data.sprites.front_shiny});
        });    
    }

    function lastPage(){
            vm.searchLast = $http({
                method: 'GET',
                url: 'https://pokeapi.co/api/v2/pokemon/?offset='+ vm.totalpages + '&limit=20'
            }).then(function successCallback(response) {
                vm.list = response.data.results;
                     for(let index = 0; index <= 19; index++){
                        getImagens(vm.list[index]['url'],vm.list[index]);
                     }
                     vm.page = vm.totalpages;
            }
         );
    }


    function nextPage(){
        vm.next = true;
            vm.offset =  vm.offset + 20;
            vm.searchNext = $http({
                method: 'GET',
                url: 'https://pokeapi.co/api/v2/pokemon/?offset='+ vm.offset + '&limit=20'
            }).then(function successCallback(response) {
                vm.list = response.data.results;
                     for(let index = 0; index <= 19; index++){
                        getImagens(vm.list[index]['url'],vm.list[index]);
                     }
                vm.next = false;
                vm.page = vm.page + 1;
            }
         );
    }

    function previousPage(){
        vm.next = false;
        vm.previous = true;
        let offset = vm.offset - 20;
        if(offset >= 0){
            vm.searchPrevious = $http({
                method: 'GET',
                url: 'https://pokeapi.co/api/v2/pokemon/?offset='+ offset + '&limit=20'
            }).then(function (response) {
                vm.list = response.data.results;
                     for(let index = 0; index <= 19; index++){
                        getImagens(vm.list[index]['url'],vm.list[index]);

                     }
                vm.next = false;
                vm.page = vm.page - 1;
                vm.offset = vm.offset - 20;
            }
         );
        }else{
            return;
        }

    }

    function getList(){
    vm.search = $http({
                    method: 'GET',
                    url: 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=20'
                }).then(function successCallback(response) {
                    vm.list = response.data.results;
                    vm.total = response.data.count;
                    vm.totalpages = Math.ceil(vm.total/20);
                    for(let i = 1; i <= 20; i++){
                        vm.searchImages = $http({
                            method: 'GET',
                            url: 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/'+ i +'.png'
                        }).then(function (response){
                            angular.extend(vm.list[i-1],{image: response.config.url});
                        });
                    }
                }
             );
      
    }  
    
}