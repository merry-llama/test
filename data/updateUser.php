<?php
include("connectdb.php");

$sql = "";
$name = "";
$id = "";
$statusId = "";


if(!empty($_POST['name'])) {
    
    $name = $_POST['name'];
    $id = $_POST['id'];
    $statusId = $_POST['status'];

    $sql = "update users set full_name = '".$name."', status_id = ".$statusId." WHERE id = ".$id."";

    if($result = mysqli_query($conn, $sql)){
       echo $result;
    }
  
    mysqli_close($conn);
}


?>