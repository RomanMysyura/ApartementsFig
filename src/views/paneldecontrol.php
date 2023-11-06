<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "menu.php" ?>
    <?php require 'libs.php'; ?>

    <title>Editar Usuaris</title>
    <script src="js/scripts.js"></script>
</head>

<body>

<div class="dashboarddiv">
    <div class="vertical-menu">
        <a href="#" id="usuarios-tab" class="active">Usuaris</a>
        <a href="#" id="afegir-usuaris-content"> - Afegir usuaris</a>
        <a href="#" id="reservas-tab">Reservas</a>
        <a href="#" id="apartaments-tab">Apartaments</a>
        <a href="#" id="afegir-apartaments-content"> - Afegir apartament</a>
    </div>

    <div id="usuarios-content" class="taulausuaris scrollable-table">
    <h1 class="panelusuaris">Usuaris</h1>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Cognom</th>
                        <th scope="col">Telèfon</th>
                        <th scope="col">Correu</th>
                        <th scope="col">Numero de tarjeta</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acció</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <th scope="row"><?= $user['id_user'] ?></th>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['telephone'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['card_number'] ?></td>
                        <td> <?php
                                if ($user['id_role'] == 1) {
                                    echo 'USUARI';
                                } elseif ($user['id_role'] == 2) {
                                echo 'GESTOR';
                                }
                    ?></td>
                        <td>
                            <form method="post" action="index.php?r=deleteuser">
                                <input type="hidden" name="user_id" value="<?= $user['id_user'] ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>




        <div id="afegir-content" class="taulausuaris scrollable-table d-none">
        <div class="taulaapartaments scrollable-table">
        <h1 class="panelusuaris">Afegir usuaris</h1>

                    <form method="POST" action="index.php?r=adduser">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Cognom</th>
                                    <th scope="col">Telèfon</th>
                                    <th scope="col">Correu</th>
                                    <th scope="col">Contrasenya</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acció</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><input type="hidden" id="formularipanel" name="formularipanel" value="1"></th>
                                    <td><input type="text" class="form-control" id="name" name="name" placeholder="Nom"
                                            required>
                                    </td>
                                    <td><input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Cognoms" required></td>
                                    <td><input type="tel" class="form-control" id="telephone" name="telephone"
                                            placeholder="Telèfon" required></td>
                                    <td><input type="email" class="form-control" id="email" name="email"
                                            placeholder="Correu Electrònic" required></td>
                                    <td><input type="password" class="form-control" id="password" name="password"
                                            placeholder="Contrasenya" required></td>
                                    <td><select class="form-control" id="id_role" name="id_role" required>
                                            <option value="1">USUARI</option>
                                            <option value="2">GESTOR</option>
                                        </select>
                                    </td>
                                    <td><button type="submit" class="btnlogin btn btn-primary "
                                            id="BotonLogin">Crear</button>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </form>

                </div>

                            </div>







        <div id="reservas-content" class="taulausuaris scrollable-table d-none">
        <h1 class="panelusuaris">Reservas</h1>

                    <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data d'entrada</th>
                    <th scope="col">Data de sortida</th>
                    <th scope="col">Estat</th>
                    <th scope="col">Preu</th>
                    <th scope="col">ID de l'usuari</th>
                    <th scope="col">ID de l'apartament</th>
                    <th scope="col">ID de la temporada</th>
                    <th scope="col">Acció</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <th scope="row"><?= $reservation['id_reserved'] ?></th>
                    <td>
                        <form method="post" action="index.php?r=updatereservation">
                            <input type="hidden" name="reservation_id" value="<?= $reservation['id_reserved'] ?>">
                            <input type="date" name="entry_date" value="<?= $reservation['entry_date'] ?>">
                    </td>
                    <td>
                        <input type="date" name="output_date" value="<?= $reservation['output_date'] ?>">
                    </td>
                    <td>
                        <input type="hidden" name="reservation_id" value="<?= $reservation['id_reserved'] ?>">
                        <select name="state">
                            <option value="Pending" <?= ($reservation['state'] === 'Pending') ? 'selected' : '' ?>>
                                Pending</option>
                            <option value="Confirmed" <?= ($reservation['state'] === 'Confirmed') ? 'selected' : '' ?>>
                                Confirmed</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </td>
                    <td><?= $reservation['price'] ?></td>
                    <td><?= $reservation['id_user'] ?></td>
                    <td><?= $reservation['id_apartment'] ?></td>
                    <td><?= $reservation['id_season'] ?></td>
                    <td>
                        <form method="post" action="index.php?r=deletereservation">
                            <input type="hidden" name="reservation_id" value="<?= $reservation['id_reserved'] ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




    <div id="apartament-content" class="taulausuaris scrollable-table d-none">
    <h1 class="panelusuaris">Apartaments</h1>

    <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Direcció</th>
                    <th scope="col">Longitut</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Descripció curta</th>
                    <th scope="col">Metres quadrats</th>
                    <th scope="col">N° Habitacions</th>
                    <th scope="col">Serveis extres</th>
                    <th scope="col">Preu baixa</th>
                    <th scope="col">Preu alta</th>
                    <th scope="col">Acció</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apartments as $apartment): ?>
                <tr>
                    <form method="POST" action="index.php?r=updateapartment">
                        <input type="hidden" name="apartment_id" value="<?= $apartment['id_apartment'] ?>">
                        <td><?= $apartment['id_apartment'] ?></td>
                        <td class="tdapart"><input class="inputapart inputtitol" type="text" name="title"
                                value="<?= $apartment['title'] ?>"></td>
                        <td class="tdapart"><input class="inputapart" type="text" name="postal_address"
                                value="<?= $apartment['postal_address'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputlenilat" type="text" name="length"
                                value="<?= $apartment['length'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputlenilat" type="text" name="latitude"
                                value="<?= $apartment['latitude'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputdescripciocurta" type="text"
                                name="short_description" value="<?= $apartment['short_description'] ?>">
                        </td>
                        <td class="tdapart"><input class="inputapart inpumq" type="text" name="square_metres"
                                value="<?= $apartment['square_metres'] ?>"></td>
                        <td class="tdapart"><input class="inputapart innumhab" type="text" name="number_rooms"
                                value="<?= $apartment['number_rooms'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputextra" type="text" name="services_extra"
                                value="<?= $apartment['services_extra'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputprice" type="text" name="price_day_low_season"
                                value="<?= $apartment['price_day_low_season'] ?>"></td>
                        <td class="tdapart"><input class="inputapart inputprice" type="text"
                                name="price_day_high_season" value="<?= $apartment['price_day_high_season'] ?>"></td>
                        <td class="tdapart"><button type="submit" class="btn btn-primary">Guardar</button></td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</div>



