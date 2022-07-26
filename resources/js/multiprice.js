function multiPrice() {
    const $ = selector => document.querySelector(selector)
    const $All = selector => document.querySelectorAll(selector)

    if($('input[name="prices"]') != undefined) {
        this.pricesInput = $('input[name="prices"]')
        this.prices = JSON.parse(this.pricesInput.value)
        this.pricesValues = []
        const selectChangedEvent = new Event('selectChanged')
        
        /**
         * Add price to selected prices cart
         * @param {String | object} value 
         */
        const pushPrice = (value) => {
            this.prices.push(value)
            window.dispatchEvent(selectChangedEvent)
        }

        /**
         * Add price value to values
         * @param {Object} value 
         */
        const pushPriceValue = (value) => {
            this.pricesValues.push(value)
        }

        /**
         * Remove price from selected prices cart
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
         * Remove price value from prices values
         * @param {string} priceId 
         */
        const removePriceValue = (priceId) => {
            const index = this.pricesValues.findIndex(price => priceId)
            this.pricesValues.splice(index, 1)
        }

        /**
         * Update pricesInput in case of change
         */
        window.addEventListener('selectChanged', () => {
            this.pricesInput.setAttribute('value', `${JSON.stringify(this.prices)}`)
        })

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
                        const priceValue = {}
                        priceValue[this.getAttribute('id')] = Number(this.dataset.value)
                        pushPriceValue(priceValue)
                        break;
                
                    case false:
                        if(quantityInput) {
                            removePrice(this.getAttribute('id'), true)
                            quantityInput.value = 1
                            quantityInput.setAttribute('disabled', 'true')
                        } else removePrice(this.getAttribute('id'))
                        removePriceValue(this.getAttribute('id'))
                        
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
                this.pricesValues[priceId] = Number(this.pricesValues[priceId]) * Number(e.target.value)
                window.dispatchEvent(selectChangedEvent)
            })
        })

    }
}

module.exports = multiPrice