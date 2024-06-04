<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Rejestracja</title>
    </head>
<body>
<?php
session_start();
echo "<meta charset='UTF-8'>";

$user_fullname=$user_email=$user_password="";

function chgw($dane) {
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (empty($_POST["name"])) {
            $imErr = "Musisz podać imię!";
        } else {
                    $name=chgw($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $mailErr = "Musisz podać email!";
        } else {
                    $email=chgw($_POST["email"]);
        }
        if (empty($_POST["password"])) {
            $passErr = "Musisz podać haslo!";
        } else {
                    $psswd=chgw($_POST["password"]);
        }

    }
    
    $servername = 'mysql.agh.edu.pl';
    $username = 'tereszki';
    $base_password = 'BLEZxy43unRroif9';
    $dbname = 'tereszki';

    $dbconn = mysqli_connect($servername, $username, $base_password, $dbname);
    $user_name = mysqli_real_escape_string($dbconn, $name);
    $user_email = mysqli_real_escape_string($dbconn, $email);
    $user_password = mysqli_real_escape_string($dbconn, $psswd);

    

    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    echo "<br>".$imErr."<br>".$mailErr."<br>".$passErr;

    $query = "INSERT INTO `users_projekt`(`user_name`, `user_email`, `user_password`) VALUES ('$user_name', '$user_email', '$user_password')";

    
    if (mysqli_query($dbconn, $query)) {
        echo "<div class='user-info'>Rejestracja poprawna!</div>";
    } else {
        var_dump($dbconn);
        echo "<div class='user-info'>Błąd!</div>";
    }
    

?>
<div class="container">
<a href="./logowanie.php" class="button">Zaloguj</a><br>
</div>
</body>
</html>
