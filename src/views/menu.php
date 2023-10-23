<script src="js/scripts.js"></script>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="/img/ApartamentsFiguerencs2.ico" alt="Logo" width="50px" height="50px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?r=reservar">Reserves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?r=contactar">Contactar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?r=ubicacio">Ubicació</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php include '../src/models/menu_logout.php'?>
                            <div class="dropdown-divider"></div>
                            <li>
                            <a class="nav-link active" href="<?php echo $compteLink; ?>">El meu compte</a>
                            </li>                                
                        </ul>
                    </li>
                </ul>

                <button class="btn btn-primary d-lg-none my-3" data-bs-toggle="collapse" data-bs-target="#searchForm" id="toggleSearchButton">Obrir buscador</button>

                <form class="d-lg-flex collapse text-center mb-0" id="searchForm" method="POST">
                    <div class="form-group me-2 my-3">
                        <input class="form-control me-sm-2" type="search" id="address" name="address" placeholder="Adreça postal">
                    </div>
                    <div class="form-group me-2 my-3">
                        <input class="form-control" type="number" id="numRooms" name="numRooms" placeholder="Número d'habitacions"/>
                    </div>
                    <div class="form-group me-2 my-3">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>

