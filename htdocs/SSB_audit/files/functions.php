<?php

function isUserExist($con,$login){    
    $searchUserSQL = "SELECT login FROM users WHERE login = '$login'";
    $rsUser = mysqli_query($con,$searchUserSQL);
    return mysqli_num_rows($rsUser);
}

function addUserSQL($con,$login,$name,$surname,$email,$safePass,$active){
    $insertUserSQL = "
        INSERT INTO users
        (login,name,surname,email,password,active)
        VALUES('$login','$name','$surname','$email','$safePass',$active)
    ";

    if(mysqli_query($con,$insertUserSQL)){
        return True;
    }else{
        echo $insertUserSQL;
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