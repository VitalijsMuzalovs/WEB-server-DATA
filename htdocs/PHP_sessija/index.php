<?php ob_start();?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizācija portālā</title>
    <link rel="stylesheet" href="style.css">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <div class="login" id ="login">
            <div class="title">Autorizācija portālā</div>
            <div class="info">
                <?php
                    if(isset($_POST['autorizacija'])){
                        require("files/connect.php");
                        session_start();

                        $lietotajvards = mysqli_real_escape_string($con,$_POST['lietotajs']);
                        $parole = mysqli_real_escape_string($con,$_POST['parole']);

                        $lietotaja_atrasana_SQL = "SELECT * FROM lietotaji WHERE lietotajs = '$lietotajvards' AND active=1";
                        $atrasanas_rezultats = mysqli_query($con,$lietotaja_atrasana_SQL);

                        if(mysqli_num_rows($atrasanas_rezultats) == 1){
                            while($ieraksts = mysqli_fetch_assoc($atrasanas_rezultats)){
                                if(password_verify($parole,$ieraksts['parole'])){
                                    $_SESSION["lietotajvards"] = $lietotajvards;
                                    header("location: info.php");
                                }else{
                                    echo "Nepareizs lietotājvārds vai parole!";
                                }
                            }
                        }else{
                            echo "Nepareizs lietotājvārds vai parole";
                        }
                    }
                    if(isset($GET['logout'])){
                        session_destroy();
                    }
                ?>
            </div>

            <form action="#" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="lietotajs" placeholder="Lietotājvārds" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="parole" placeholder="Parole" required>
                </div>
                <div class="row button">
                    <input type="submit" name="autorizacija" value="Ielogoties">
                </div>
                <div class="register">
                    Neesi lietotājs? <a href="#" onclick="switchBlock('registracija')">Reģistrējies!</a>
                </div>
            </form>
        </div>

        <div class="registracija" id="registracija">
            <div class="title">Reģistrēties portālā</div>
            <div class="info">
                <?php
                    session_start();
                    if(isset($_POST['regButton'])){
                        require("files/connect.php");
                        require("files/functions.php");

                        $lietotajvards = mysqli_real_escape_string($con,$_POST['lietotajs']);
                        $vards = mysqli_real_escape_string($con,$_POST['vards']);
                        $uzvards = mysqli_real_escape_string($con,$_POST['uzvards']);
                        $email = mysqli_real_escape_string($con,$_POST['email']);
                        $parole = mysqli_real_escape_string($con,$_POST['parole']);
                        $parole2 = mysqli_real_escape_string($con,$_POST['parole2']);

                        $safePass = password_hash($parole,PASSWORD_DEFAULT );

                        $completedAllFields = !empty($lietotajvards) && !empty($vards) && !empty($uzvards) && !empty($email) && !empty($parole) && !empty($parole2);

                        $passOK = $parole === $parole2;
                        $readyToRegister = False;

                        if(isUserExist($con,$lietotajvards)){
                            echo "<script>switchBlock('registracija')</script>";
                            echo "Lietotājvārds '.$lietotajvards.' ir aizņemts!<br>";
                            echo "Lūdzu, reģistrējiet kādu citu!";
                        }else{
                            if(!$completedAllFields){
                                echo "<script>switchBlock('registracija')</script>";
                                echo "Nav aizpildīti visi lauki!";
                            }else{
                                if(!$passOK){
                                    echo "<script>switchBlock('registracija')</script>";
                                    echo "Paroles nesakrīt!";
                                }else{
                                    $readyToRegister = True;
                                }
                            }
                        }

                        if($readyToRegister){
                            $insertUser = addUserSQL($con,$lietotajvards,$vards,$uzvards,$email,$safePass);
                            $insertUser = True;
                            
                            if($insertUser){
                                echo "<script>switchBlock('registracija')</script>";
                                echo "<i class='success'>Reģistrācija veiksmīgi pabeigta!</i>";
                                $_SESSION["lietotajvards"] = $lietotajvards;
                                header("Refresh:2,url=info.php");
                            }else{
                                echo "Error!";
                            }
                        }
                    }
                    
                    if(isset($GET['logout'])){
                        session_destroy();
                    }
                ?> 
            </div> 

            <form action="#" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="lietotajs" placeholder="Lietotājvārds" required>
                </div>
                <div class="row">
                    <i class="fa-solid fa-circle-user"></i>
                    <input type="text" name="vards" placeholder="Vārds" required>
                </div>
                <div class="row">
                    <i class="fa-solid fa-circle-user"></i>
                    <input type="text" name="uzvards" placeholder="Uzvārds" required>
                </div>
                <div class="row">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="E-pasts" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="parole" placeholder="Parole" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="parole2" placeholder="Parole (atkārtori)" required>
                </div>
                <div class="row button">
                    <input type="submit" name="regButton" value="Reģistrēties">
                </div>
                <div class="register">
                    Jau esi reģistrējies? <a href="#" onclick="switchBlock('login')">Ielogojies!</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php ob_end_flush();?>