<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartaments Figuerencs</title>
    <?php controllerLibs() ?>
    <link rel="icon" href="imatges/ApartamentsFiguerencs.png" type="image/x-icon">
    
</head>
<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <!-- Example Code -->
    <?php controllerMenu() ?>
    <div class="position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 bg-white rounded">
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom d'usuari</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"
          >Contrasenya</label
        >
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
      </div>
      
      <button type="submit" class="btn btn-primary">Iniciar sessió</button>
      <div class="mb-3">
        <p>No tens un compte creat? <a href="index.php?r=signup">Registrat</a></p>
      </div>
    </form>
</div>
    <!-- End Example Code -->
  </body>
  
</html>
