var app = angular.module('login',['httpdService']);

app.controller('loginController',loginController)


loginController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function loginController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    console.log($injector);
    console.log($scope);
    var vm = $scope;
    vm.findRegister = findRegister;
    iniciarController();

    function iniciarController(){
        vm.loginForm={
            email:'',
            password:'',
        }
    }

    function findRegister(){
        const params = vm.loginForm;
        console.log(params);
            httpdService.get('Laravel_Login', 'getUser',params,(response) =>{
               console.log(response);
        });
    }
}