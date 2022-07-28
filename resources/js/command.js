const paypaljs = require("@paypal/paypal-js");
const loadScript = paypaljs.loadScript;

const total_amount = $('#total_amount')

const plan_state = Object.create(state)
const duration_state = Object.create(state)

$('#plan').on('change', function() {
  const price = Number(this.options[this.selectedIndex].dataset.price)
  plan_state.setValue(price)
})
$('#duration').on('change', function() {
  const duration = Number(this.options[this.selectedIndex].value)
  duration_state.setValue(duration)
})

window.addEventListener('command', function() {
  const new_amount = plan_state.value * duration_state.value
  total_amount.val(`${new_amount} FCFA`)
  console.log(new_amount);
})

window.addEventListener('load', function() {
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
            .render("#payPal");
    });
})