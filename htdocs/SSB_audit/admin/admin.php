<?php ob_start();?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../table_style.css">
    <title>ADMIN</title>
</head>
    <?php require("../head.php") ?>
<body>
    

    <section class="content">
        <?php 
            require("../files/connect.php");
            require("../files/functions.php");

            if(isset($_SESSION['login'])){
                // echo "Sveiks, ".$_SESSION["login"]."! <br>Autorizācija VEIKSMĪGA!";
                require("navigation.php");

                echo "<div class='sections'>";
                echo "<div class='col_left'></div>";
                echo "<div class='col_cnt'>";
                    require("tb_users.php");
                echo "</div>";
                echo "<div class='col_right'>";
                    require("addUserForm.php");
                echo "</div>";

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST['addUserBtn'])){
                        $success_msg = False;
                        $login = mysqli_real_escape_string($con,$_POST['login']);
                        $name = mysqli_real_escape_string($con,$_POST['name']);
                        $surname = mysqli_real_escape_string($con,$_POST['surname']);
                        $email = mysqli_real_escape_string($con,$_POST['email']);
                        $password = mysqli_real_escape_string($con,$_POST['password']);
                        $password2 = mysqli_real_escape_string($con,$_POST['password2']);
                    
                        $completedAllFields = !empty($login) && !empty($name) && !empty($surname) && !empty($password);
                        $passOK = $password === $password2;
                        $safePass = password_hash($password,PASSWORD_DEFAULT);
                        $readyToRegister = False;

                        if(isUserExist($con,$login)){
                            $msg = "User \'".$login."\' is allready exist!";
                        }else{
                            if(!$completedAllFields){
                                $msg = "Please, fill in all fields!";
                            }else{
                                if(!$passOK){
                                    $msg = "Passwords doesn\'t fits!";
                                }else{
                                    $readyToRegister = True;
                                }
                            }
                        }

                        if($readyToRegister){
                            $insertUser = addUserSQL($con,$login,$name,$surname,$email,$safePass);
                            $insertUser = True;
                            
                            if($insertUser){
                                $msg = "New user successfully registered!";
                                $success_msg = True;                               
                            }else{
                                echo "Error!";
                            }
                        }
                    }
                    echo "<script>document.getElementById('info').innerHTML +='".$msg."' </script>";
                    if($success_msg){
                        echo "<script>document.getElementById('info').classList.add('info','success')</script>";
                    }else{
                        echo "<script>document.getElementById('info').classList.add('info')</script>";
                    };
                    header("Refresh:3,url=admin.php"); 
                }

                
                
                

            }else{
                echo "<div class='error'>ACCESS DENIED!</div>";
            }
        ?>

    </div>
    </section>
    
</body>
<?php require("../footer.php") ?>
</html>
<?php ob_end_flush();?>