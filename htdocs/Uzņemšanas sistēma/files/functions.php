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
    $success_msg = False;
    $target_dir = "../images/spec_img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $msg =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $msg =  "Fails nav attēls!";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $msg =  "Atvainojiet, fails jau eksistē.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      $msg =  "Atvainojiet, jūsu fails ir pārāk liels.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $msg = "Atļauti tikai JPG, JPEG, PNG & GIF faili.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      // $msg = "Fails netika augšupielādēts.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $success_msg=True;
        return True;
        // $msg = "The file ". $myVal = htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        $msg = "Augšupielādējot failu, radās kļūda.";
      }
    }

    if(!empty($msg)){
      echo "<script>document.getElementById('infomsg').innerHTML +='".$msg."' </script>";
      if($success_msg){
          echo "<script>document.getElementById('infomsg').classList.add('infomsg','success')</script>";
      }else{
          echo "<script>document.getElementById('infomsg').classList.add('infomsg')</script>";
      };
      if(!empty($msg)){
          header("Refresh:3,url=specialitates.php"); 
      }
  }

}
?>