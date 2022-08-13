var app = angular.module('system',[]);

app.controller('systemController',systemController)


systemController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function systemController($scope, $http, $rootScope, $location, $window) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.registerProduct = registerProduct;
    vm.deleteProduct = deleteProduct;
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
       getProducts(); 
    }

    function registerProduct(){
        const params = vm.productModel;
        vm.registerProd = $http({
            method: 'GET',
            url: '/products/add',
            params: params
        }).then(function successCallback(response) {
            getProducts();
        });
    }

    function getProducts(){
            vm.registerProd = $http({
                method: 'GET',
                url: '/products/getProducts',
                params: ''
            }).then(function successCallback(response) {
                vm.products = response.data['PRODUCTS'];
            });
    }

    function deleteProduct(id){
        vm.deleteProd = $http({
            method: 'GET',
            url: '/products/delete',
            params: {cod:id}
        }).then(function successCallback(response) {
            swal("Sucess!", response.data.MESSAGE, "success");
            getProducts();
        });

    }


}