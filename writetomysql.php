<?php
$mysqli = new mysqli("localhost", "root", "", "cars");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
}
$cars = [];

$cars[]= array("car"=>"Audi", "model"=>"TT", "type"=>"2.0", "modification"=>"");
$cars[]= array("car"=>"Audi", "model"=>"TT", "type"=>"3.0", "modification"=>"");
$cars[]= array("car"=>"Audi", "model"=>"A4", "type"=>"2.0", "modification"=>"");
$cars[]= array("car"=>"Audi", "model"=>"A4", "type"=>"3.0", "modification"=>"");

$cars[]= array("car"=>"BMW", "model"=>"3", "type"=>"2.0", "modification"=>"");
$cars[]= array("car"=>"BMW", "model"=>"3", "type"=>"3.0", "modification"=>"");
$cars[]= array("car"=>"BMW", "model"=>"7", "type"=>"2.0", "modification"=>"");
$cars[]= array("car"=>"BMW", "model"=>"7", "type"=>"3.0", "modification"=>"");

$cars[]= array("car"=>"VW", "model"=>"Jetta", "type"=>"2.0", "modification"=>"");
$cars[]= array("car"=>"VW", "model"=>"Polo", "type"=>"2.0", "modification"=>"");

$cars[]= array("car"=>"LADA", "model"=>"Vesta", "type"=>"2.0", "modification"=>"original");
$cars[]= array("car"=>"LADA", "model"=>"Vesta", "type"=>"2.0", "modification"=>"Sport");
$cars[]= array("car"=>"LADA", "model"=>"Cross", "type"=>"2.0", "modification"=>"");

foreach ($cars as $key => $value) {

    $car = $value["car"];
    $model = $value["model"];
    $type = $value["type"];
    $modification = $value["modification"];
    $date = new DateTime();
    $nowdate = $date->format('Y-m-d H:i:s');
    if ($result = $mysqli->query("SELECT * FROM main WHERE `car` LIKE '$car' AND `model` LIKE '$model' AND `type` LIKE '$type' AND `modification` LIKE '$modification' ORDER BY car")) {

        if ($result->num_rows > 0){
            $mysqli->query("UPDATE `main` SET `date_updated` = '$nowdate' WHERE `main`.`car` LIKE '$car' AND `main`.`model` LIKE '$model' AND `main`.`type` LIKE '$type' AND `main`.`modification` LIKE '$modification'");
        }else{
            $mysqli->query("INSERT INTO `main` (`id`, `car`, `model`, `type`, `date_added`, `date_updated`, `modification`) VALUES (NULL, '$car', '$model', '$type', '$nowdate', '$nowdate', '$modification')");
        }
        /* закрытие выборки */
        $result->close();
    }

}


/* закрытие соединения */
$mysqli->close();


