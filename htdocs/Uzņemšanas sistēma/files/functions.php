<?php

function isPositionExist($con,$spec,$exceptMe){
    if($exceptMe){
        $searchPositionSQL = "SELECT nosaukums FROM specialitates WHERE nosaukums = '$spec' AND specialitates_ID <> $exceptMe";
    }else{
        $searchPositionSQL = "SELECT nosaukums FROM specialitates WHERE nosaukums = '$spec'";
    }
    
    $rsSpecialitate = mysqli_query($con,$searchPositionSQL);
    return mysqli_num_rows($rsSpecialitate);
}

function addPositionSQL($con,$specialitate,$description,$imgURL,$active){
    $insertPositionSQL = "
        INSERT INTO specialitates
        (nosaukums,apraksts,attels_URL,active)
        VALUES('$specialitate','$description','$imgURL',$active)
    ";

    if(mysqli_query($con,$insertPositionSQL)){
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