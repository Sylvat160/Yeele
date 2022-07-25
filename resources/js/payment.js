function payment() {
    const container = document.getElementById('payment_container')
    
    if(container !== undefined) {
        const methodSelect = document.getElementById('payment_method')
        const paymentMethods = JSON.parse(container.dataset.paymentMethods)

        methodSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex].value
            
            if(paymentMethods.includes(selectedOption)) {
                generatePaymentFields(selectedOption)
            }
        })
    }
}

/**
 * Generate payment field depending on selected method
 * @param {String} option 
 */
function generatePaymentFields(option) {
    let html = ""
    if(option === "Mobile Money") {
        
    } else {
        
    }
}

module.exports = payment