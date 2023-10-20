<?php
// 
include '../src/models/signup.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apartaments Figuerencs</title>

</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <?php require "menu.php" ?>

    <div class="container mt-5">
    <div class="mb-3">
        <?php
        if (!empty($error_message)) {
            echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . $error_message . '</div>';
        }
        ?>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div class="card p-4 bg-dark container-opacity" data-bs-theme="dark">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="/img/ApartamentsFiguerencs2.ico" alt="ApartamentsFiguerencs" width="100px"
                            height="100px">
                    </div>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label text-white">Cognoms</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Cognoms" />
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label text-white">Telèfon</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone"
                                placeholder="Telèfon" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Correu Electrònic</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Correu Electrònic" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contrasenya</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contrasenya" />
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="" href="index.php?r=registrar"><button type="submit"
                                    class="btnlogin btn btn-primary mb-2 text-center"
                                    id="BotonLogin">Registrar-se</button></a>
                        </div>
                        <div class="mb-3">
                            <p class="text-center text-white">Ja tens un compte creat? <a href="index.php?r=login"
                                    class="text-decoration-none text-primary-emphasis">Iniciar sessió</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>