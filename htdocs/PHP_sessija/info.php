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
                        echo "Hi!".$_SESSION["lietotajvards"]."! Autorizācija VEIKSMĪGA!";
                        echo "<a href='files/logout.php' class='logout'>Izlogoties</a>";
                    }else{
                        echo "Tev šeit nav pieējas!";
                        header("Refresh:2; url=index.php");
                    }
                ?>
                
            </div>
            <div class="info">Šeit tiek tikai autorizēti lietotāji</div>
        </div>
    </div>
</body>
</html>