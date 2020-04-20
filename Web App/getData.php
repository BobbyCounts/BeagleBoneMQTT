

<?php

header("Access-Control-Allow-Origin: *");

$upperBound = $_GET["upperBound"];
$lowerBound = $_GET["lowerBound"];
$timezone = $_GET["timezone"];

$con = mysqli_connect('localhost','mqttServer','mariokart','mqttDatabase');   

$con->query("SET time_zone = '" . $timezone . "'");



$query = "SELECT * FROM `Temperature` WHERE Time BETWEEN '" . $lowerBound . "' AND '" . $upperBound . "' order by Time desc";



$result =$con->query($query);


$array = $result->fetch_all(MYSQLI_ASSOC);


$jsonResult = json_encode($array);

echo $jsonResult;



$con->close();

?>


