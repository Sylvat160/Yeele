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
    }
});