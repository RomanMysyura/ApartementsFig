<?php include '../src/models/EditUserInfo/editcard.php';?>
<?php include '../src/models/EditUserInfo/editemail.php';?>
<?php include '../src/models/EditUserInfo/edittelephone.php';?>
<?php include '../src/models/EditUserInfo/editsurname.php';?>
<?php include '../src/models/EditUserInfo/editname.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>El meu compte</title>
    
    <script src="js/scripts.js"></script>
</head>
<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <?php require "menu.php" ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-3 mt-md-0"> 
                <div class="bg-primary p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-user fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">DADES PERSONALS</h1>
                    <div class="p-3">
                        <?php include '../src/models/compte_dades.php';?>
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
                    <div class="p-3">
                        <?php include '../src/models/compte_reserves.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
</body>
</html>