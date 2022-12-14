<?php 
    require("../files/connect.php");
    require("../files/functions.php");

    if(isset($_SESSION['login'])){
        // echo "Sveiks, ".$_SESSION["login"]."! <br>Autorizācija VEIKSMĪGA!";
        require("navigation.php");
        ?>
        <div class='sections'>
        <div class='col_left'><?php require("addUserForm.php") ?></div>
        <div class='col_cnt'><?php require("tb_users.php") ?></div>
        <div class='col_right'></div>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $success_msg = False;

            if(isset($_POST['addUserBtn'])){
                $login = mysqli_real_escape_string($con,$_POST['login']);
                $name = mysqli_real_escape_string($con,$_POST['name']);
                $surname = mysqli_real_escape_string($con,$_POST['surname']);
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);
                $password2 = mysqli_real_escape_string($con,$_POST['password2']);
                is_null($_POST['isUserActive'])? $isActive = 0 : $isActive = 1;
            
                $completedAllFields = !empty($login) && !empty($name) && !empty($surname) && !empty($password);
                $passOK = $password === $password2;
                $safePass = password_hash($password,PASSWORD_DEFAULT);
                $readyToRegister = False;

                if(isUserExist($con,$login,False)){
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
                    $insertUser = addUserSQL($con,$login,$name,$surname,$email,$safePass,$isActive);                           
                    if($insertUser){
                        $msg = "New user successfully registered!";
                        $success_msg = True;                               
                    }else{
                        echo "Error!";
                    }
                }
            }

            if(isset($_POST['edit'])){
                $userID = $_POST['edit'];
                $selectedUser = mysqli_query($con,"SELECT * FROM users WHERE userID=$userID");
                $rsByUserID = mysqli_fetch_assoc($selectedUser);
            ?>
                <script>
                    document.getElementById('login').value ="<?php echo $rsByUserID['login'] ?>"
                    document.getElementById('name').value ="<?php echo $rsByUserID['name'] ?>"
                    document.getElementById('surname').value ="<?php echo $rsByUserID['surname'] ?>"
                    document.getElementById('email').value ="<?php echo $rsByUserID['email'] ?>"
                    document.getElementById('chkActive').checked= "<?php echo $rsByUserID['active']?True:False ?>"
                    document.getElementById('password').disabled = true
                    document.getElementById('password2').disabled = true
                    document.getElementById('addUserBtn').classList.add('disabled')
                    document.getElementById('addUserBtn').type="button"
                    document.getElementById('saveUserBtn').classList.remove('disabled')
                    document.getElementById('saveUserBtn').type="submit"
                    document.getElementById('cancelEditUser').classList.remove('disabled')
                    document.getElementById('cancelEditUser').type="submit"
                    document.getElementById('userID').value = <?php echo $rsByUserID['userID'] ?>
                </script>
            <?php
            }

            

            if(isset($_POST['saveUserBtn'])){
                $success_msg = False;
                $userID = $_POST['userID'];
                $login = mysqli_real_escape_string($con,$_POST['login']);
                $name = mysqli_real_escape_string($con,$_POST['name']);
                $surname = mysqli_real_escape_string($con,$_POST['surname']);
                $email = mysqli_real_escape_string($con,$_POST['email']);
                is_null($_POST['isUserActive'])? $isActive = 0 : $isActive = 1;
            
                $completedAllFields = !empty($login) && !empty($name) && !empty($surname);
                $readyToRegister = False;

                if(isUserExist($con,$login,$userID)){
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
    }else{
        echo "<div class='error'>ACCESS DENIED!</div>";
    }
?>
</div>