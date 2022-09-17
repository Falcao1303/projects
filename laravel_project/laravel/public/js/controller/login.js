var app = angular.module('login',['httpdService']);

app.controller('loginController',loginController)


loginController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function loginController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
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
            httpdService.get('Laravel_Login', 'getUser',params,(response) =>{
               if(response.status == 'success'){
                   $window.location.href = '/home';
               }else{
                    swal("Error", "User or password incorrect", "error");
               }
        });
    }
}