var app = angular.module('pokedex',['httpdService']);

app.controller('pokedexController',pokedexController)


pokedexController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function pokedexController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    iniciarController();

    function iniciarController(){
        vm.loginForm={
            email:'',
            password:'',
        }
    }


}