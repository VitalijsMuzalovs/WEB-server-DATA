<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizācija portālā</title>
    <link rel="stylesheet" href="style.css">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="title">Autorizācija portālā</div>
            <div class="info">
                <?php
                    if(isset($_POST['autorizacija'])){
                        require("files/connect.php");
                        session_start();

                        $lietotajvards = mysqli_real_escape_string($con,$_POST['lietotajs']);
                        $parole = mysqli_real_escape_string($con,$_POST['parole']);

                        $lietotaja_atrasana_SQL = "SELECT * FROM lietotaji WHERE lietoajs = '$lietotajvards'";
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
                    Neesi lietotājs? <a href="#" onclick="">Reģistrējies!</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>