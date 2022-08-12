var app = angular.module('script',['httpdService']);

app.controller('scriptController',scriptController)


scriptController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function scriptController($scope, $http, $rootScope, $location, $window,httpdService) {
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

    // function findRegister(){
    //     const params = vm.loginForm;
    //     console.log(params);
    //         httpdService.get('Laravel_Login', 'getUser',params,(response) =>{
    //            console.log(response);
    //     });
    // }
}