<?php
$host = 'localhost';
$dbUsername = 'user1';
$dbPassword = 'qwerty';
$dbName = 'forsite1';

$mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_error) {
    die('Ошибка подключения: ' . $mysqli->connect_error);
}

$query = "SELECT id, servicename, port FROM services";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Название сервиса</th><th>Порт</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['servicename'] . "</td>";
        echo "<td>" . $row['port'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Нет данных для отображения.";
}
$mysqli->close();
?>