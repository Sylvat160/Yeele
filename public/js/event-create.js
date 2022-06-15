//STATE

class State {
    #value = null;
    constructor(initValue) {
        if (initValue != null) this.#value = initValue;
    }
    getValue() {
        return this.#value;
    }

    setValue(newValue, dispatchedEvent = null) {
        this.#value = newValue;
        if (dispatchedEvent) window.dispatchEvent(new Event(dispatchedEvent));
    }
}

//

const countriesState = new State([]);

fetch("https://countriesnow.space/api/v0.1/countries").then((response) => {
    response.json().then((responseData) => {
        const { data } = responseData;
        const countries = data.map((countryData) => countryData.country);
        countriesState.setValue(countries, "countriesFilled");
    });
});

window.addEventListener("countriesFilled", function () {
    const data = countriesState.getValue();
    for (let country of data) {
        const option = document.createElement("option");
        option.setAttribute("value", country);
        option.innerHTML = country;
        $("#country")[0].appendChild(option);
    }
});

$('input[type="color"]').each(function() {
  $(this).on('input', function() {
    this.parentElement.setAttribute('style', `background-color: ${this.value}`)
  })
})

//Multi step form

const msFormState = new State(0)

//MSForm Element
updateMsStatus()
updateFieldSet()

window.addEventListener('stepChange', function() {
  updateMsStatus()
  updateFieldSet()
})

$('.next_btn').each(function() {
  $(this).on('click', function() {
    const step = Number(this.dataset.step)
    msFormState.setValue(step, 'stepChange')
  })
})
$('.prev_btn').each(function() {
  $(this).on('click', function() {
    const step = Number(this.dataset.step)
    msFormState.setValue(step, 'stepChange')
  })
})

function updateMsStatus() {
  const currentState = msFormState.getValue()
  $('#msStatus i').each(function(index) {
    switch (index) {
      case currentState:
        $(this).addClass('text-primary')
        break;
    
      default:
        if($(this).hasClass('text-primary')) $(this).removeClass('text-primary')
        break;
    }
  })
}

$('#msStatus i').each(function(index) {
  $(this).on('click', function() {
    msFormState.setValue(index, 'stepChange')
  })
})

function updateFieldSet() {
  const currentState = msFormState.getValue()
  $('#steps_container fieldset').each(function(index) {
    switch (index) {
      case currentState:
        if($(this).hasClass('d-none')) $(this).removeClass('d-none')
        break;
    
      default:
        if(!$(this).hasClass('d-none')) $(this).addClass('d-none')
        break;
    }
  })
}