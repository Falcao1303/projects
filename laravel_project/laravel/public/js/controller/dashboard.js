var app = angular.module('dashboard',['httpdService']);

app.controller('dashboardController',dashboardController)


dashboardController.$inject = ['$scope', '$http','$timeout', '$rootScope', '$location', '$window','httpdService'];

function dashboardController($scope, $http,$timeout, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.openRegisterUser = openRegisterUser;
    // vm.findRegister = findRegister;
    iniciarController();

    function iniciarController(){
        console.log("roostcopedash", $rootScope);
    }

    function openRegisterUser(){
        console.log("oi");
        $timeout(function(){$window.location.href = 'Customer/CustomersRegister'});
    }
}