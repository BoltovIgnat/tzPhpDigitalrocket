<?php
$mysqli = new mysqli("localhost", "root", "", "cars");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM main ORDER BY car");

while ($row = $res->fetch_assoc()) {
    if ($row['modification'] == ''){
        $modification='none';
    }else{
        $modification=$row['modification'];
    }
    $cars[$row['car']][$row['model']][$row['type']][$modification][]= $row;
}

