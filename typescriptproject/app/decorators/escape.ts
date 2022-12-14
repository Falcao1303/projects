export function escape(target: any, propertyKey: string, descriptor: PropertyDescriptor) {
        const metodoOriginal = descriptor.value;
        descriptor.value = function(...args: any[]) {
            const retorno = metodoOriginal.apply(this, args);
            if(typeof retorno === 'string'){
                return retorno.replace(/<script>[\s\S]*?<\/script>/, '');
            }
            return retorno;
        }
        return descriptor;   
    }
