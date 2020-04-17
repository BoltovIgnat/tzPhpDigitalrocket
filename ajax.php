<?php
$mysqli = new mysqli("localhost", "root", "", "cars");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
}

if ($result = $mysqli->query("SELECT * FROM main WHERE `car` LIKE '$_GET[q]' ORDER BY car")) {

    if ($result->num_rows > 0){
        echo 'true';
    }else{
        echo 'false';
    }
    /* закрытие выборки */
    $result->close();
}

$mysqli->close();
