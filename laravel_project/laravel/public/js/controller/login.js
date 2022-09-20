var app = angular.module('login',['httpdService']);

app.controller('loginController',loginController)


loginController.$inject = ['$scope', '$http','$timeout', '$rootScope', '$location', '$window','httpdService'];

function loginController($scope, $http, $timeout,$rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.findRegister = findRegister;
    iniciarController();

    function iniciarController(){
        vm.loginForm={
            email:'',
            password:'',
        }
        console.log("root",$rootScope);
    }

    function findRegister(){
        const params = vm.loginForm;
            httpdService.get('Laravel_Login', 'getUser',params,(response) =>{
               if(response.status == 'success'){
                $rootScope.user = response.session;
                // $location.path('/dashboard');
                $timeout(function(){$window.location.href = '/dashboard'});
               }else{
                    swal("Error", "User or password incorrect", "error");
               }
        });
    }
}