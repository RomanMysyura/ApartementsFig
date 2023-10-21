<?php include '../src/models/login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar sessió</title>
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <?php require "menu.php" ?>
    <div class="container mt-5">
        <?php
        if (!empty($error_message)) {
            echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . $error_message . '</div>';
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div class="card p-4 bg-dark container-opacity" data-bs-theme="dark">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="/img/ApartamentsFiguerencs2.ico" alt="ApartamentsFiguerencs" width="100px" height="100px">
                    </div>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Correu electrònic</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Introdueix el teu correu" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contrasenya</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entra la contrasenya." />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary mb-2 text-center">Iniciar sessió</button>
                        </div>
                        <div class="mb-3">
                            <p class="text-center text-white">No tens cap compte? <a href="index.php?r=signup" class="text-decoration-none text-primary-emphasis">Registra't</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
