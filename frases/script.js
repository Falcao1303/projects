var app = angular.module('app', []);

app.controller('appController', appController);

appController.$inject = ['$scope', '$http', '$rootScope', '$location', '$window'];

function appController($scope, $http, $rootScope, $location, $window) {
    $scope.mensagem = [
        "Ponta Grossa, cidade das águas, das flores, e do povo acolhedor.",
        "Ponta Grossa, terra de gente bonita, de sorriso aberto, e de coração generoso.",
        "Ponta Grossa, cidade de oportunidades, de sonhos realizados, e de futuro promissor.",
        "Ponta Grossa, terra de história, de cultura, e de belas paisagens.",
        "Ponta Grossa, cidade de alegria, de esperança, e de amor.",
        "Ponta Grossa, cidade de gente feliz, de gente sorridente, e de gente que gosta de viver.",
        "Ponta Grossa, cidade de gente hospitaleira, de gente amiga, e de gente que gosta de compartilhar.",
        "Ponta Grossa, cidade de gente trabalhadora, de gente esforçada, e de gente que não desiste dos seus sonhos.",
        "Ponta Grossa, cidade de gente orgulhosa, de gente que ama a sua cidade, e de gente que quer sempre o melhor para ela.",
        "Ponta Grossa, cidade de gente que faz a diferença, de gente que inspira, e de gente que faz o mundo um lugar melhor."
    ];
    $scope.mensagensExibidas = []; // Array para acompanhar as mensagens exibidas
    $scope.mensagem_gerada = "";

    $scope.descobrirMensagem = function() {
        if ($scope.mensagensExibidas.length === $scope.mensagem.length) {
            $scope.mensagem_gerada = "Não há mais mensagens disponíveis.Volte amanhã!";
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
