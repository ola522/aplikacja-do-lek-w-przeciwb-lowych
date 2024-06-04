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
if (!isset($_SESSION["current_user"])) {
    header("Location: logowanie.php");
    exit();
}

$servername = 'mysql.agh.edu.pl';
$username = 'tereszki';
$base_password = 'BLEZxy43unRroif9';
$dbname = 'tereszki';

$dbconn = mysqli_connect($servername, $username, $base_password, $dbname);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_password"])) {
    $current_password = mysqli_real_escape_string($dbconn, $_POST["current_password"]);
    $new_password = mysqli_real_escape_string($dbconn, $_POST["new_password"]);
    $confirm_password = mysqli_real_escape_string($dbconn, $_POST["confirm_password"]);

    if ($new_password !== $confirm_password) {
        echo "<div class='user-info'>Hasła nie są takie same!</div>";
        exit();
    }

    $user_id = $_SESSION["current_user"];
    $query = "SELECT * FROM users_projekt WHERE user_id = '$user_id'";
    $result = mysqli_query($dbconn, $query);

    if (mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
        $hash = $record["user_password"];

        if (password_verify($current_password, $hash)) {
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users_projekt SET user_password = '$new_password_hash' WHERE user_id = '$user_id'";

            if (mysqli_query($dbconn, $update_query)) {
                echo "<div class='user-info'>Hasło zostało zmienione</div>";
            } else {
                echo "<div class='user-info'>Błąd</div>" . mysqli_error($dbconn);
            }
        } else {
            echo "<div class='user-info'>Aktualne hasło jest nieprawidłowe.</div>";
        }
    } else {
        echo "<div class='user-info'>Użytkownik nie został znaleziony.</div>";
    }
}
?>
<html>
<body>
<br>
<div class="container">
    <a href="./login.php" class="button">Powrót</a><br>
</div>
</body>
</html>