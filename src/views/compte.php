<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="container mt-5 contenidorcompte">
        <div class="row">
            <div class="col-md-6 mb-3 mt-md-0">
                <div class="bg-primary p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-user fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">DADES PERSONALS</h1>
                    <div class="p-3">

                    <form id="formulariName" method="post" action="index.php?r=updateuser" class="text-center">
                            
                            <div class="mb-1">
                                <p class="textform">Nom</p>
                                <input type="text" class="texteditdades" id="name" name="name" value="<?php echo $users[0]["name"]; ?>" placeholder="Nom" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Cognom:</p>
                                <input type="text" class="texteditdades" id="last_name" name="last_name" value="<?php echo $users[0]["last_name"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Telèfon:</p>
                                <input type="text" class="texteditdades" id="telephone" name="telephone" value="<?php echo $users[0]["telephone"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Correu Electrònic:</p>
                                <input type="text" class="texteditdades" id="email" name="email" value="<?php echo $users[0]["email"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Tarjeta de crèdit:</p>
                                <input type="text" class="texteditdades" id="card_number" name="card_number" value="<?php echo $users[0]["card_number"]; ?>" required>
                            </div>
                            
                            <button type="submit" class="confirmaredit">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sección derecha -->
            <div class="col-md-6 mb-3 mt-md-0">
                <div class="bg-second p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-house fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">RESERVES</h1>
                    <?php
                    $numeroreserva = 0;
                    $numeroreservanum = 1;
                    foreach ($reservations as $reservation) {
                    ?>
                        <div class="accordion" id="reservationsAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $reservations[$numeroreserva]["id_reserved"] ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                        aria-expanded="true"
                                        aria-controls="collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>">
                                        <?php echo 'Reserva: ' . $numeroreservanum; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="heading<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                    data-bs-parent="#reservationsAccordion">
                                    <div class="accordion-body">
                                        <strong>Fecha de Entrada:</strong>
                                        <?php echo $reservations[$numeroreserva]["entry_date"] ?><br>
                                        <strong>Fecha de Salida:</strong>
                                        <?php echo $reservations[$numeroreserva]["output_date"] ?><br>
                                        <strong>Estado:</strong> <?php echo $reservations[$numeroreserva]["state"] ?><br>
                                        <strong>Precio:</strong> <?php echo $reservations[$numeroreserva]["price"] ?><br>
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
    
    </div>

    <?php require "footer.php"; ?>
</body>
</html>
