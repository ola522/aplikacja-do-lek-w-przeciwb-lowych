<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dodawanie pomiaru</title>
</head>
<body>

<?php
session_start();
echo "<meta charset='UTF-8'>";

if (!isset($_SESSION['current_user'])) {
    echo "<div class='user-info'>Błąd: Użytkownik nie jest zalogowany.</div>";
}
$user_id = $_SESSION['current_user'];

$pain=$nr_tabs=$pain_type=$period="";
    
$servername = 'mysql.agh.edu.pl';
$username = 'tereszki';
$base_password = 'BLEZxy43unRroif9';
$dbname = 'tereszki';

function chgw($dane) {
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (empty($_POST["pain"])) {
        $painErr = "Podaj poziom bólu";
    } else {
        $pain=chgw($_POST["pain"]);
    }
    if (empty($_POST["nr_tabs"])) {
        $mailErr = "Podaj ilość ibuptofenu";
    } else {
        $nr_tabs=chgw($_POST["nr_tabs"]);
    }
    if (empty($_POST["pain_type"])) {
        $passErr = "Wybierz rodzaj bólu";
    } else {
        $pain_type=chgw($_POST["pain_type"]);
    }
    $period = isset($_POST["period"]) ? "TAK" : "NIE";

}

$dbconn = mysqli_connect($servername, $username, $base_password, $dbname);
$pain = mysqli_real_escape_string($dbconn, $pain);
$nr_tabs = mysqli_real_escape_string($dbconn, $nr_tabs);

$query = "INSERT INTO `measurements`(`user_id`, `ibuprofen_mg`, `pain_level`, `pain_type`, `period`) VALUES ('$user_id', '$nr_tabs', '$pain', '$pain_type', '$period')";

if (mysqli_query($dbconn, $query)) {
    echo "<div class='user-info'>Pomiar dodany!</div>";
} else {
    var_dump($dbconn);
    echo "<div class='user-info'>Błąd</div>";
}

?>
<br>
<div class="container">

    <a href="./katalog_pomiarow.php" class="button">Zobacz katalog pomiarów</a><br>
    <a href="./login.php" class="button">Powrót</a><br>
</div>
</body>
</html>