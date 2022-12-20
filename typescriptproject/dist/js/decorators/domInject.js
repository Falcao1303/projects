export function domInject(seletor) {
    return function (target, propertyKey) {
        console.log(`Modificando o prototype do objeto ${target.constructor.name} e adicionando propriedade getter no atributo ${propertyKey}`);
        let elemento;
        const getter = function () {
            if (!elemento) {
                console.log(`buscando elemento do DOM com o seletor ${seletor} para injetar em ${propertyKey}`);
                elemento = document.querySelector(seletor);
            }
            return elemento;
        };
        Object.defineProperty(target, propertyKey, {
            get: getter
        });
    };
}
