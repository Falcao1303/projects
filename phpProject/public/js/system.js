var app = angular.module('system',['httpdService']);

app.controller('systemController',systemController)


systemController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window','httpdService'];

function systemController($scope, $http, $rootScope, $location, $window,httpdService) {
    var $injector = angular.injector();
    console.log($injector);
    console.log($scope);
    var vm = $scope;
    vm.registerProduct = registerProduct;
    iniciarController();

    function iniciarController(){
        vm.productModel={
            product : "",
        }
    }

    function registerProduct(){
        const params = vm.productModel;
        console.log(params);
            httpdService.get('Control_products_add', '',params,(response) =>{
               console.log(response);
        });
    }
}