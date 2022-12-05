<?php

function isUserExist($con,$username){    
    $searchUserSQL = "SELECT * FROM lietotaji WHERE lietotajs = '$username'";
    $rsUser = mysqli_query($con,$searchUserSQL);
    return mysqli_num_rows($rsUser);
}

function addUserSQL($con,$lietotajvards,$vards,$uzvards,$email,$safePass){
    $insertUserSQL = "
        INSERT INTO lietotaji
        (lietotajs,vards,uzvards,email,parole,active)
        VALUES('$lietotajvards','$vards','$uzvards','$email','$safePass',1)
    ";

    if(mysqli_query($con,$insertUserSQL)){
        return True;
    }else{
        return False;
    }
}

function deleteUser($user){
    require('connect.php');
    $deletetUserSQL = "
        UPDATE lietotaji SET active = 0 WHERE lietotajs = '$user'
    ";

    if(mysqli_query($con,$deletetUserSQL)){
        return True;
    }else{
        echo "Error";
        return False;
    }
}
?>