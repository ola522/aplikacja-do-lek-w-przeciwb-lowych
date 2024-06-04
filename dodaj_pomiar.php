<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Dodawanie pomiaru</title>
    </head>
<body>
    <div class="container">
    <form method="POST" action="dodaj_pomiar2.php">
        <label for="nr_tabs">Podaj ilość zażytego ibuprofenu w mg:</label>
        <br>
        <div class='welcome-info3'>Dawka ibuprofenu: zwykły=sprint=rapid=200mg, max=max rapid=400mg, ketokaps=50mg ketoprofenu</div>
        <br>
        <input type="int" name="nr_tabs"><br>
        <label for="pain">Podaj poziom odczuwanego bólu w skali 1-10:</label>
        <input type="int" name="pain"><br>
        <label for="period">Czy masz teraz okres?</label>
        <input type="checkbox" name="period" placeholder="Czy masz teraz okres?"><br>
        <label for="pain_type">Wybierz typ bólu:</label>
            <select name="pain_type" id="pain_type">
                <option value="migrenowy">migrenowy</option>
                <option value="zwykly">zwykły ból głowy</option>
                <option value="klasterowy">klasterowy</option>
                <option value="trudno pow">trudno powiedzieć</option>
                <option value="brzucha">brzucha (podczas okresu)</option>
                <option value="inny">inny</option>
            </select><br>
        <input type="submit" name="submit" placeholder="Wyślij"><br>
</form>
<a href="./login.php" class="button">Powrót</a><br>
</div>
</body>
</html>