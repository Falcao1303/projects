var app = angular.module('register',['httpdService']);

app.controller('registerController',RegisterController)


RegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService','sweetalert'];

function RegisterController($scope, $http, $rootScope, $location, $window,httpdService,sweetalert) {
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
        swal("Sucess!", "Registered!!", "success");
        // const params = vm.registerForm;
        //     httpdService.get('Laravel_register', 'saveRegister',params,(response) =>{
        //         SweetAlert.swal("Sucess!", "Registered!!", "success");
        // });
    }
}