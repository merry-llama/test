<?php
include("connectdb.php");

if($result = mysqli_query($conn, "select * from status_user")){
   
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
    { 
        echo "<option value=\"".$data['id']."\">".$data['name']."</option>";
    }
    
    mysqli_close($conn);
}
?>