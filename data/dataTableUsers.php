<?php
// include("dbconnect.php");
include("connectdb.php");

$typeUser = "";

if(!empty($_GET['user'])) {
  $typeUser = $_GET['user'];
}

// $conn = mysqli_connect($dbhost, $username, $password, $dbname); 

// if (!$conn) {
//     die('Ошибка подключения к БД (' . mysqli_connect_errno() . ') '
//     . mysqli_connect_error());
//     exit();
// }

if($result = mysqli_query($conn, "select u.id, u.full_name, su.id as 'status', su.name from users u inner join status_user su on su.id = u.status_id group by u.id")){
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
      //echo "<td>" . $data['status'] . "</td>";
      echo "<td>" . $data['name'] . "</td>";
      if ($typeUser == 'Администратор'){ 
        echo "<td><button class=\"btnSelect\" type=\"button\" data-toggle=\"modal\" data-target=\"#updateUserModal\" data-id=\"".$data['id']."\" data-name=\"".$data['full_name']."\" data-status=\"".$data['status']."\" ></button></td>";
      }  
      echo "</tr>";
  }
}

mysqli_close($conn);

?>
