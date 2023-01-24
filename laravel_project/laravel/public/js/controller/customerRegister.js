var app = angular.module('customer',['httpdService']);

app.controller('customerRegisterController',customerRegisterController)


customerRegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function customerRegisterController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    console.log($injector);
    console.log($scope);
    var vm = $scope;
    vm.saveCustomerRegister = saveCustomerRegister;
    iniciarController();


    function iniciarController(){
        vm.customerData={
            name:'',
            email:'',
            document:''
        }
    }

    function saveCustomerRegister(){
        const params = vm.customerData;
             httpdService.get('Laravel_customerRegister', 'register',params,(response) =>{
                 swal("Sucess!", response.message, "success");
                 iniciarController();
         });
    }
}