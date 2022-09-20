var app = angular.module('dashboard',['httpdService']);

app.controller('dashboardController',dashboardController)


dashboardController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function dashboardController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    // vm.findRegister = findRegister;
    iniciarController();

    function iniciarController(){
        console.log("roostcopedash", $rootScope);
    }

}