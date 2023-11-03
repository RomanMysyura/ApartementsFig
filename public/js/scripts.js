
$(document).ready(function() {
    $("#mostrarFormulariName").click(function() {
        $("#formulariName").show();
    });
});
$(document).ready(function() {
    $("#mostrarFormulariSurName").click(function() {
        $("#formulariSurName").show();
    });
});
$(document).ready(function() {
    $("#mostrarFormulariTelephone").click(function() {
        $("#formulariTelephone").show();
    });
});
$(document).ready(function() {
    $("#mostrarFormulariEmail").click(function() {
        $("#formulariEmail").show();
    });
});
$(document).ready(function() {
    $("#mostrarFormulariCard").click(function() {
        $("#formulariCard").show();
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




