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

                

  
$(document).ready(function() {
    $("#usuarios-tab").click(function() {
        $("#seasons-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").addClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").removeClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#edit-users").addClass("d-none");
    });

    $("#editar-usuaris-content").click(function() {
        $("#editar-usuaris-content").addClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#usuarios-content").addClass("d-none");
        $("#reservas-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").removeClass("d-none");


    });
    

    $("#afegir-usuaris-content").click(function() {
        $("#afegir-usuaris-content").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").removeClass("d-none");
        $("#reservas-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");

    });

    $("#reservas-tab").click(function() {
        $("#reservas-tab").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#reservas-content").removeClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
    });


    $("#apartaments-tab").click(function() {
        $("#apartaments-tab").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").removeClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
    });

    $("#afegir-apartaments-content").click(function() {
        $("#afegir-apartaments-content").addClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").removeClass("d-none");
        $("#edit-users").addClass("d-none");
    });


    $("#seasons-tab").click(function() {
        $("#seasons-tab").addClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#seasons-content").removeClass("d-none");
        $("#edit-users").addClass("d-none");
    });
    
    

    
});


$(document).ready(function() {
    $('#usuarios-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});


$(document).ready(function() {
    $('#reservas-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});


$(document).ready(function() {
    $('#apartament-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});

$(document).ready(function() {
    $('#seasons-table').DataTable({
         "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});



