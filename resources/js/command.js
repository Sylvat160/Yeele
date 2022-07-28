const paypaljs = require("@paypal/paypal-js");
const loadScript = paypaljs.loadScript;

const total_amount = $('#total_amount')

const plan_state = Object.create(state)
const duration_state = Object.create(state)
const amountState = {
    value: 0,
    setValue(newValue) {
        this.value = newValue
    }
}

const cinetPayBtnContainer = `
<button type="button" class="w-100 btn text-light" id="cinetPayBtn" style="height: 45px !important; background: rgb(29, 204, 23)">Paiement mobile</button>
`

$('#plan').on('change', function() {
  const price = Number(this.options[this.selectedIndex].dataset.price)
  plan_state.setValue(price)
})
$('#duration').on('change', function() {
  const duration = Number(this.options[this.selectedIndex].value)
  duration_state.setValue(duration)
})

$('#payment_method').on('change', function() {
    switch (Number(this.options[this.selectedIndex].value)) {
        case 2:
            $('#payment_container').html(cinetPayBtnContainer)
            break;
    
        case 4:
            $('#payment_container').html('')
            if(document.head.querySelector('style:last-of-type')) {
                document.head.querySelector('style:last-of-type').innerHTML = ""
            }
            paypalCheckout()
            break;
        
            default:
                if(document.head.querySelector('style:last-of-type')) {
                    document.head.querySelector('style:last-of-type').innerHTML = ""
                }
                $('#payment_container').html('')
            break;
    }

    if($('#cinetPayBtn')) {
        $('#cinetPayBtn').on('click', cinetpayCheckout)
    }
})

window.addEventListener('command', function() {
  const new_amount = plan_state.value * duration_state.value
  amountState.setValue(new_amount)
  total_amount.val(`${new_amount} FCFA`)
})

function paypalCheckout() {
    console.log(amountState.value);
    const amountToEUR = 1000 / 656
    loadScript({
        "client-id":
            "AXhjbIUZQQgC4VqCg9oYJ0v6w28uypEPd142He0Qp6fUmtWUKPHMI_AecQGwjazTH2Xj6HW6V0fDv8-z",
            currency: "EUR",
    }).then((paypal) => {
        paypal
            .Buttons({
                createOrder(data, actions) {
                    return actions.order.create({
                        purchase_units: [
                            {
                                amount: {
                                    value: amountToEUR.toFixed(2),
                                },
                            },
                        ],
                    });
                },
                onApprove(data, actions) {
                    document
                        .querySelector('input[name="payment_status"]')
                        .setAttribute("value", "1");
                },
            })
            .render("#payment_container");
    });
}


function cinetpayCheckout() {
    CinetPay.setConfig({
        apikey: "127698624362c6d628ee1773.76085360",
        site_id: "356030",
        notify_url: "http://mondomaine.com/notify/",
        mode: "PRODUCTION",
    });
    CinetPay.getCheckout({
        transaction_id: Math.floor(
            Math.random() * 100000000
        ).toString(),
        currency: "XOF",
        channels: "MOBILE_MONEY",
        description: "Paiement Yeele",
        amount: amountState.value,
    });
    CinetPay.waitResponse(function (data) {
        if (data.status == "REFUSED") {
            alert("Votre paiement a échoué. Veuillez réessayer!");
        } else if (data.status == "ACCEPTED") {
            document
                .querySelector('input[name="payment_status"]')
                .setAttribute("value", "1");
        }
    });
    CinetPay.onError(function (data) {
        console.log(data);
    });
}