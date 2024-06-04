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
<?php

$servername = 'mysql.agh.edu.pl';
$username = 'tereszki';
$base_password = 'BLEZxy43unRroif9';
$dbname = 'tereszki';

$dbconn = mysqli_connect($servername, $username, $base_password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_email = mysqli_real_escape_string($dbconn, $_POST["email"]);
    $user_password = mysqli_real_escape_string($dbconn, $_POST["password"]);
    
    $query = mysqli_query($dbconn, "SELECT * FROM users_projekt WHERE user_email = '$user_email'");
    
    if(mysqli_num_rows($query) > 0){
        $record = mysqli_fetch_assoc($query);
        $hash = $record["user_password"];
        
        if(password_verify($user_password, $hash)) {
            $_SESSION["current_user"] = $record["user_id"];
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $status = "success";
            $user_id = $record["user_id"];
            
            $query2 = "INSERT INTO `login_attempts`(`user_id`, `user_email`, `status`, `ip_address`) VALUES ('$user_id', '$user_email', '$status', '$ip_address')";
            mysqli_query($dbconn, $query2);
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $status = "fail";
            
            $query2 = "INSERT INTO `login_attempts`(`user_email`, `status`, `ip_address`) VALUES ('$user_email', '$status', '$ip_address')";
            mysqli_query($dbconn, $query2);
        }
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $status = "fail";
        
        $query2 = "INSERT INTO `login_attempts`(`user_email`, `status`, `ip_address`) VALUES ('$user_email', '$status', '$ip_address')";
        mysqli_query($dbconn, $query2);
    }
}?>
<div class="container">
<div class='welcome-info2'>Witaj na stronie głównej!</div>
<br><br><br>
<div class="user-info">
<?php

if(isset($_SESSION["current_user"])){
    echo "Twój nr ID: " .$_SESSION["current_user"];    
} else {
    echo "Użytkownik nie jest zalogowany";
}
?>
</div>
<br>
<div class='container'>

<a href="./katalog_pomiarow.php" class="button">Katalog pomiarów</a><br>
<a href="./dodaj_pomiar.php" class="button">Dodaj pomiar</a><br>
<a href="./lista_log.php" class="button">Lista logowań</a><br>
<a href="./zmiana_hasla.php" class="button">Zmiana hasła</a><br>
<a href="./wyloguj.php" class="button">Wyloguj</a><br>
</div>
</body>
</html>