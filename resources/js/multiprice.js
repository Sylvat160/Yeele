function multiPrice() {
    const $ = selector => document.querySelector(selector)
    const $All = selector => document.querySelectorAll(selector)

    if($('input[name="prices"]') != undefined) {
        this.pricesInput = $('input[name="prices"]')
        this.prices = JSON.parse(this.pricesInput.value)
        const selectChangedEvent = new Event('selectChanged')
        
        /**
         * 
         * @param {String | object} value 
         */
        const pushPrice = (value) => {
            this.prices.push(value)
            window.dispatchEvent(selectChangedEvent)
        }

        /**
         * 
         * @param {string} priceId
         * @param {boolean} multiple 
         */
        const removePrice = (priceId, multiple = false) => {
            if(multiple) {
                const index = this.prices.findIndex(price => price[priceId])
                this.prices.splice(index, 1)
                window.dispatchEvent(selectChangedEvent)
            } else {
                const index = this.prices.findIndex(price => price == priceId)
                this.prices.splice(index, 1)
                window.dispatchEvent(selectChangedEvent)
            }
        }

        /**
         * Update pricesInput in case of change
         */
        const updatePricesInput = () => {
            this.pricesInput.setAttribute('value', `${JSON.stringify(this.prices)}`)
        }
        window.addEventListener('selectChanged', updatePricesInput)

        /**
         * Show dropdown on label click
         */
        $('label[for="price"]').addEventListener('click', function() {
            new Dropdown($('#prices'), $('#prices_btn'), {}).show()
        })

        $All('.price').forEach(price => {
            price.addEventListener('change', function() {
                const quantityInput = $(`input[data-target-price="#${this.getAttribute('id')}"]`)
                switch (this.checked) {
                    case true:
                        if(quantityInput) {
                            quantityInput.removeAttribute('disabled')
                            const value = {}
                            value[this.getAttribute('id')] = quantityInput.value
                            pushPrice(value)
                        } else {
                            pushPrice(this.getAttribute('id'))
                        }
                        break;
                
                    case false:
                        if(quantityInput) {
                            removePrice(this.getAttribute('id'), true)
                            quantityInput.value = 1
                            quantityInput.setAttribute('disabled', 'true')
                        } else removePrice(this.getAttribute('id'))
                        break;
                }
            })
        })

        $All('.quantity_input').forEach(quantityInput => {
            quantityInput.addEventListener('change', e => {
                const priceId = e.target.dataset.targetPrice.replace('#', '')
                const index = this.prices.findIndex(price => price == priceId)
                const newValue = {[priceId]: e.target.value}
                this.prices.splice(index, 1, newValue)
                window.dispatchEvent(selectChangedEvent)
            })
        })

    }
}

module.exports = multiPrice