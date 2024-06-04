<?php
echo "<meta charset='UTF-8'>";
    
    $servername = 'mysql.agh.edu.pl';
    $username = 'tereszki';
    $base_password = 'BLEZxy43unRroif9';
    $dbname = 'tereszki';

    $dbconn = mysqli_connect($servername, $username, $base_password, $dbname);
    if (!$dbconn) {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }

    $sql = "SELECT `user_id`, `ibuprofen_mg`, `pain_level`, `timestamp`, `pain_type`, `period` FROM `measurements`";
    $result = $dbconn->query($sql);

    function getColor($level) {
        $color = '';
        if($level==1) {$color = "#00FB00";}
        if($level==2) {$color = "#57FB00";}
        if($level==3) {$color = "#A4FB00";}
        if($level==4) {$color = "#DDFB00";}
        if($level==5) {$color = "#FFFF00";}
        if($level==6) {$color = "#FBD100";}
        if($level==7) {$color = "#FBA000";}
        if($level==8) {$color = "#F56309";}
        if($level==9) {$color = "#FB4C00";}
        if($level==10) {$color = "#FB0000";}

        return $color;
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Katalog</title>
</head>
<body>
<div class="container">
    <div class="table-container">
        <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID użytkownika</th>
                    <th>Ilość ibuprofenu [mg]</th>
                    <th>Poziom bólu</th>
                    <th>Rodzaj bólu</th>
                    <th>Okres</th>
                    <th>Czas dodania</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            $color = getColor($row["pain_level"]);

            echo "<tr>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["ibuprofen_mg"] . "</td>
                <td style='background-color: $color;'>" . $row["pain_level"] . "</td>
                <td>" . ($row["pain_type"]) . "</td>
                <td>" . ($row["period"]) . "</td>
                <td>" . ($row["timestamp"]) . "</td>
              </tr>";
            }
        echo "</table>";
    } else {
        echo "Brak wyników";
    }
    

?>
</div>
<div class='container'>
<a href="./login.php" class="button">Powrót</a><br>
</div>
</body>
</html>
