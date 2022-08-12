var app = angular.module('system',['httpdService']);

app.controller('systemController',systemController)


systemController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function systemController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.registerProduct = registerProduct;
    iniciarController();

    function iniciarController(){
        vm.productModel={
            product : "",
            code : "",
            price : "",
            amount : "",
            type: "",
            taxes : ""
        }
    }

    function registerProduct(){
        const params = vm.productModel;
            httpdService.get('Control_products_add', '',{params},(response) =>{
               console.log(response);
        });
    }
}