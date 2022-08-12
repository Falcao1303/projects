var app = angular.module('system',['httpdService']);

app.controller('systemController',systemController)


systemController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function systemController($scope, $http, $rootScope, $location, $window,httpdService) {
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