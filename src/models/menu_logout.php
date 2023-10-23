<?php if (isset($_COOKIE['username'])): ?>
    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Benvingut, <?php echo $_COOKIE['username']; ?>
    </a>
<?php else: ?>
    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Àrea d'usuari</a>
<?php endif; ?>

<ul class="dropdown-menu dropdown-menu-center">
    <?php if (isset($_COOKIE['username'])): ?>
        <li>
            <a class="dropdown-item" href="index.php?r=logout"><strong>Tancar sessió</strong></a>
        </li>
    <?php else: ?>
        <li>
            <a class="dropdown-item" href="index.php?r=signup"><strong>Registrar-se</strong></a>
        </li>
        <li>
            <a class="dropdown-item" href="index.php?r=login">Iniciar sessió</a>
        </li>
    <?php endif; ?>

    <?php 
    
    if (isset($_COOKIE["user_id"]) && isset($_COOKIE["username"])) {
        // Usuario iniciado, muestra el enlace a "compte.php"
        $compteLink = "index.php?r=compte";
    } else {
        // Usuario no iniciado, muestra el enlace a "login.php"
        $compteLink = "index.php?r=login";
    }
    ?>
