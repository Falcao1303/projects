var app = angular.module('register',['httpdService']);

app.controller('registerController',RegisterController)


RegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function RegisterController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.saveRegister = saveRegister;
    iniciarController();


    function iniciarController(){
        console.log($injector);
        vm.registerForm={
            name:'',
            email:'',
            password:'',
            password_confirmation:'',
            terms:false
        }
    }

    function saveRegister(){
            httpdService.post('Laravel_Home_Register', 'saveRegister',params,(response) =>{
                console.log(response);
        });
    }
}