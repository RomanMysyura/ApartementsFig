

<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $apartment['title'];?></title>


</head>
<body>
<?php include '../src/views/menu.php';?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="bg-primary p-3 bg-dark rounded">

                    <h1 class="text-white">DADES DEL APARTAMENT</h1>

                    <?php include '../src/models/infoapartaments.php';?>

                    <h1 class="text-white">GOOGLE MAPS</h1>
                    

                    <div id="map"></div>


                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
     integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
     crossorigin=""></script>
     <script src="js/scripts.js"></script>
</body>
</html>
