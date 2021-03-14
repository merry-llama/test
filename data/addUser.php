<?php
include("connectdb.php");

$name = "";
$sql = "";

if(!empty($_POST['insertName'])) {
    $name = $_POST['insertName'];

    $sql = "insert into users (full_name, status_id) SELECT '" . $name . "', id FROM status_user WHERE name = 'первый'";

    if($result = mysqli_query($conn, $sql)){
       echo $result;
    }
  
    mysqli_close($conn);
}

//print_r($sql);

?>