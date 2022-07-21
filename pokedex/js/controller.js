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
    vm.teste = $http({
            method: 'GET',
            url: 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=20'
        }).then(function successCallback(response) {
            vm.list = response.data.results;
            console.log(response);
        }
        );

    }    
    




}