<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php require 'libs.php'; ?>

    <script src="js/scripts.js"></script>
</head>
<body>
    <?php require "menu.php" ?>
    <h3 class="sloganweb">CONTACTAR</h3>
    <div class="d-flex flex-column align-items-center">
                <div class="card p-4 bg-dark container-opacity formularicontactar" data-bs-theme="dark">
        <form method="post" action="index.php?r=sendmessage">
            <div class="form-group inputformcontactar">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom:" required>
            </div>
            <div class="form-group inputformcontactar">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correu electronic:" required>
            </div>
            <div class="form-group inputformcontactar">
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="El teu missatge:" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btnformcontactar">Enviar</button>
        </form>
    </div>
    </div>



    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11810.674233273328!2d2.9549441243379095!3d42.264250069064275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ba8de7daf77b2d%3A0x2f451468ac1a35cb!2s17600%20Figueres%2C%20Girona!5e0!3m2!1ses!2ses!4v1699453295113!5m2!1ses!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?php require "footer.php"; ?>

    
</body>
</html>