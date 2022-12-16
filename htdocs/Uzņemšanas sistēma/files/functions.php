<?php

function isPositionExist($connect_db,$spec,$exceptMe){
    if($exceptMe){
        $searchUserSQL = "SELECT nosaukums FROM specialitates WHERE nosaukums = '$spec' AND specialitates_ID <> $exceptMe";
    }else{
        $searchUserSQL = "SELECT nosaukums FROM specialitates WHERE nosaukums = '$spec'";
    }
    
    $rsSpecialitate = mysqli_query($connect_db,$searchUserSQL);
    return mysqli_num_rows($rsSpecialitate);
}

function addPositionSQL($connect_db,$specialitate,$description,$imgURL){
    $insertUserSQL = "
        INSERT INTO users
        (login,name,surname,email,password,active)
        VALUES($specialitate,$description,$imgURL)
    ";

    if(mysqli_query($connect_db,$insertUserSQL)){
        return True;
    }else{
        // echo $insertUserSQL;
        return False;
    }
}

function deleteUser($user){
    require('connect.php');
    $deletetUserSQL = "
        UPDATE users SET active = 0 WHERE login = '$user'
    ";

    if(mysqli_query($con,$deletetUserSQL)){
        return True;
    }else{
        echo "Error";
        return False;
    }
}
?>