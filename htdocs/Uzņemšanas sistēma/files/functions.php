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

function uploadIMG(){
    require('../files/connect_db.php');
    $target_dir = "../images/spec_img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". $myVal = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        echo $target_file;
        return $myVal;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}
?>