import State from './state.js'

//Init country state
const countriesState = new State([]);

//Fetch and update fill countries state
fetch(`${window.location.origin}/countries.json`).then((response) => {
    response.json().then((responseData) => {
        const data = Object.values(responseData)
        countriesState.setValue(data, "countriesFilled")
    });
});

//List countries in the form
window.addEventListener("countriesFilled", function () {
    const data = countriesState.getValue();
    for (let country of data) {
        const option = document.createElement("option");
        option.setAttribute("value", country);
        option.innerText = country;
        $("#country")[0].appendChild(option);
    }
});

//Listen to color input change and update its lable
$('input[type="color"]').each(function() {
  $(this).on('input', function() {
    this.parentElement.setAttribute('style', `background-color: ${this.value}`)
  })
})

//Got uploaded file name
$('#image').on('change', function() {
  const image = this.files[0]
  $('#image_label').html(image.name)
})

//Init msFormState
const msFormState = new State(0)

//Call msForm methods
updateMsStatus()
updateFieldSet()

//Listen to change and update msState
window.addEventListener('stepChange', function() {
  updateMsStatus()
  updateFieldSet()
})

//Listen to click event on msForm pagination buttons
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

/**
 * update msForm status circle
 * @return void
 */

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

//Listen to click event on msForm status button
$('#msStatus i').each(function(index) {
  $(this).on('click', function() {
    msFormState.setValue(index, 'stepChange')
  })
})

//Update msForm fieldset according to the status
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