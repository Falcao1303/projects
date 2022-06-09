
angular.module('registerService',[]).service('registerService', ['$http', function ($http) {

    var service = this;

    
    service.defaultError = function(erro) {
        mytoast('error', erro.msg);
        
    }

    service.getRegistros = function (scope, callback, erro) {
        console.log("teste",$http({
            method: 'GET',
            url: '/register/getRegisters'
                    
        }));
        // scope.registrosWaiting = $http({
        //     method: 'GET',
        //     url: '/register/getRegisters'
                    
        // }).success(callback).catch(erro);

    };


}]);