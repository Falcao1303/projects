export abstract class View<T> {
    protected elemento: HTMLElement;
    private escape = false;

    constructor(seletor:string, escape?: boolean) {
        this.elemento = document.querySelector(seletor);
    }

    update(model: T): void {
        let template = this.template(model);
        if (this.escape) {
            template = template.replace(/<script>[\s\S]*?<\/script>/, '');
        }
        this.elemento.innerHTML = template;
    }

    protected abstract template(model: T): string; 
}