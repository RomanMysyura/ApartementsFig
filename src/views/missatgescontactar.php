<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <script src="js/scripts.js"></script>
    <?php require 'libs.php'; ?>

</head>
<body>
    <?php require "menu.php" ?>
    <h3 class="sloganweb">Missatges rebuts</h3>
   <!-- ... tu HTML ... -->

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Missatge</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $messages): ?>
        <tr>
            <th scope="row"><?= $messages['id'] ?></th>
            <td><?= $messages['name'] ?></td>
            <td><?= $messages['email'] ?></td>
            <td><?= $messages['message'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- ... tu HTML ... -->



    <?php require "footer.php"; ?>

    
</body>
</html>