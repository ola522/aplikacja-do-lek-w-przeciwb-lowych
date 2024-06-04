<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Reset hasła</title>
</head>
<body>
<div class="container">
    <form method="post" action="reset_hasla2.php">
        <label for="email">Adres email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="nowe_haslo">Nowe hasło:</label><br>
        <input type="password" id="nowe_haslo" name="nowe_haslo" required><br><br>
        <input type="submit" value="Zresetuj hasło">
    </form>
</div>
</body>
</html>