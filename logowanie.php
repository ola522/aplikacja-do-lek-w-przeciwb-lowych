<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Logowanie</title>
    </head>
<body>
    <div class="container">
    <div class='welcome-info2'>Zaloguj się!</div>
<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Hasło"><br>
    <input type="submit" name="submit" placeholder="Wyślij"><br>
</form>
<a href="./reset_hasla.php" class="button">Nie pamiętam hasła</a><br>
<a href="./rejestracja.php" class="button">Rejestracja</a><br>
</div>
</body>
</html>