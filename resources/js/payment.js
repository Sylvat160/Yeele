const payment = () => {
    const paymentContainer = document.getElementById("payment_container");

    if (paymentContainer) {
        const paymentBtn = document.getElementById('paymentBtn')
        const paymentMethod = document.getElementById("payment_method");
        const directPayments = JSON.parse(
            paymentContainer.dataset.paymentMethods
        );
        if(paymentBtn) {
            paymentBtn.addEventListener('click', function() {
                handleMethodChange.call(paymentMethod, directPayments);
            })
        }
        paymentMethod.addEventListener('change', function() {
            handleMethodChange.call(paymentMethod, directPayments)
        })
    }
};

function handleMethodChange(directPayments) {
    const selected = this.options[this.selectedIndex];
    let amount = 0
    const price = document.getElementById('price')
    if(price) amount = price.value
    else {
        window.pricesValues.forEach(pv => {
            amount += Object.values(pv)[0]
        })
    }
    if (selected.value !== "") {
        const value = selected.value;
        if (directPayments.includes(value)) {
            switch (value) {
                case "Mobile Money":
                    cinetpayCheckout({
                        transaction_id: Math.floor(Math.random() * 100000000).toString(),
                        currency: 'XOF',
                        channels: "MOBILE_MONEY",
                        description: "Paiement Yeele",
                        amount,
                    })
                    break;
            
                case "Carte bancaire":

                    break;
            }
        }
    }
}

function cinetpayCheckout(options) {
    CinetPay.setConfig({
        apikey: "127698624362c6d628ee1773.76085360",//   YOUR APIKEY
        site_id: "356030",//YOUR_SITE_ID
        notify_url: 'http://mondomaine.com/notify/',
        mode: 'PRODUCTION'
    });
    CinetPay.getCheckout(options);
    CinetPay.waitResponse(function(data) {
        if (data.status == "REFUSED") {
            alert("Votre paiement a échoué. Veuillez réessayer!")
        } else if (data.status == "ACCEPTED") {
            document.querySelector('input[name="payment_status"]').setAttribute('value', '1')
        }
    });
    CinetPay.onError(function(data) {
        console.log(data);
    });
}

module.exports = payment;
