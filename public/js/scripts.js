$(document).ready(function() {
    $("#mostrarFormulariName").click(function() {
        $("#formulariName").toggle(); // Alternar la visibilidad del formulario al hacer clic en el botón.
    });
});

$(document).ready(function() {
    $("#mostrarFormulariSurName").click(function() {
        $("#formulariSurName").toggle(); // Alternar la visibilidad del formulario al hacer clic en el botón.
    });
});

$(document).ready(function() {
    $("#mostrarFormulariTelephone").click(function() {
        $("#formulariTelephone").toggle(); // Alternar la visibilidad del formulario al hacer clic en el botón.
    });
});

$(document).ready(function() {
    $("#mostrarFormulariEmail").click(function() {
        $("#formulariEmail").toggle(); // Alternar la visibilidad del formulario al hacer clic en el botón.
    });
});

$(document).ready(function() {
    $("#mostrarFormulariCard").click(function() {
        $("#formulariCard").toggle(); // Alternar la visibilidad del formulario al hacer clic en el botón.
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