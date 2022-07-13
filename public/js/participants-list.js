$(function() {
    $("#usersData").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "paging": true,
        "buttons": ["excel", "pdf", "csv"],
        "language": {
            "searchPlaceholder": "Rechercher ...",
            "lengthMenu": "Afficher _MENU_ enregistrements par page",
            "zeroRecords": "Aucune participant trouvé",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "",
            "infoFiltered": "(Filtré à partir de la liste _MAX_.)",
            "lengthMenu": "Montrer _MENU_ enrégistrement(s).",
            "loadingRecords": "Chargement...",
            "processing": "En cours...",
            "search": "_INPUT_",
            "placeholder": "Rechercher",
            "info": "_TOTAL_ enrégistrement(s)",
            "infoEmpty": "0 enregistrement",
            "zeroRecords": "Aucune participant trouvé",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            },
        }
    }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
});

$('tbody tr').each(function() {
    if($(this).children().length < $('thead th').length) {
        const diff = $('thead th').length - $(this).children().length
        for(let i = 0; i < diff; i++) $(this).append('<td>Aucun</td>')
    }
})