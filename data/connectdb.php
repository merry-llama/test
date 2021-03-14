<?php

$dbhost = "localhost";
$dbname = "m92080o1_voxys";
$username = "m92080o1_voxys";
$password = "Lkhh(jV7e7W*E\A0";


$conn = mysqli_connect($dbhost, $username, $password, $dbname); 

if (!$conn) {
    die('Ошибка подключения к БД (' . mysqli_connect_errno() . ') '
    . mysqli_connect_error());
    exit();
}

?>