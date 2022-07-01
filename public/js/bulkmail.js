import State from "./state.js";

$(function () {
    $("#usersData")
        .DataTable({
            responsive: false,
            lengthChange: false,
            autoWidth: false,
            paging: true,
            buttons: [],
            language: {
                searchPlaceholder: "Rechercher ...",
                lengthMenu: "Afficher _MENU_ enregistrements par page",
                zeroRecords: "Aucune participant trouvé",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "",
                infoFiltered: "(Filtré à partir de la liste _MAX_.)",
                lengthMenu: "Montrer _MENU_ enrégistrement(s).",
                loadingRecords: "Chargement...",
                processing: "En cours...",
                search: "_INPUT_",
                placeholder: "Rechercher",
                info: "_TOTAL_ enrégistrement(s)",
                infoEmpty: "0 enregistrement",
                zeroRecords: "Aucune participant trouvé",
                paginate: {
                    first: "Premier",
                    last: "Dernier",
                    next: "Suivant",
                    previous: "Précédent",
                },
            },
        })
        .buttons()
        .container()
        .appendTo("#data_wrapper .col-md-6:eq(0)");
});
$(function () {
    $("#compose-textarea").summernote();
});
//Enable check and uncheck all functionality
$("#checkAll").click(function () {
    const clicks = $(this).data("clicks");
    if (clicks) {
        //Uncheck all checkboxes
        $(".checkbox").prop("checked", false);
        $(".checkbox-toggle .far.fa-check-square")
            .removeClass("fa-check-square")
            .addClass("fa-square");
        window.dispatchEvent(new Event("allCheckboxesUnchecked"));
    } else {
        //Check all checkboxes
        $(".checkbox").prop("checked", true);
        $(".checkbox-toggle .far.fa-square")
            .removeClass("fa-square")
            .addClass("fa-check-square");
        window.dispatchEvent(new Event("allCheckboxesChecked"));
    }
    $(this).data("clicks", !clicks);
});

//Checkboxes

const checkedEmailState = new State([]);

window.addEventListener("checkedMailChanged", handleCheckoutsChange);
window.addEventListener("allCheckboxesChecked", function () {
    const data = jQuery.map($(".checkbox"), function (checkbox) {
        return checkbox.value;
    });
    checkedEmailState.setValue(data, "checkedMailChanged");
});

window.addEventListener("allCheckboxesUnchecked", function () {
    checkedEmailState.setValue([], "checkedMailChanged");
});

function handleCheckoutsChange() {
    const value = checkedEmailState.getValue();
    $("#checkedemails").attr("value", JSON.stringify(value));
}

$(".checkbox").each(function () {
    $(this).on("change", function () {
        const checkedEmails = checkedEmailState.getValue();
        const value = this.value;
        const index = emailExist(value);
        console.log(index);
        if (this.checked && index == -1) {
            checkedEmailState.setValue(
                [...checkedEmails, value],
                "checkedMailChanged"
            );
        } else {
            checkedEmails.splice(index, 1);
            checkedEmailState.setValue(checkedEmails, "checkedMailChanged");
        }
    });
});

/**
 * Check for given email index in the checkedEmailState.
 * Return the found index or -1 otherwise.
 * @param {String} email
 * @returns number
 */

function emailExist(email) {
    const checkedEmails = checkedEmailState.getValue();
    const emailIndex = checkedEmails.findIndex(
        (currentEmail) => currentEmail == email
    );
    return emailIndex;
}

//Uploaded files names

watchFileInput("certificate");
watchFileInput("badge");

/**
 * Watch a file input change.
 * @param {String} id
 */
function watchFileInput(id) {
    const fileInput = $(`#${id}`);
    fileInput.on("change", function () {
        const uploadedFile = $(this).prop("files")[0];
        $(`#${id}Name`).html(uploadedFile.name);
    });
}
