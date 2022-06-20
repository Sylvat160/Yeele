const container = document.getElementById("additional_fields_container");
const form = JSON.parse(container.dataset.fields);
const formRenderOpts = {
    dataType: "json",
    formData: form,
};
$(container).formRender(formRenderOpts);
$(".form-group label").each(function () {
    $(this).attr("style", "font-size: 14px; font-weight: 600;");
});
$('.formbuilder-required').each(function() {
    $(this).attr('style', 'margin-left: 3px;')
})
$(".form-control").each(function () {
    $(this).attr(
        "class",
        "h-11 mt-1 bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
    );
});
