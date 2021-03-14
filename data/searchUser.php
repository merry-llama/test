<?php
include("connectdb.php");

$uName = "";
$sName = "";
$check = "";
$sql = "";
$typeUser = "";

if(!empty($_POST['user'])) {
  $typeUser = $_POST['user'];
}

if(!empty($_POST['userName'])) {
    $uName = $_POST['userName'];
    $sName = "%" . $uName . "%";
}else {
    $sName = "%";
}

if(!empty($_POST['check'])) {
   
    $check .= "and (u.status_id in (";
    foreach($_POST['check'] as $key => $value){
        
        if((sizeof($_POST['check'])-1) == $key){           
            $check .= $value;       
        }else {
            $check .= $value . ", ";
        }           
    }
    $check .= "))";
}

$sql = "select u.id, u.full_name, su.id as 'status', su.name from users u inner join status_user su on su.id = u.status_id WHERE (u.full_name like '".$sName."')". $check;

if($result = mysqli_query($conn, $sql)){
    echo "<table class=\"table table-hover\">
    <thead>
      <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">ФИО</th>
        <th scope=\"col\">Статус</th>
      </tr>
    </thead>
    <tbody>";
    
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {   
        echo "<tr>";
        echo "<td scope=\"row\">" . $data['id'] . "</td>";
        echo "<td>" . $data['full_name'] . "</td>";
        echo "<td>" . $data['name'] . "</td>";
        if ($typeUser == 'Администратор'){ 
          echo "<td><button class=\"btnSelect\" type=\"button\" data-toggle=\"modal\" data-target=\"#updateUserModal\" data-id=\"".$data['id']."\" data-name=\"".$data['full_name']."\" data-status=\"".$data['status']."\" ></button></td>";
        }  
        echo "</tr>";
    }
  }
  
  mysqli_close($conn);



?>