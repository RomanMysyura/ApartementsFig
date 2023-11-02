<script src="js/scripts.js"></script>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="/img/ApartamentsFiguerencs2.ico" alt="Logo" width="50px" height="50px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        
                                
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Àrea d'usuari</a>
                       

                        <ul class="dropdown-menu dropdown-menu-center">
                         
                            <li>

                                <a class="dropdown-item" href="index.php?r=compte">El meu compte</a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?r=login">Iniciar sessió</a>
                            </li>
                      
                            <li>
                                <a class="dropdown-item" href="index.php?r=signup"><strong>Registrar-se</strong></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?r=logout"><strong>Tancar sessió</strong></a>
                            </li>








                            
                        </ul>
                        <div class="dropdown-divider"></div>

                    <li>

                    </li>
                </ul>
                </li>
                </ul>

                <button class="btn btn-primary d-lg-none my-3" data-bs-toggle="collapse" data-bs-target="#searchForm"
                    id="toggleSearchButton">Obrir buscador</button>

                    <form class="d-lg-flex collapse text-center mb-0" id="searchForm" method="GET">
                        <div class="form-group me-2 my-3">
                            <input class="form-control" type="date" id="startDate" name="startDate"/>
                        </div>
                        <div class="form-group me-2 my-3">
                            <input class="form-control" type="date" id="endDate" name="endDate"/>
                        </div>
                        <div class="form-group me-2 my-3">
                            <input class="form-control" type="number" id="numRooms" name="numRooms"
                                placeholder="Número d'habitacions" />
                        </div>
                        <div class="form-group me-2 my-3">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
            </div>
        </div>
    </nav>
</div>
</div>
