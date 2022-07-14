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
        vm.registerForm={
            email:'',
            password:'',
        }
    }

    function findRegister(){
        const params = vm.registerForm;
            httpdService.get('Laravel_Home_Login', 'saveRegister',params,(response) =>{
                swal("Sucess!", "Registered!!", "success");
        });
    }
}