<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h1>Lista de Usuarios</h1>
    <ul>
        <?php
        foreach ($users as $user) {
            echo "<li>{$user['name']}</li>";
        }
        ?>
    </ul>
    <script src="js/script.js"></script>
</body>

</html>