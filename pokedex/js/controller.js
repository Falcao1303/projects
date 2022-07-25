var app = angular.module('pokedex',['httpdService']);

app.controller('pokedexController',pokedexController)


pokedexController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function pokedexController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.getList = getList;
    vm.firstPage = firstPage;
    vm.lastPage = lastPage;
    vm.nextPage = nextPage;
    vm.previousPage = previousPage;
    vm.page = 1;
    vm.offset = 0;
    iniciarController();


    function iniciarController(){
        vm.next = false;
        getList();
    }

    function firstPage(){
        
    }


    function lastPage(){

    }


    function nextPage(){
        vm.next = true;
            let offset =  vm.offset + 20;
            console.log('https://pokeapi.co/api/v2/pokemon/?offset='+ offset + '&limit=20');
            vm.searchNext = $http({
                method: 'GET',
                url: 'https://pokeapi.co/api/v2/pokemon/?offset='+ offset + '&limit=20'
            }).then(function successCallback(response) {
                vm.list = response.data.results;
                vm.total = response.data.count;
                vm.totalpages = Math.ceil(vm.total/20);
                for(let i = 1; i <= 898; i++){
                    vm.searchImages = $http({
                        method: 'GET',
                        url: 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/'+ i +'.png'
                    }).then(function (response){
                        angular.extend(vm.list[i-1],{image: response.config.url});
                    });
                }
                vm.next = false;
                vm.page = vm.page + 1;
                vm.offset = vm.offset + 20;
                console.log("success",vm.offset);
            }
         );
    }

    function previousPage(){
        vm.next = false;
        vm.previous = true;
        let offset = vm.offset - 20;
        vm.page = vm.page - 1;
            vm.searchPrevious = $http({
                method: 'GET',
                url: 'https://pokeapi.co/api/v2/pokemon/?offset='+ offset + '&limit=20'
            }).then(function (response) {
                vm.list = response.data.results;
                for(let i = 1; i <= 898; i-1){
                    vm.searchImages = $http({
                        method: 'GET',
                        url: 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/'+ i +'.png'
                    }).then(function (response){
                        angular.extend(vm.list[i-1],{image: response.config.url});
                    });
    
                }
                vm.next = false;
                vm.page = vm.page - 1;
                vm.offset = vm.offset - 20;
            }
         );
    }

    function getList(){
    vm.search = $http({
                    method: 'GET',
                    url: 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=20'
                }).then(function successCallback(response) {
                    console.log(response);
                    vm.list = response.data.results;
                    vm.total = response.data.count;
                    vm.totalpages = Math.ceil(vm.total/20);
                    for(let i = 1; i <= 898; i++){
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