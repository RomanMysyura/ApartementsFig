<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/scripts.js"></script>
</head>
<body>
    <?php require "menu.php" ?>
    <h3 class="sloganweb">CONTACTAR</h3>
    <div class="container formularicontactar">
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

    <?php require "footer.php"; ?>

    
</body>
</html>