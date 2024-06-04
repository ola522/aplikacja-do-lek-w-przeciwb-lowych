<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Lista logowań</title>
</head>
<body>
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

    $sql = "SELECT `id`, `user_id`, `user_email`, `status`, `attempt_time`, `ip_address` FROM `login_attempts`";
    $result = $dbconn->query($sql);
    ?>
    <div class="table">
    <div class="table-container">
        <?php

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>E-mail</th>
                    <th>Czas próby logowania</th>
                    <th>Status</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["user_email"] . "</td>
                <td>" . $row["attempt_time"] . "</td>
                <td>" . ($row["status"]) . "</td>
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
