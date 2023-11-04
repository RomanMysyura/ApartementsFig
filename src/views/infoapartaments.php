<div class="row">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= $apartament['image_path'];?>" class="d-block img-fluid" alt="Image for <?= $apartament["title"] ?>">    
                                </div>
                            </div>
                        </div>
                        <h2><?php echo $apartament["title"]; ?></h2>
                        <ul class="list-unstyled">
                            <li><i class="fa-solid fa-location-dot"></i> <?php echo $apartament["postal_address"]; ?></li>
                            <li><i class="fa-solid fa-map"></i> <span class="latitude"><?= $apartament["latitude"]; ?></span> <span class="longitude"><?= $apartament["length"]; ?></span></li>
                            <li><i class="fa-solid fa-house"></i> <?php echo $apartament["square_metres"] . " " . $apartament['number_rooms']; ?></li>
                            <li><i class="fa-solid fa-wifi"></i> <?php echo $apartament["services_extra"]; ?></li>
                            <li><i class="fa-solid fa-book"></i> <?php echo $apartament["short_description"]; ?></li>
                        </ul>
                        <div id="map" class="mt-3" style="width: 100%; height: 400px;"></div>
                        <form class="d-lg-flex collapse text-center mb-0" id="DoReservation" method="POST">
                            <div class="form-group me-2 my-3">
                                <input class="form-control" type="date" id="startDate" name="startDate"/>
                            </div>
                            <div class="form-group me-2 my-3">
                                <input class="form-control" type="date" id="endDate" name="endDate"/>
                            </div>
                            <div class="form-group me-2 my-3">
                                <button class="btn btn-primary" type="submit">Reservar</button>
                            </div>
                        </form>
                    </div>
                </div>    
      </div>