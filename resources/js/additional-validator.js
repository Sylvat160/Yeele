function checkboxValidator() {
    const state = {
        value: [],
        setState(newValue, eventName) {
            this.value = newValue
            window.dispatchEvent(new Event(eventName))
        }
    }
    const checkboxgroups = document.querySelectorAll('.is-checkbox-group')
    checkboxgroups.forEach(container => {
        const newEventName = `checkbox${new Date().getTime()}`
        const checkboxState = Object.create(state)
        const inputs = Array.from(container.querySelectorAll('input[type="checkbox"]'))
        const originalInput = container.querySelector('input[type="hidden"]')
        const checkedInputs = inputs.filter(input => {
            if(input.checked) return input
        })
        const values = checkedInputs.map((ci => {
            if(ci.checked) return ci.value
        }))
        checkboxState.setState(values, newEventName)
        originalInput.setAttribute('value', JSON.stringify(checkboxState.value))
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                const copy = checkboxState.value
                if(copy.includes(this.value)) {
                    const index = copy.findIndex(value => value === this.value)
                    copy.splice(index, 1)  
                } else copy.push(this.value)

                checkboxState.setState(copy, newEventName)
            })
        })
        window.addEventListener(newEventName, function() {
            originalInput.setAttribute('value', JSON.stringify(checkboxState.value))
        })

        if(container.dataset.isRequired) {
            document.getElementById('registration').addEventListener('submit', function(e) {
                if(checkboxState.value.length === 0) {
                    e.preventDefault()
                    container.querySelector('.checkbox-group-error').innerHTML = "Vous devez avoir au moins un choix."
                }
            })
        }
    })
}

module.exports = checkboxValidator