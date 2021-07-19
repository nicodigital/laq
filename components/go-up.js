class goUp extends HTMLElement{
    constructor(){
        super();
        this.idName;
        this.className;
        this.color;
        this.border_radius;
        this.font_size;
    }

    /* Defino los atributos */
    static get observedAttributes(){
        return ['id-name','class-name','color','border-radius','font-size'];
    }

    /* Actualizo los atributos */
    attributeChangeCallback(attributes, oldValue, newValue){
        
        switch(attributes){
            case "id-name":
                this.idName = newValue;
            break;

            case "class-name":
                this.className = newValue;
            break;

            case "color":
                this.color = newValue;
            break;

            case "border-radius":
                this.border_radius = newValue;
            break;

            case "font-size":
                this.font_size = newValue;
            break;
        }
    }

    connectedCallback(){
        this.innerHTML = `
            <a id="${this.idName}" href="#top" class="${this.className}">
                <i class="icon-arrow-up"></i>
            </a>
        `;
        this.style.color = this.color;
        this.style.fontSize = this.font_size;
        this.style.borderRadius = this.border_radius;
    }
    
}

window.customElements.define( "go-up", goUp );