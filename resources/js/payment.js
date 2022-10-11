const paypaljs = require("@paypal/paypal-js");
const loadScript = paypaljs.loadScript;

const payment = () => {
    const paymentContainer = document.getElementById("payment_container");
    const paymentBtn = document.getElementById("paymentBtn");
    const paymentMethod = document.getElementById("payment_method");
    const priceSelect = document.getElementById("price");
    const registrationForm = document.getElementById("registration");

    if (priceSelect) {
        priceSelect.addEventListener("change", function () {
            const html = this.innerHTML
            const fields = [];
            const civility = document.getElementById('civility')
            
            //Get empty inputs

            Array.from(registrationForm.querySelectorAll("input")).forEach(
                (input) => {
                    if (!input.value) fields.push(input);
                }
            );

            //Get empty selects

            Array.from(registrationForm.querySelectorAll("select")).forEach(
                (select) => {
                    if (!select.value) fields.push(select);
                }
            );

            if (this.value != "" && fields.length === 0) {
                paymentMethod.removeAttribute("disabled");
            } else {
                this.innerHTML = html
                document.getElementById("payment_method").setAttribute("disabled", true);
                if(fields.includes(civility)) {
                    civility.focus()
                } else fields.shift().focus()
            }
        });
    }

    if (paymentContainer) {
        const directPayments = JSON.parse(
            paymentContainer.dataset.paymentMethods
        );
        if (paymentBtn) {
            paymentBtn.addEventListener("click", function () {
                handleMethodChange.call(paymentMethod, directPayments);
            });
        }
        paymentMethod.addEventListener("change", function () {
            handleMethodChange.call(paymentMethod, directPayments);
        });
        registrationForm.addEventListener("submit", function (e) {
            const paymentStatus = document.querySelector(
                'input[name="payment_status"]'
            );
            if (
                directPayments.includes(paymentMethod.value) &&
                Number(paymentStatus.value) === 0
            ) {
                e.preventDefault();
                document.getElementById("pm_error").innerText =
                    "Vous n'avez pas éffectué le paiement.";
            }
        });
    }
};

function handleMethodChange(directPayments) {
    const selected = this.options[this.selectedIndex];
    let amount = 0;
    const price = document.getElementById("price");
    if (price) amount = price.value;
    else {
        window.pricesValues.forEach((pv) => {
            amount += Object.values(pv)[0];
        });
    }
    if (selected.value !== "") {
        const value = selected.value;
        if (directPayments.includes(value)) {
            switch (value) {
                case "Mobile Money":
                    cinetpayCheckout({
                        transaction_id: Math.floor(
                            Math.random() * 100000000
                        ).toString(),
                        currency: "XOF",
                        channels: "MOBILE_MONEY",
                        description: "Paiement Yeele",
                        amount,
                    });
                    break;

                case "Carte bancaire":
                    paypalCheckout({ amount });
                    break;

                case "Régularisation":
                    document
                        .querySelector('input[name="payment_status"]')
                        .setAttribute("value", "1");
                    break;
            }
        }
    }
}

function paypalCheckout({ amount }) {
    const amountToEUR = amount / 656;
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
                    document.getElementById("payment_container").innerHTML = "";
                    document.getElementById("registration").submit();
                },
            })
            .render("#payment_container");
    });
}

function cinetpayCheckout(options) {
    document.getElementById("payment_container").innerHTML = "";
    CinetPay.setConfig({
        apikey: "127698624362c6d628ee1773.76085360",
        site_id: "356030",
        notify_url: "http://mondomaine.com/notify/",
        mode: "PRODUCTION",
    });
    CinetPay.getCheckout(options);
    CinetPay.waitResponse(function (data) {
        if (data.status == "REFUSED") {
            alert("Votre paiement a échoué. Veuillez réessayer!");
        } else if (data.status == "ACCEPTED") {
            document
                .querySelector('input[name="payment_status"]')
                .setAttribute("value", "1");

            document.getElementById("payment_container").innerHTML = "";
            document.getElementById("registration").submit();
        }
    });
    CinetPay.onError(function (data) {
        console.error(data);
    });
}

module.exports = payment;
