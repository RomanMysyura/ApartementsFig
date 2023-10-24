<?php include '../src/models/infoapartaments.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $apartment['title'];?></title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhgdvP2TCdvFJ9uPbJM-IS6eRx8NG7DMU"></script>


    

  
</head>
<body>
<?php include '../src/views/menu.php';?>

    <div class="container mt-5x">
        <div class="row">
            <div class="col-12">
                <div class="bg-primary p-3 bg-dark rounded">

                    <h1 class="text-white">DADES DEL APARTAMENT</h1>

                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                    </ol>

                    <h1 class="text-white">GOOGLE MAPS</h1>
                    <div id="map">

                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
