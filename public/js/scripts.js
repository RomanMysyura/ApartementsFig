
// Serveix per obrir o tencar els formularis de canvi de dades del usuari
$(document).ready(function() {
    $("#mostrarFormulariName").click(function() {
        $("#formulariName").toggle(); // Formulari per cambiar el Nom
    });
    $("#mostrarFormulariSurName").click(function() {
        $("#formulariSurName").toggle(); // Formulari per cambiar el Cognom
    });
    $("#mostrarFormulariTelephone").click(function() {
        $("#formulariTelephone").toggle(); // Formulari per cambiar el Telefon
    });
    $("#mostrarFormulariEmail").click(function() {
        $("#formulariEmail").toggle(); // Formulari per cambiar el Email
    });
    $("#mostrarFormulariCard").click(function() {
        $("#formulariCard").toggle(); // Formulari per cambiar la tarjeta de crédit
    });
});


$(document).ready(function() {
    var toggleSearchButton = $('#toggleSearchButton');
    var searchForm = $('#searchForm');

    searchForm.on('show.bs.collapse', function () {
        toggleSearchButton.text('Tancar buscador');
    });

    searchForm.on('hide.bs.collapse', function () {
        toggleSearchButton.text('Obrir buscador');
    });
});