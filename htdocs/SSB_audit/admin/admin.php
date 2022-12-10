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
            require("tb_users.php");
            require("addUserForm.php"); 

                

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // require("navigation.php");
                // require("tb_users.php");
                // require("addUserForm.php");
                if(isset($_POST['addUserBtn'])){
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
                        echo "<i class='info'>User '$login' is allready exist!</i>";
                    }else{
                        if(!$completedAllFields){
                            echo "<i class='info'>Please, fill in all fields!</i>";
                        }else{
                            if(!$passOK){
                                echo "<i class='info'>Passwords doesn't fits!</i>";
                            }else{
                                $readyToRegister = True;
                            }
                        }
                    }

                    if($readyToRegister){
                        $insertUser = addUserSQL($con,$login,$name,$surname,$email,$safePass);
                        $insertUser = True;
                        
                        if($insertUser){
                            echo "<i class='info success'>New user successfully registered!</i>";
                        }else{
                            echo "Error!";
                        }
                    }
                }
            }
        }else{
            echo "<div class='error'>ACCESS DENIED!</div>";
        }
            
        ?>



    </section>
    
</body>
</html>