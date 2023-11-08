$(document).ready(function() {
    var toggleSearchButton = $('#toggleSearchButton');
    var searchForm = $('#searchForm');

    searchForm.on('show.bs.collapse', function () {
        toggleSearchButton.text('Tancar');
    });

    searchForm.on('hide.bs.collapse', function () {
        toggleSearchButton.text('Obrir');
    });
});




var map;

$(document).ready(function() {

    $('#exampleModal').on('shown.bs.modal', function (e) {
        if (map) {
            map.invalidateSize(); // Refresh the map when the modal is opened
        }
    });

    $(".card-body").off("click").on("click", function() {
        var $this = $(this);
        var apartamentId = $this.data("apartament-id");

        $.ajax({
            type: "GET",
            url: "index.php?r=infoapartamentajax",
            data: { apartament_id: apartamentId },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {

                if (map) { map.remove(); }

                

                var apartment = data['apartament'][0];
                var lowSeason = data['season'][0];
                var highSeason = data['season'][1];

                var price = getPrice(apartment, lowSeason, highSeason);

                // Rellenar los elementos HTML con los datos obtenidos
                $(".modal-title").text(apartment.title);
                $(".address").text(apartment.postal_address);
                $(".length_latitude").text(apartment.latitude + " - " + apartment.length);
                $(".square_metres").text(apartment.square_metres + " m²");
                $(".number_rooms").text(apartment.number_rooms + " habitaciones");
                $(".services_extra").text(apartment.services_extra);
                $(".short_description").text(apartment.short_description);
                $(".price").text(price + " € per dia");

                // Llenar los valores de los campos ocultos
                $("#apartment_id").val(apartment.id_apartment);
                $("#high_price").val(apartment.price_day_high_season);
                $("#low_price").val(apartment.price_day_low_season);

                // Actualiza los atributos "min" y "max" de los campos de fecha
                $("#start_Date").datepicker("option", "minDate", apartment.start_date);
                $("#start_Date").datepicker("option", "maxDate", apartment.end_date);
                $("#end_Date").datepicker("option", "minDate", apartment.start_date);
                $("#end_Date").datepicker("option", "maxDate", apartment.end_date);

                function getPrice(apartment, lowSeason, highSeason) {
                    if (apartment.start_date >= lowSeason.start_date && apartment.end_date <= lowSeason.end_date) {
                        return apartment.price_day_low_season;
                    } else if (apartment.start_date >= highSeason.start_date && apartment.end_date <= highSeason.end_date) {
                        return apartment.price_day_high_season;
                    } else {
                        var highSeasonDays = Math.max(0, Math.min(apartment.start_date, highSeason.end_date) - Math.max(apartment.start_date, highSeason.start_date)) + 1;
                        var lowSeasonDays = Math.max(0, Math.min(apartment.start_date, lowSeason.end_date) - Math.max(apartment.start_date, lowSeason.start_date)) + 1;

                        if (highSeasonDays > lowSeasonDays) {
                            return apartment.price_day_high_season;
                        } else {
                            return apartment.price_day_low_season;
                        }
                    }
                }

                map = L.map('map').setView([apartment.latitude, apartment.length], 7);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                 maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
               
                var marker = L.marker([apartment.latitude, apartment.length]).addTo(map);

               

            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX: " + errorThrown);
            }
        });
    });
});



$(function() {
    $("#end_Date").datepicker({
        dateFormat: "yy-mm-dd", // Formato de fecha personalizado
        minDate: 0, // Establece la fecha mínima a hoy
        maxDate: "+1Y", // Establece la fecha máxima a un año a partir de hoy
        changeMonth: true, // Permite cambiar el mes
        changeYear: true, // Permite cambiar el año
    });

    $("#start_Date").datepicker({
        dateFormat: "yy-mm-dd", // Formato de fecha personalizado
        minDate: 0, // Establece la fecha mínima a hoy
        maxDate: "+1Y", // Establece la fecha máxima a un año a partir de hoy
        changeMonth: true, // Permite cambiar el mes
        changeYear: true, // Permite cambiar el año
    });

    // Abre el calendario al hacer clic en el input
    $("#end_Date").on("click", function() {
        $(this).datepicker("show");
    });

    $("#start_Date").on("click", function() {
        $(this).datepicker("show");
    });
}); 

                    
$(function() {
    $("#endDate").datepicker({
        dateFormat: "yy-mm-dd", // Formato de fecha personalizado
        minDate: 0, // Establece la fecha mínima a hoy
        maxDate: "+1Y", // Establece la fecha máxima a un año a partir de hoy
        changeMonth: true, // Permite cambiar el mes
        changeYear: true, // Permite cambiar el año
    });

    $("#startDate").datepicker({
        dateFormat: "yy-mm-dd", // Formato de fecha personalizado
        minDate: 0, // Establece la fecha mínima a hoy
        maxDate: "+1Y", // Establece la fecha máxima a un año a partir de hoy
        changeMonth: true, // Permite cambiar el mes
        changeYear: true, // Permite cambiar el año
    });

    // Abre el calendario al hacer clic en el input
    $("#endDate").on("click", function() {
        $(this).datepicker("show");
    });

    $("#startDate").on("click", function() {
        $(this).datepicker("show");
    });
});          

                

  