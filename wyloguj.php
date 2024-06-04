<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Wyloguj</title>
    </head>
<body>

<?php
    session_unset();
    session_destroy();

    if(isset($_SESSION["current_user"])){
        echo "<div class='user-info'>Użytkownik zalogowany</div>" .$_SESSION["current_user"]."<br>";


    } else {
        echo "<div class='user-info'>Jesteś wylogowany</div>";
    }
    ?>
<div class='container'>
<a href="./logowanie.php" class="button">Zaloguj</a><br>
</div>
</body>
</html>