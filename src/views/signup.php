<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartaments Figuerencs</title>
    <link rel="icon" href="imatges/ApartamentsFiguerencs.png" type="image/x-icon">
    <?php controllerLibs() ?>
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
<?php controllerMenu() ?>
<div class="position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 bg-white rounded">
<form method="POST" action="../controllers/registrar.php">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" />
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellido" />
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Teléfono" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" />
        </div>
        

       <a class="" href="index.php?r=registrar"><button type="button" class="btnlogin btn btn-primary"
                id="BotonLogin">Registrar</button></a>

        
        <div class="mb-3">
            <p>¿Ya tienes un cuenta creada? <a href="index.php?r=login">Inicia sesión</a></p>
        </div>
    </form>
</div>

    
</body>

</html>