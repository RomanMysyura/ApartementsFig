

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

// Accede a las variables latitude y length
var mapElement = document.getElementById('map');
var latitude = mapElement.getAttribute('data-latitude') || latitude;
var length = mapElement.getAttribute('data-length') || length;

// Luego, utiliza latitude y length como lo necesites
var map = L.map('map').setView([latitude, length], 7);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([latitude, length]).addTo(map);




