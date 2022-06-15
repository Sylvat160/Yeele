class FormGroup {
    #value = [];
    #type;
    #container;
    #label;

    constructor(type = false) {
        this.#type = type;
        this.#container = this.#createElement('div')
        this.#container.setAttribute('class', 'form-group')
        this.#label = this.#createElement('label')
        this.#label.setAttribute('for', 'value')
    }

    element() {
        switch (this.#type) {
            case true:
                this.ValuesInput = this.#createElement('input')
                this.#fillOfAttributes(
                    this.ValuesInput,
                    {
                        type: 'hidden',
                        name: 'value',
                    }
                )
                this.#container.setAttribute('id', 'select_value')
                this.valuesContainer = this.#createElement('div')
                this.valuesContainer.setAttribute('class', "my-2")
                this.#label.innerHTML = "Ajoute les valeurs à sélectionner par le participant"
                this.row = this.#createElement('div')
                this.row.setAttribute('class', 'row')
                this.inputCol = this.#createElement('div')
                this.inputCol.setAttribute('class', 'col-10')
                this.btnCol = this.#createElement('div')
                this.btnCol.setAttribute('class', 'col-2')
                this.input = this.#createElement('input')
                this.hiddenInput = this.#createElement('input')
                this.hiddenInput.setAttribute('type', 'hidden')
                this.hiddenInput.setAttribute('name', 'value')
                this.#updateValues()
                this.btn = this.#createElement('button')
                this.btn.innerHTML = "Ajouter"
                this.#fillOfAttributes(
                    this.input, 
                    {
                        type: 'text',
                        id: 'value',
                        class: 'form-control',
                        placeholder: "Entrez une valeur"
                    }
                    )
                this.#fillOfAttributes(
                    this.btn,
                    {
                        type: 'button',
                        class: 'btn btn-info',
                        id: 'btn_add_option'
                    }
                )
                this.btn.addEventListener('click', this.#addOption.bind(this), false)
                
                this.inputCol.append(this.input)
                this.btnCol.append(this.btn)

                this.row.append(
                    this.inputCol,
                    this.btnCol
                )

                this.#container.append(
                    this.#label,
                    this.valuesContainer,
                    this.hiddenInput,
                    this.row
                )

                return this.#container;
        
            default:
                this.input = this.#createElement('input')
                this.#fillOfAttributes(
                    this.input, 
                    {
                        type: 'text',
                        name: 'value',
                        id: 'value',
                        class: 'form-control',
                        placeholder: "Entrez une valeur par défaut"
                    }
                    )
                    this.#label.innerHTML = "Valeur par défaut"
                    this.#container.setAttribute('id', 'default_value')
                    this.#container.append(this.#label, this.input)
                    return this.#container;
        }

    }

    #updateValues() {
        this.hiddenInput.setAttribute('value', JSON.stringify(this.#value))
        this.valuesContainer.innerHTML = ""
        this.#value.forEach(value => {
            this.valuesContainer.innerHTML += `
                <div class="m-1 px-2 py-1 rounded-pill" style="width: fit-content; background-color: #ddd;">
                    <span>${value}</span>
                    <button class="bg-transparent border-0 close_value_btn" onClick="${this.handleClick}" type="button">x</button>
                </div>
            `
        })

        this.closeValueBtns = Array.from(document.querySelectorAll('.close_value_btn'))
        this.closeValueBtns.forEach((closeBtn) => {
            closeBtn.addEventListener('click', this.handleClick.bind(this))
        })
    }

    handleClick(e) {
        const index = this.closeValueBtns.findIndex(element => element === e.target)
        this.selectValuesUpdate(index)
    }

    #addOption() { 
        this.#value.push(this.input.value)
        this.#updateValues()
        this.input.value = ""
    }
    
    #createElement(element) {
        return document.createElement(element)
    }

    #fillOfAttributes(element, attributesObj) {
        for(let key in attributesObj) {
            element.setAttribute(key, attributesObj[key])
        }
    }

    selectValuesUpdate(index) {
        this.#value.splice(index, 1)
        this.#updateValues()
    }
}

$('#add_modal_form_body select').on('change', function() {
    const selected = this.options[this.selectedIndex].value
    if(selected != 'select') {
        const formGroup = new FormGroup;
        if($('#add_modal_form_body #select_value')[0]) {
            $('#add_modal_form_body #select_value').remove()
            $('#add_modal_form_body').append(formGroup.element())
        } else if(!$('#add_modal_form_body #default_value')[0]) {
            $('#add_modal_form_body').append(formGroup.element())
        }   
    } else {
        const formGroup = new FormGroup(true)
        if($('#add_modal_form_body #default_value')[0]) {
            $('#add_modal_form_body #default_value').remove()
            $('#add_modal_form_body').append(formGroup.element())
        } else if(!$('#add_modal_form_body #select_value')[0]) {
            $('#add_modal_form_body').append(formGroup.element())
        }
    }
})