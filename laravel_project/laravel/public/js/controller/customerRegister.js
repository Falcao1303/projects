var app = angular.module('customer',['httpdService']);

app.controller('customerRegisterController',customerRegisterController)


customerRegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function customerRegisterController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.saveCustomerRegister = saveCustomerRegister;
    iniciarController();


    function iniciarController(){
        vm.customerData={
            name:'',
            email:'',
            document:''
        }

        vm.filterModel = {
            name:'',
        }

        getCustomers();
    }

    function saveCustomerRegister(){
        const params = vm.customerData;
             httpdService.get('Laravel_customerRegister', 'register',params,(response) =>{
                 swal("Sucess!", response.message, "success");
                 iniciarController();
         });
    }

    function getCustomers(){
        const params = vm.customerData;
        httpdService.get('Laravel_customerRegister', 'listCustomers','',(response) =>{
            console.log(response);
            vm.customers = response.customers;
        });
    }
}