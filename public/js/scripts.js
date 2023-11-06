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


$(document).ready(function() {
    $(".card-body").off('click');

    // Agrega un evento click en las tarjetas de apartamentos
    $(".card-body").on("click", function() {
        var apartamentId = $(this).data("apartament-id");

        console.log(apartamentId);

        // Limpia la información anterior en la ventana modal
        var modal = $("#exampleModal");
        modal.find(".modal-title").text("");
        var modalBody = modal.find(".modal-body");
        modalBody.html("");

        // Realiza una petición AJAX para obtener la información del apartamento
        $.ajax({

            type: "GET",
            url: "index.php?r=infoapartamentajax",
            data: { apartament_id: apartamentId },
            contentType: "application/json; charset=utf-8",
            dataType: "json",

            success: function(data) {

                    console.log(data);

                    var apartment = data[0];

                    modal.find(".modal-title").text(apartment.title);

                    var modalBody = modal.find(".modal-body");

                    modalBody.append(
                        "<h1>On em quedaré?</h1>" + 
                        "<div id='map' class='mb-4'></div>"
                    );

                    modalBody.append(
                        "<ul class='list-group'>" +
                            "<li class='list-group-item'><i class='fa-solid fa-location-dot me-3'></i>" + apartment.postal_address + "</li>" +
                            "<li class='list-group-item'><i class='fa-solid fa-map me-3'></i> Length: " + apartment.length + " - Latitude: " + apartment.latitude + "</li>" +
                            "<li class='list-group-item'><i class='fa-solid fa-house me-3'></i> Metres quadrats: " + apartment.square_metres + " - Número d'habitacions: " + apartment.number_rooms + "</li>" +
                            "<li class='list-group-item'><i class='fa-solid fa-wifi me-3'></i>" + apartment.services_extra + "</li>" +
                            "<li class='list-group-item'><i class='fa-solid fa-book me-3'></i>" + apartment.short_description + "</li>" +
                        "</ul>"
                    );                  


                    modalBody.append(
                        "<form class='d-lg-flex collapse text-center mb-0' id='DoReservation' method='POST' action='index.php?r=doreservation'>" +
                        "<input type='hidden' name='apartment_id' id='apartment_id' value='" + apartment.id_apartment + "' />" +
                        "<input type='hidden' name='high_price' id='high_price' value='" + apartment.price_day_high_season + "' />" +
                        "<input type='hidden' name='low_price' id='low_price' value='" + apartment.price_day_low_season + "' />" +
                            "<div class='form-group me-2 my-3'>" +
                                "<input class='form-control' type='date' id='startDate' name='startDate' min='" + apartment.start_date + "' max='" + apartment.end_date + "'/>" +
                            "</div>" +
                            "<div class='form-group me-2 my-3'>" +
                                "<input class='form-control' type='date' id='endDate' name='endDate' min='" + apartment.start_date + "' max='" + apartment.end_date + "'/>" +
                            "</div>" +
                            "<div class='form-group me-2 my-3'>" +
                                "<button class='btn btn-primary' type='submit'>Reservar</button>" +
                            "</div>" +
                        "</form>"
                    );
                    
                    
                    
                    



                    var map = L.map('map').setView([apartment.latitude, apartment.length], 7);

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


  