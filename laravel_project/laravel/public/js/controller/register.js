angular.module('register',['registerService'])
.controller('registerController',function($scope,registerService){
    var vm = $scope;
    vm.saveRegister = saveRegister;

    iniciarController();


    function iniciarController(){
        vm.registerForm={
            name:'',
            email:'',
            password:'',
            password_confirmation:'',
            terms:false
        }
    }

    console.log(registerService.getRegistros())
    function saveRegister(){
        
    }
})