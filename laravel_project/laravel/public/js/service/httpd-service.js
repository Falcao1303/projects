var app = angular.module('httpdService',[]);
app.service('httpdService', ['$rootScope', '$http', function ($rootScope, $http) {

    this.get = function (controller, method, params, callback, erro) {
        var url = `?con=${controller}&act=${method}`;
        if (controller.substring(0,7)==='Laravel') {
            console.log("caiu aqui",controller)
            url = `${controller.substring(8).split("_").join('/')}/${method}`;
        }
        console.log(controller,callback);
        return $http({
            method: 'GET',
            url: url,
            params: params
        }).success(callback).catch(erro);
    };

    this.post = function (controller, method, params, callback, erro) {
        console.log($.param(params));
        var url = `?con=${controller}&act=${method}`;
        if (controller.substring(0,7)==='Laravel') {
            console.log(controller)
            url = `${controller.substring(8).split("_").join('/')}/${method}`;
        }
        return $http({
            method: 'POST',
            url: url,
            data: params
        }).success(callback).catch(erro);
    };


}]);