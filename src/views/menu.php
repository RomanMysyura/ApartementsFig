<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-rosa-oscuro" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?r=reservar">Reservar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?r=contactar">Contactar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?r=ubicacio">Ubicació</a>
                    </li>
                </ul>

                <!-- Botón para mostrar/ocultar el formulario de búsqueda -->
                <button class="btn btn-primary d-lg-none" data-bs-toggle="collapse" data-bs-target="#searchForm">Buscar</button>

                <!-- Formulario de búsqueda con clase "collapse" para ocultarlo por defecto en dispositivos móviles -->
                <form class="d-lg-flex mx-auto text-center mb-0 collapse" id="searchForm">
                    <!-- Contenido del formulario de búsqueda -->
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="regionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccionar Región
                            </button>
                            <div class="dropdown-menu" aria-labelledby="regionDropdown">
                                <a class="dropdown-item" href="#" data-region="region1">
                                    <img src="region1.jpg" alt="Región 1" class="region-image" />
                                    Región 1
                                </a>
                                <a class="dropdown-item" href="#" data-region="region2">
                                    <img src="region2.jpg" alt="Región 2" class="region-image" />
                                    Región 2
                                </a>
                                <a class="dropdown-item" href="#" data-region="region3">
                                    <img src="region3.jpg" alt="Región 3" class="region-image" />
                                    Región 3
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" id="startDate" placeholder="Fecha de inicio" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" id="endDate" placeholder="Fecha de fin" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" id="people" placeholder="Número de personas" />
                    </div>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </form>

                <ul class="navbar-nav me-right mb-0 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Àrea d'usuari</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="index.php?r=signup"><strong>Registrar-se</strong></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?r=login">Inici de sessió</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
