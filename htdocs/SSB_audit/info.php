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
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="title">
                <?php 
                    session_start();
                    if(isset($_SESSION['lietotajvards'])){
                        echo "Sveiks, ".$_SESSION["lietotajvards"]."! <br>Autorizācija VEIKSMĪGA!";
                        echo "<a href='files/logout.php' class='logout'>Izlogoties</a>";
                    }else{
                        echo "Tev šeit nav pieējas!";
                        echo $_SESSION['lietotajvards'];
                        header("Refresh:2; url=index.php");
                    }
                ?>
                
            </div>
            <div class="info">
                <?php
                    if(isset($_SESSION['lietotajvards'])){
                        require("files/connect.php");
                        $user = $_SESSION["lietotajvards"];
                        $selectUser_SQL = "SELECT * FROM lietotaji WHERE lietotajs = '$user' AND active=1";
                        $rsUser = mysqli_query($con,$selectUser_SQL);
                        $arrUser = mysqli_fetch_assoc($rsUser);
                        
                        echo "
                            <div class='info'>
                            <table>
                                <tr>
                                    <td>Vārds:</td>
                                    <td>".$arrUser['vards']."</td>
                                </tr>
                                <tr>
                                    <td>Uzvārds:</td>
                                    <td>".$arrUser['uzvards']."</td>
                                </tr>
                                <tr>
                                    <td>E-pasts:</td>
                                    <td>".$arrUser['email']."</td>
                                </tr>
                            </table>
                            </div>
                        ";
                ?>
                        <form action='#' method='post'>
                            <button name='deleteUser' type='submit' value=''>
                                <i class='fa-sharp fa-solid fa-trash'></i>
                            </button>
                        </form>

                    
                <?php
                        require("files/functions.php");
                        if(isset($_POST['deleteUser'])){
                            if(deleteUser($user)){
                                echo "'".$user."' ir veiksmīgi izdzēsts!";
                                session_destroy();
                            }
                        }
                    }else{
                        echo "Tev šeit nav pieējas!";
                        header("Refresh:2; url=index.php");
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php ob_end_flush();?>