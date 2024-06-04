<?php
session_start();
if (!isset($_SESSION["current_user"])) {
    header("Location: logowanie.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Zmiana hasła</title>
    </head>
<body>
<div class="container">
    <form method="post" action="zmiana_hasla2.php">
        <label for="current_password">Aktualne Hasło:</label>
        <input type="password" name="current_password" id="current_password" required><br>
        <label for="new_password">Nowe Hasło:</label>
        <input type="password" name="new_password" id="new_password" required><br>
        <label for="confirm_password">Potwierdź Nowe Hasło:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br>
        <input type="submit" name="change_password" value="Zmień Hasło">
    </form>

    <a href="./login.php" class="button">Powrót</a><br>
</div>

</body>
</html>
