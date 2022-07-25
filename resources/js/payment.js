function payment() {
    const container = document.getElementById('payment_container')
    
    if(container !== undefined) {
        const methodSelect = document.getElementById('payment_method')
        const paymentMethods = JSON.parse(container.dataset.paymentMethods)

        methodSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex].value
            
            if(paymentMethods.includes(selectedOption)) {
                const html = generatePaymentFields(selectedOption)
                container.innerHTML = html
            }
        })
    }
}

/**
 * Generate payment field depending on selected method
 * @param {String} option 
 */
function generatePaymentFields(option) {

    if(option === "Mobile Money") {
        const countries = ["Benin", "Burkina Faso", "Cameroun", "Côte d'Ivoire", "Guinée", "Mali", "RDC", "Sénégal", "Togo"]
        const countriesOptions = getCountriesAsHTMLOptions(countries)
        const html = `
                    <div class="bg-gray-50 w-full p-2.5 border border-gray-300 rounded-lg">
                        <h1 class="text-center font-semibold">Paiement par Mobile Money</h1>
                        <div class="mt-5 mb-3">
                            <label for="payment_countries" class="block mb-2 text-sm font-semibold text-gray-900">
                                <span>Pays</span>
                                <span class="text-red-600">*</span>
                            </label>
                            <select name="payment_countries" id="payment_countries"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                required>
                                <option value="" class="hidden" selected>Choisissez un pays</option>
                                ${countriesOptions}
                            </select>
                        </div>
                    </div>
                `

                return html
    } else {
        const countriesState = {
            value: '',
            setValue(newValue) {
                this.value = newValue
                window.dispatchEvent(new Event('countriesGot'))
            }
        }
        fetch(`${window.location.origin}/countries.json`).then((response) => {
            response.json().then((data) => {
                const countries = Object.values(data)
                const placeholder = '<option value="" class="hidden" selected>Choisissez un pays</option>'
                const countriesOptions = placeholder + getCountriesAsHTMLOptions(countries)
                countriesState.setValue(countriesOptions)
            });
        });


        let html = `
        <div class="bg-gray-50 w-full p-2.5 border border-gray-300 rounded-lg">
            <h1 class="text-center font-semibold">Paiement par Carte bancaire</h1>
            <h2 class="text-center font-semibold">Somme à payer: 10000 FCFA</h2>
            <div class="mt-5 mb-3">
                <label for="payment_countries" class="block mb-2 text-sm font-semibold text-gray-900">
                    <span>Pays</span>
                    <span class="text-red-600">*</span>
                </label>
                <select name="payment_countries" id="payment_countries"
                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required>
                </select>
            </div>
            <div class="mb-3">
            <label for="phone" class="block mb-2 text-sm font-semibold text-gray-900">
            <span>Téléphone</span>
            <span class="text-red-600">*</span>
        </label>
        <input type="number" name="phone" id="phone"
            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
            placeholder="ex: (+226) XXXXXXXX" required>
            </div>
        </div>
    `

    window.addEventListener('countriesGot', _ => {
        document.getElementById('payment_countries').innerHTML = countriesState.value
    })

        return html
    }
}

/**
 * @param {String[]} countries 
 */
function getCountriesAsHTMLOptions(countries) {
    let countriesOptions = ""
    countries.forEach(country => countriesOptions += `<option value="${country}">${country}</option>`)
    return countriesOptions
}

module.exports = payment