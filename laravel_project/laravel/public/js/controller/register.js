var app = angular.module('register',['httpdService']);

app.controller('registerController',RegisterController)


RegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function RegisterController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    console.log($injector);
    console.log($scope);
    var vm = $scope;
    vm.saveRegister = saveRegister;
    iniciarController();


    function iniciarController(){
        vm.registerForm={
            name:'',
            email:'',
            password:'',
            password_confirmation:'',
            terms:false
        }
    }

    function saveRegister(){
        const params = vm.registerForm;
            httpdService.get('Laravel_customerRegister', 'register',params,(response) =>{
                swal("Sucess!", response.message, "success");
                iniciarController();
        });
    }
}