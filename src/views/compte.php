<!DOCTYPE html>
<html lang="en">

<head>
    <title>ApartamentsFiguerencs</title>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php require "menu.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-3 mt-md-0">
                <div class="bg-primary p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-user fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">DADES PERSONALS</h1>
                    <div class="p-3">
                        <ul class="list-group list-group-flush rounded">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-2">
                                        <div class="fw-bold">Nom:</div>
                                        <?php  echo $users[0]["name"] ;?>
                                    </div>
                                    <a id="mostrarFormulariName" class="float-end"> <button
                                            class="btneditar btn-settings">Editar</button></a>
                                </div>
                            </li>

                            <form id="formulariName" method="post" action="" class="text-center" style="display: none;">
                                <div class="mb-3">
                                    <label for="name" class="form-label text-white"></label>
                                    <input type="tel" class="texteditdades" id="name" name="name" placeholder="Nom"
                                        required>
                                </div>
                                <button type="submit" class="confirmaredit">Confirmar</button>
                            </form>

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-2">
                                        <div class="fw-bold">Cognoms:</div>
                                        <?php  echo $users[0]["last_name"] ;?>
                                    </div>
                                    <a id="mostrarFormulariSurName" class="float-end"> <button
                                            class="btneditar btn-settings">Editar</button></a>

                                </div>
                            </li>
                            <form id="formulariSurName" method="post" action="" class="text-center"
                                style="display: none;">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label"></label>
                                    <input type="tel" class="texteditdades" id="last_name" name="last_name"
                                        placeholder="Cognom" required>
                                </div>
                                <button type="submit" class="confirmaredit">Confirmar</button>
                            </form>

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-2">
                                        <div class="fw-bold">Telèfon:</div>
                                        <?php  echo $users[0]["telephone"] ;?>
                                    </div>
                                    <a id="mostrarFormulariTelephone" class="float-end"> <button
                                            class="btneditar btn-settings">Editar</button></a>
                                </div>
                            </li>
                            <form id="formulariTelephone" method="post" action="" class="text-center"
                                style="display: none;">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label"></label>
                                    <input type="tel" class="texteditdades" id="telephone" name="telephone"
                                        placeholder="987654321" required>
                                </div>
                                <button type="submit" class="confirmaredit">Confirmar</button>
                            </form>

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-2">
                                        <div class="fw-bold">Correu Electrònic:</div>
                                        <?php  echo $users[0]["email"] ;?>
                                    </div>
                                    <a id="mostrarFormulariEmail" class="float-end"> <button
                                            class="btneditar btn-settings">Editar</button></a>
                                </div>
                            </li>
                            <form id="formulariEmail" method="post" action="" class="text-center"
                                style="display: none;">
                                <div class="mb-3">
                                    <label for="email" class="form-label"></label>
                                    <input type="text" class="texteditdades" id="email" name="email"
                                        placeholder="1234567891011121" required>
                                </div>
                                <button type="submit" class="confirmaredit">Confirmar</button>
                            </form>

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-2">
                                        <div class="fw-bold">Tarjeta de crèdit:</div>
                                        <?php  echo $users[0]["card_number"] ;?>
                                    </div>
                                    <a id="mostrarFormulariCard" class="float-end"> <button
                                            class="btneditar btn-settings">Editar</button></a>
                                </div>
                            </li>
                        </ul>
                        <form id="formulariCard" method="post" action="" class="text-center" style="display: none;">
                            <div class="mb-3">
                                <label for="credit_card" class="form-label"></label>
                                <input type="text" class="texteditdades" id="credit_card" name="credit_card"
                                    placeholder="1234567891011121" required>
                            </div>
                            <button type="submit" class="confirmaredit">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3 mt-md-0">
                <!-- Sección derecha -->
                <div class="bg-second p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-house fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">RESERVES</h1>
                    <?php 
                    $numeroreserva = 0;
                    $numeroreservanum = 1;
                    foreach($reservations as $reservation) { 
                        ?>

                    <div class="p-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header"
                                    id="heading' . <?php echo $reservations[$numeroreserva]["id_reserved"]?> . '">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse' <?php echo $reservations[$numeroreserva]["id_reserved"]?> '"
                                        aria-expanded="true"
                                        aria-controls="collapse' <?php echo $reservations[$numeroreserva]["id_reserved"]?> '">
                                        <?php echo 'Reserva: ' . $numeroreservanum; ?>
                                    </button>
                                </h2>
                                <div id="collapse'  <?php echo $reservations[$numeroreserva]["id_reserved"]?> '"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="heading'  <?php echo $reservations[$numeroreserva]["id_reserved"]?> '"
                                    data-bs-parent="#reservationsAccordion">
                                    <div class="accordion-body">
                                        <strong>Fecha de Entrada:</strong>
                                        <?php echo $reservations[$numeroreserva]["entry_date"]?><br>
                                        <strong>Fecha de Salida:</strong>
                                        <?php echo $reservations[$numeroreserva]["output_date"]?><br>
                                        <strong>Estado:</strong> <?php echo $reservations[$numeroreserva]["state"]?><br>
                                        <strong>Precio:</strong> <?php echo $reservations[$numeroreserva]["price"]?><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php 
                        $numeroreserva++;
                        $numeroreservanum++;
                        } ?>


                </div>
            </div>
        </div>
    </div>















    ?>
    </div>
</body>

</html>