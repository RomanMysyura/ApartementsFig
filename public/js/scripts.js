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
var apartamentId = $(this).data("apartament-id");


$(document).ready(function() {
    // Agrega un evento click en las tarjetas de apartamentos
    $(".card-body").on("click", function() {
        var apartamentId = $(this).data("apartament-id");

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

                if (data.length > 0) {
                    var apartamento = data[0];

                    // Llena el modal con la información obtenida
                    modal.find(".modal-title").text(apartamento.title);
                    var modalBody = modal.find(".modal-body");
                    modalBody.append("<p><strong>Short Description:</strong> " + apartamento.short_description + "</p>");
                    modalBody.append("<p><strong>Postal Address:</strong> " + apartamento.postal_address + "</p>");
                    modalBody.append("<p><strong>ID Apartment:</strong> " + apartamento.id_apartment + "</p>");
                } else {
                    console.log("No se encontraron datos del apartamento en la respuesta.");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX: " + errorThrown);
            }
        });
    });
});

