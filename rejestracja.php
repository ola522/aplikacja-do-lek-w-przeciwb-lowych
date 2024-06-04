<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Rejestracja</title>
    </head>
<body>
    <div class="container">
    <div class='welcome-info'>Aplikacja do monitorowania ilości <br> przyjmowanych leków przeciwbólowych</div>
    <div class='welcome-info2'>Zarejestruj się!</div>


<form method="POST" action="rejestrator.php">
    <input type="text" name="name" placeholder="Imię i nazwisko"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Hasło"><br>
    <input type="submit" name="submit" placeholder="Wyślij"><br>
</form>

<br>
<div class='welcome-info2'>Masz konto? Zaloguj się!</div>
    <a href="./logowanie.php" class="button">Zaloguj</a><br>

</div>
</body>
</html>
        