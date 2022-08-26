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
        originalInput.name = `${originalInput.name}["${checkboxState.value}"]`
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                const copy = checkboxState.value
                
            })
        })
        window.addEventListener(newEventName, function() {
            console.log("Hello world");
        })

        if(container.dataset.isRequired) {
            document.getElementById('registration').addEventListener('submit', function(e) {
                if(state.value.length === 0) {
                    e.preventDefault()
                    container.querySelector('.checkbox-group-error').innerHTML = "Vous devez avoir au moins un choix."
                }
            })
            
        }
    })
}

module.exports = checkboxValidator