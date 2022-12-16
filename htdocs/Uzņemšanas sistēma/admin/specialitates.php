<?php
    $page = "specialitates";
    require "header.php";
?>

<?php
require("specialitates_content.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $success_msg = False;

    if(isset($_POST['addPositionBtn'])){
        $specialitate = mysqli_real_escape_string($con,$_POST['specialitate']);
        $description = mysqli_real_escape_string($con,$_POST['description']);
        $imgURL = mysqli_real_escape_string($con,$_POST['img_url']);
    
        $completedAllFields = !empty($specialitate) && !empty($description) && !empty($imgURL);
        $readyToRegister = False;

        if(isPositionExist($con,$specialitate,False)){
            $msg = "Specialītāte \'".$specialitate."\' jau existē!";
        }else{
            if(!$completedAllFields){
                $msg = "Lūdzu, aizpildiet visus laukus!";
            }else{
                $readyToRegister = True;
            }
        }

        if($readyToRegister){
            $insertPosition = addPositionSQL($con,$specialitate,$description,$imgURL);                           
            if($insertPosition){
                $msg = "New user successfully registered!";
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
        // echo "<script>alert('{$specialitates_ID}')</script>";
    ?>
        <script>
            document.getElementById('specialitate').value ="<?php echo $rsByPositionID['nosaukums'] ?>"
            document.getElementById('description').value ="<?php echo $rsByPositionID['apraksts'] ?>"
            document.getElementById('img_url').value ="<?php echo $rsByPositionID['attels_URL'] ?>"
            
            document.getElementById('addPositionBtn').classList.add('disabled')
            document.getElementById('addPositionBtn').type="button"
            document.getElementById('savePositionBtn').classList.remove('disabled')
            document.getElementById('savePositionBtn').type="submit"
            document.getElementById('cancelEditPosition').classList.remove('disabled')
            document.getElementById('cancelEditPosition').type="submit"
            document.getElementById('specialitates_ID').value = '<?php echo $rsByPositionID['specialitates_ID'] ?>'
        </script>
    <?php
    }

    if(isset($_POST['savePositionBtn'])){
        $success_msg = False;
        $userID = $_POST['specialitates_ID'];
        $login = mysqli_real_escape_string($con,$_POST['login']);
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $surname = mysqli_real_escape_string($con,$_POST['surname']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        is_null($_POST['isUserActive'])? $isActive = 0 : $isActive = 1;
    
        $completedAllFields = !empty($login) && !empty($name) && !empty($surname);
        $readyToRegister = False;

        if(isPositionExist($con,$login,$userID)){
            $msg = "User \'".$login."\' is allready exist!";
        }else{
            if(!$completedAllFields){
                $msg = "Please, fill in all fields!";
            }else{
                $readyToRegister = True;
            }
        }

        if($readyToRegister){
            $saveUser = mysqli_query($con,"UPDATE users SET login='$login',name='$name',surname='$surname',email='$email',active=$isActive WHERE userID=$userID");
            if($saveUser){
                $msg = "User successfully SAVED!";
                $success_msg = True;                               
            }else{
                echo "Error!";
            }
        }
    }
    
    if(!empty($msg)){
        echo "<script>document.getElementById('info').innerHTML +='".$msg."' </script>";
        if($success_msg){
            echo "<script>document.getElementById('info').classList.add('info','success')</script>";
        }else{
            echo "<script>document.getElementById('info').classList.add('info')</script>";
        };
        if(!empty($msg)){
            header("Refresh:3,url=admin.php"); 
        }
    }
}
// else{
//     echo "<div class='error'>ACCESS DENIED!</div>";
// }


include "footer.php";
?>