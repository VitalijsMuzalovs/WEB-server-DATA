<?php
function isUserExist($username){
    require("connect.php");
    $searchUserSQL = "SELECT * FROM lietotaji WHERE lietoajs = '$username'";
    $rsUser = mysqli_query($con,$searchUserSQL);
    return mysqli_num_rows($rsUser);
}

?>