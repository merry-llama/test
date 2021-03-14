<?php
include("connectdb.php");

if($result = mysqli_query($conn, "select * from status_user")){
   
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
    { 
        echo "<div class=\"form-check\">";
        echo "<input class=\"form-check-input\" name=\"check[]\" type=\"checkbox\" value=\"" .$data['id']  . "\">";
        echo "<label class=\"form-check-label\" for=\"". $data['id'] ."\">";
        echo $data['name'];
        echo "</label>";
        echo "</div>";
    }
    
    mysqli_close($conn);
}
?>