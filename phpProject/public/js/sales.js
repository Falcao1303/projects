var app = angular.module('sales',[]);

app.controller('salesController',salesController)


salesController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function salesController($scope, $http, $rootScope, $location, $window) {
    var $injector = angular.injector();
    var vm = $scope;
    vm.saveTheSale = saveTheSale;
    vm.deleteSale = deleteSale;
    vm.getSales = getSales;
    vm.editProduct = editProduct;
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
            vm.productsCart = response.data['PRODUCTS'];
        }); 
    }

    function addToCart(){
        const params = vm.saleCartModel;
        console.log("params",params);
        vm.saveSale = $http({
            method: 'GET',
            url: '/sales/addToCart',
            params: params
        }).then(function successCallback(response) {
            getProductsCart();
            // iniciarController();
        }).catch(function errorCallback(response) {
            console.log(response);
        });
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
            if(vm.edit == true){
            response.data['PRODUCT'][0]['amount'] = parseInt(response.data['PRODUCT'][0]['amount']);    
            vm.productModel = response.data['PRODUCT'][0];

            }else{
                vm.products = response.data['PRODUCT'];
            }
        });
    }

    function editProduct(id){
        vm.edit = true;
        getProduct(id);
    }

    function updateProduct(){
        delete vm.productModel['created_at'];
        delete vm.productModel['updated_at'];
        const params = vm.productModel;
        vm.updateProd = $http({
            method: 'GET',
            url: '/products/update',
            params: params
        }).then(function successCallback(response) {
            console.log("response",response);
            swal("Sucess!", response.data.MESSAGE, "success");
           iniciarController();
        });

    }


}