var app = angular.module('sales',[]);

app.controller('salesController',salesController)


salesController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function salesController($scope, $http, $rootScope, $location, $window) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.saveTheSale = saveTheSale;
    vm.deleteSale = deleteSale;
    vm.getSales = getSales;
    vm.disableInput = disableInput;
    vm.addToCart= addToCart;
    vm.getProductsCart = getProductsCart;
    vm.saveTheSale = saveTheSale;
    iniciarController();

    function iniciarController(){
        vm.saleCartModel={
            id_sale: 0,
            product_cart: 0,
            amount: 0
        }
       getSales(); 
       getProducts();
        vm.edit = false;
    }

    function saveTheSale(){
        let id_sale = vm.saleCartModel.id_sale;
         vm.saveSale = $http({
             method: 'GET',
             url: '/products/saveSale',
             params: {id_sale: id_sale}
         }).then(function successCallback(response) {
                swal('Success!', response.data['message'], 'success');
                vm.productsCart = [];
                vm.saleCartModel.id_sale = 0;
                $('#sale_id').prop('disabled', false)
         });
    }

    function disableInput(){
        $('#sale_id').prop('disabled', true)
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

    function getProductsCart(){
        let id_sale = vm.saleCartModel.id_sale;
        vm.getCartProducts = $http({
            method: 'GET',
            url: '/products/getProductsCart',
            params: {id_sale: id_sale}
        }).then(function successCallback(response) {
            vm.productsCart = response.data['products'];
        }); 
    }

    function addToCart(){
        const params = vm.saleCartModel;
        vm.saveSale = $http({
            method: 'GET',
            url: '/sales/addToCart',
            params: params
        }).then(function successCallback(response) {
            $cart = response.data['PRODUCTS'];
            getProductsCart();
        })
    }

    function deleteSale(id){
        vm.deleteProd = $http({
            method: 'GET',
            url: '/products/delete',
            params: {cod:id}
        }).then(function successCallback(response) {
            swal("Sucess!", response.data.MESSAGE, "success");
            getProducts();
        });

    }

    function getSales(){
        vm.getSales = $http({
            method: 'GET',
            url: '/products/getSales',
            params:''
        }).then(function successCallback(response) {
            vm.sales = response.data['sales'];
        });
    }


}