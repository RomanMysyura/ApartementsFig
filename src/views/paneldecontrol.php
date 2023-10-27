<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "menu.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuarios</title>
    <script src="js/scripts.js"></script>
</head>

<body>
<h1 class="panelusuaris">Usuaris</h1>
    
    <?php include '../src/models/paneldecontrol.php';?>

    <div class="taulausuaris scrollable-table">
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
                        <form method="post" action="">
                            <input type="hidden" name="user_id" value="<?= $user['id_user'] ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <h1 class="llistadeusuaris"></h1>

    <div class="">
                <?php
            if (!empty($error_message)) {
                echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . $error_message . '</div>';
            }
            ?>
            </div>
    <div class="taulausuaris scrollable-table">
    
    <form method="POST" action="">
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
                    <td><input type="text" class="form-control" id="name" name="name" placeholder="Nom" required></td>
                    <td><input type="text" class="form-control" id="last_name" name="last_name" placeholder="Cognoms" required></td>
                    <td><input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telèfon" required></td>
                    <td><input type="email" class="form-control" id="email" name="email" placeholder="Correu Electrònic" required></td>
                    <td><input type="password" class="form-control" id="password" name="password" placeholder="Contrasenya" required></td>
                    <td><select class="form-control" id="id_role" name="id_role" required>
                                <option value="1">USUARI</option>
                                <option value="2">GESTOR</option>
                            </select>
                    </td>
                    <td><button type="submit" class="btnlogin btn btn-primary " id="BotonLogin">Crear</button>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
        </form>
    </div>








  



    <h1 class="panelapartaments">Apartaments</h1>
    
    <div class="taulaapartaments scrollable-table">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
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
            <?php foreach ($apartments as $apartment): ?>
                <tr>
                    <form method="POST" action="">
                        <input type="hidden" name="apartment_id" value="<?= $apartment['id_apartment'] ?>">
                        <td><?= $apartment['id_apartment'] ?></td>
                        <td><input type="text" name="title" value="<?= $apartment['title'] ?>"></td>
                        <td><input type="text" name="postal_address" value="<?= $apartment['postal_address'] ?>"></td>
                        <td><input type="text" name="length" value="<?= $apartment['length'] ?>"></td>
                        <td><input type="text" name="latitude" value="<?= $apartment['latitude'] ?>"></td>
                        <td><input type="text" name="short_description" value="<?= $apartment['short_description'] ?>"></td>
                        <td><input type="text" name="square_metres" value="<?= $apartment['square_metres'] ?>"></td>
                        <td><input type="text" name="number_rooms" value="<?= $apartment['number_rooms'] ?>"></td>
                        <td><input type="text" name="services_extra" value="<?= $apartment['services_extra'] ?>"></td>
                        <td><input type="text" name="price_day_low_season" value="<?= $apartment['price_day_low_season'] ?>"></td>
                        <td><input type="text" name="price_day_high_season" value="<?= $apartment['price_day_high_season'] ?>"></td>
                        <td><button type="submit" class="btn btn-primary">Guardar</button></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
</body>

</html>