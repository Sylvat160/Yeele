const partAddData = JSON.parse(
    $("#additional_fields_container").attr("data-participant-additional-data")
);

const fieldsKeys = Object.keys(partAddData)

fieldsKeys.forEach(key => {
    const field = document.getElementById(key)
    if(field instanceof HTMLSelectElement) {
        document
        .querySelector(`#${key} option[value="${partAddData[key]}"]`)
        .setAttribute('selected', true)
    } else if(field instanceof HTMLInputElement) {
        const type = field.getAttribute("type")
        if(!['file', 'checkbox'].includes(type)) {
            document
            .getElementById(key)
            .setAttribute('value', partAddData[key])
        } else if(type == "checkbox") {
            document
            .getElementById(key)
            .setAttribute('checked', true)
        }
    } else if(field instanceof HTMLTextAreaElement) {
        document
        .getElementById(key)
        .innerHTML = partAddData[key]
    }
});