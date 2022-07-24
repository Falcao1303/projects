var app = angular.module('pokedex',['httpdService']);

app.controller('pokedexController',pokedexController)


pokedexController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function pokedexController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.getList = getList;
    iniciarController();


    function iniciarController(){
        getList();
    }

    function getList(){
    vm.search = $http({
            method: 'GET',
            url: 'https://pokeapi.co/api/v2/pokemon/?offset=0'
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
        }
        );

    }    
    




}