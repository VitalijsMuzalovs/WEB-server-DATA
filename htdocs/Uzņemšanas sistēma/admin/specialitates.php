<?php
    ob_start();
    $page = "specialitates";
    require "header.php";
?>

<?php
require("specialitates_content.php");
require("../files/functions.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $success_msg = False;

    if(isset($_POST['addPositionBtn'])){
        $specialitate = mysqli_real_escape_string($con,$_POST['specialitate']);
        $description = mysqli_real_escape_string($con,$_POST['description']);
        $imgURL = mysqli_real_escape_string($con,$_POST['img_url']);

        $isUploaded = uploadIMG();

        empty($_POST['isPositionActive'])? $isActive = 0 : $isActive = 1;

    
        $completedAllFields = !empty($specialitate) && !empty($description) && !empty($imgURL);
        $readyToRegister = False;

        if(isPositionExist($con,$specialitate,False)){
            $msg = "Specialītāte \'".$specialitate."\' jau existē!";
        }else{
            if(!$completedAllFields){
                $msg = "Lūdzu, aizpildiet visus laukus!";
            }else{
                if(!$isUploaded){
                    // $msg = "X3";
                    // exit();
                }else{
                    $readyToRegister = True;
                }
            }
        }

        if($readyToRegister){
            $insertPosition = addPositionSQL($con,$specialitate,$description,$imgURL,$isActive);                           
            if($insertPosition){
                $msg = "Jauna specialītāte ir veiksmīgi reģistrēta!";
                $success_msg = True;                               
            }else{
                echo "Error!";
            }
        }
    }
    


    if(isset($_POST['edit'])){
        $specialitates_ID = $_POST['edit'];
        $selectedPosition = mysqli_query($con,"SELECT * FROM specialitates WHERE specialitates_ID = $specialitates_ID");
        $rsByPositionID = mysqli_fetch_assoc($selectedPosition);
    ?>
        <script>
            document.getElementById('specialitate').value ="<?php echo $rsByPositionID['nosaukums'] ?>"
            document.getElementById('description').value ="<?php echo $rsByPositionID['apraksts'] ?>"
            document.getElementById('img_url').value ="<?php echo $rsByPositionID['attels_URL'] ?>"
            document.getElementById('chkActive').checked= "<?php echo $rsByPositionID['active']?True:False ?>"
            
            document.getElementById('addPositionBtn').classList.add('disabled')
            document.getElementById('addPositionBtn').type="button"
            document.getElementById('savePositionBtn').classList.remove('disabled')
            document.getElementById('savePositionBtn').type="submit"
            // document.getElementById('cancelEditPosition').classList.remove('disabled')
            // document.getElementById('cancelEditPosition').type="submit"
            document.getElementById('specialitates_ID').value = '<?php echo $rsByPositionID['specialitates_ID'] ?>'
        </script>
    <?php
    }

    if(isset($_POST['savePositionBtn'])){
        $success_msg = False;
        $specID = $_POST['specialitates_ID'];
        $nosaukums = mysqli_real_escape_string($con,$_POST['specialitate']);
        $apraksts = mysqli_real_escape_string($con,$_POST['description']);
        $attels_URL = mysqli_real_escape_string($con,$_POST['img_url']);

        empty($_POST['isPositionActive'])? $isActive = 0 : $isActive = 1;
    
        $completedAllFields = !empty($nosaukums) && !empty($apraksts) && !empty($attels_URL);
        $readyToRegister = False;

        if(isPositionExist($con,$nosaukums,$specID)){
            $msg = "Specialītāte \'".$nosaukums."\' jau eksistē!";
        }else{
            if(!$completedAllFields){
                $msg = "Lūdzu, aizpildiet visus laukus!";
            }else{
                $readyToRegister = True;
            }
        }

        if($readyToRegister){
            $savePosition = mysqli_query($con,"UPDATE specialitates SET nosaukums='$nosaukums',apraksts='$apraksts',attels_URL='$attels_URL',active=$isActive WHERE specialitates_ID=$specID");
            if($savePosition){
                $msg = "Specialītāte veiksmīgi SAGLABĀTA!";
                $success_msg = True;                               
            }else{
                echo "Error!";
            }
        }
    }

    if(isset($_POST['delete'])){
        $specialitates_ID = $_POST['delete'];
        $deletePosition = mysqli_query($con,"UPDATE specialitates SET active = 0 WHERE specialitates_ID = $specialitates_ID");
        if($deletePosition){
            $msg = "Specialītāte veiksmīgi DEAKTIVIZĒTA!";
            $success_msg = True;                               
        }else{
            echo "Error!";
        }
    }
    
    if (!empty($_POST)){
        echo "<script>displayEditForm()</script>";
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
// else{
//     echo "<div class='error'>ACCESS DENIED!</div>";
// }


include "footer.php";
ob_end_flush();
?>