<div id="apartament-afegir" class="taulausuaris scrollable-table d-none">
<div class="taulaapartaments scrollable-table">
<h1 class="panelusuaris">Afegir apartaments</h1>

                    <form method="POST" action="index.php?r=addapartment">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Dirección Postal</th>
                                    <th scope="col">Longitud</th>
                                    <th scope="col">Latitud</th>
                                    <th scope="col">Descripción Corta</th>
                                    <th scope="col">Metros Cuadrados</th>
                                    <th scope="col">Número de Habitaciones</th>
                                    <th scope="col">Servicios Extra</th>
                                    <th scope="col">Precio en Temporada Baja</th>
                                    <th scope="col">Precio en Temporada Alta</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="title" placeholder="Título"
                                            required></td>
                                    <td><input type="text" class="form-control" name="postal_address"
                                            placeholder="Dirección Postal" required></td>
                                    <td><input type="text" class="form-control" name="length" placeholder="Longitud"
                                            required></td>
                                    <td><input type="text" class="form-control" name="latitude" placeholder="Latitud"
                                            required></td>
                                    <td><input type="text" class="form-control" name="short_description"
                                            placeholder="Descripción Corta" required></td>
                                    <td><input type="text" class="form-control" name="square_metres"
                                            placeholder="Metros Cuadrados" required></td>
                                    <td><input type="text" class="form-control" name="number_rooms"
                                            placeholder="Número de Habitaciones" required></td>
                                    <td><input type="text" class="form-control" name="services_extra"
                                            placeholder="Servicios Extra" required></td>
                                    <td><input type="text" class="form-control" name="price_day_low_season"
                                            placeholder="Precio en Temporada Baja" required></td>
                                    <td><input type="text" class="form-control" name="price_day_high_season"
                                            placeholder="Precio en Temporada Alta" required></td>
                                    <td><button type="submit" class="btn btn-primary">Agregar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>


                </div>





    </div>













</body>

</html>