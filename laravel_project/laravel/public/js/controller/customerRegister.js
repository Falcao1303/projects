var app = angular.module('customer',['httpdService']);

app.controller('customerRegisterController',customerRegisterController)


customerRegisterController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function customerRegisterController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.saveCustomerRegister = saveCustomerRegister;
    vm.openModalEdit = openModalEdit;
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
            vm.customers = response.customers;
        });
    }

    function openModalEdit(customer){
        vm.customerData.name = customer.name;
        vm.customerData.email = customer.email;
        vm.customerData.document = customer.document;
        console.log(vm.customerData);

        $('#modalEdit').modal('show');

    }
}