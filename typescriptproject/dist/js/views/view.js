export class View {
    constructor(seletor, escape) {
        this.escape = false;
        this.elemento = document.querySelector(seletor);
    }
    update(model) {
        let template = this.template(model);
        if (this.escape) {
            template = template.replace(/<script>[\s\S]*?<\/script>/, '');
        }
        this.elemento.innerHTML = template;
    }
}
