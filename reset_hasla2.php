<?php
session_start();
echo "<meta charset='UTF-8'>";

$servername = 'mysql.agh.edu.pl';
$username = 'tereszki';
$base_password = 'BLEZxy43unRroif9';
$dbname = 'tereszki';
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Reset hasła</title>
</head>
<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbconn = mysqli_connect($servername, $username, $base_password, $dbname);
    if (!$dbconn) {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }
    
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $nowe_haslo = password_hash($_POST['nowe_haslo'], PASSWORD_DEFAULT);

    $query = "UPDATE users_projekt SET user_password='$nowe_haslo' WHERE user_email='$email'";
    $result = mysqli_query($dbconn, $query);

    if ($result) {
        echo "<div class='user-info'>Hasło zostało zresetowane pomyslnie!</div>";
    } else {
        echo "<div class='user-info'>Błąd: " . mysqli_error($dbconn) . "</div>";
    }

    mysqli_close($dbconn);
}

?>
<br>
<div class="container">
    <a href="./logowanie.php" class="button">Zaloguj</a><br>
</div>
</body>
</html>