var app = angular.module('app', []);

app.controller('appController', appController);

appController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function appController($scope, $http, $rootScope, $location, $window) {
    $scope.mensagem = [
        "Ponta Grossa, cidade acolhedora.",
        "Terra de gente bonita e generosa.",
        "Cidade de oportunidades e futuro promissor.",
        "História, cultura e belas paisagens.",
        "Cidade de alegria, esperança e amor.",
        "Gente feliz, sorridente e que ama viver.",
        "Gente hospitaleira, amiga e compartilhadora.",
        "Gente trabalhadora e determinada.",
        "Gente orgulhosa, que ama sua cidade e busca o melhor.",
        "Gente que faz a diferença e torna o mundo melhor."
    ];
    $scope.mensagensExibidas = []; // Array para acompanhar as mensagens exibidas
    $scope.mensagem_gerada = "";

    $scope.descobrirMensagem = function() {
        if ($scope.mensagensExibidas.length === $scope.mensagem.length) {
            $scope.mensagem_gerada = "Não há mais mensagens disponíveis!";
        } else {
            var mensagemAleatoriaIndex;
            do {
                mensagemAleatoriaIndex = Math.floor(Math.random() * $scope.mensagem.length);
            } while ($scope.mensagensExibidas.includes(mensagemAleatoriaIndex));
            
            $scope.mensagensExibidas.push(mensagemAleatoriaIndex);
            $scope.mensagem_gerada = $scope.mensagem[mensagemAleatoriaIndex];
        }
    };
}
