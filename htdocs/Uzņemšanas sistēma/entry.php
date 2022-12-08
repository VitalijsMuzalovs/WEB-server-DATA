<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieteikšanās specialitātē</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="files/style_main.css">
    <link rel="shortcut icon" href="images/lvt.png" type="image/x-icon">
</head>
<body>
    
<header>
    <a href="#" class="logo">Liepājas Valsts tehnikums</a>
    <nav class="navbar">
        <a href="./#sakums">Sākumlapa</a>
        <a href="./#specialitates">Uzņemšana</a>
        <a href="./#informacija">Par mums</a>
        <a href="./#iepazisti">Iepazīsti tehnikumu</a>
        <a href="./#kontakti">Kontakti</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>

<section id="sakums">
    <div class="content">
        <h2>LVT uzsāk jauno audzēkņu uzņemšanu</h2>
        <p>Sākot no š.g. jūnija jaunieši var iesniegt dokumentus PIKC "Liepājas Valsts tehnikums", lai jau nākamajā mācību gadā apgūtu kādu no darba tirgū pieprasītām profesijām.</p>
        <a href="./#specialitates" class="btn">Apskatīt specialitātes</a>
    </div>
    <div class="image">
        <img src="images/learn.png" alt="">
    </div>
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
</section>

<div id="pieteiksanas">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require('files/connect_db.php');

            if(isset($_POST['iesniegtPieteikumu'])){
                $vards_ievade = mysqli_real_escape_string($con,$_POST['vards']);
                $uzvards_ievade = mysqli_real_escape_string($con,$_POST['uzvards']);
                $dzim_dati_ievade = mysqli_real_escape_string($con,$_POST['dzimDati']);
                $talrunis_ievade = mysqli_real_escape_string($con,$_POST['talrunis']);
                $epasts_ievade = mysqli_real_escape_string($con,$_POST['epasts']);
                $adrese_ievade = mysqli_real_escape_string($con,$_POST['adrese']);
                $spec1_ievade = mysqli_real_escape_string($con,$_POST['spec1']);
                $spec2_ievade = mysqli_real_escape_string($con,$_POST['spec2']);
                $izglitiba_ievade = mysqli_real_escape_string($con,$_POST['izglitiba']);
                $vid_vert_ievade = mysqli_real_escape_string($con,$_POST['vidVertejums']);
                $komentars_ievade = mysqli_real_escape_string($con,$_POST['komentars']);

                $parbaude_SQL = "SELECT talrunis FROM audzekni WHERE talrunis = '$talrunis_ievade'";
                $parabudes_rezultats = mysqli_query($con,$parbaude_SQL);
                $userCount = mysqli_num_rows($parabudes_rezultats);

                if(($userCount >= 1 )){
                    echo "<div class='zinojums sarkans'>Kļūda! Informācija par Jums jau ir iesniegta!<br> Ja vēlaties veikt kādas izmaiņas - sazinieties ar PIKC LVT uzņemšānas komisiju pa tālruni +371 29999999</div>";
                }else{
                    if(!empty($vards_ievade) && !empty($uzvards_ievade) && !empty($dzim_dati_ievade) && !empty($talrunis_ievade) && !empty($epasts_ievade) && !empty($adrese_ievade) && !empty($spec1_ievade) && !empty($spec2_ievade) && !empty($izglitiba_ievade) && !empty($vid_vert_ievade)){        
                        $pievienot_audzekni_SQL ="
                            INSERT INTO audzekni 
                            (vards,uzvards,dzim_dati,talrunis,epasts,adrese,spec1,spec2,izglitiba,vid_vertejums,komentari)
                            VALUES
                            ('$vards_ievade','$uzvards_ievade','$dzim_dati_ievade','$talrunis_ievade','$epasts_ievade','$adrese_ievade','$spec1_ievade','$spec2_ievade','$izglitiba_ievade',$vid_vert_ievade,'$komentars_ievade')
                            ";

                            if(mysqli_query($con,$pievienot_audzekni_SQL)){
                                echo "<div class='zinojums zals'>Reģistrācija ir noritējusi veiksmīgi! Uz drīzu sazināšanos!</div>";
                            }else{
                                echo "<div class='zinojums sarkans'>Reģistrācija nav izdevusies! Mēģiniet vēlreiz!</div>";
                            }
                    }else{
                        echo "<div class='zinojums sarkans'>Reģistrācija nav izdevusies! Kāds no ievades laukiem aizpildīts nekorekti!</div>";
                        header("Refresh:2;url=./");
                    }
                }
            }else{
                ?>
                <h1>Pieteikšanās specialitātē 
                    <span>
                        <?php $specialitate = $_POST['pieteikties']; echo $specialitate; ?>
                    </span>
                </h1>
                <div class="row">
                    <form method="post" action="">
                        <input type="text" placeholder="Vārds *" name="vards" class="box1" title="Vārds" required>
                        <input type="text" placeholder="Uzvārds *" name="uzvards" class="box1" title="Uzvārds" required>
                        <input type="text" placeholder="Dzimšanas dati *" name="dzimDati" class="box1" title="Dzimšanas dati" required>
                        <input type="number" placeholder="Tālrunis *" name="talrunis" class="box1" title="Tālrunis" required>
                        <input type="email" placeholder="E-pasts *" name="epasts" class="box1" title="E-pasts" required>
                        <input type="text" placeholder="Dzīvesvietas adrese *" name="adrese" class="box1" title="Dzīvesvietas adrese" required>
                        <input type="text" placeholder="Prioritārā specialitāte *" name="spec1" class="box1" title="Prioritārā specialitāte" value = "<?php echo $specialitate ?>" readonly>
                        <input type="text" placeholder="Sekundārā specialitāte " name="spec2" class="box1" title="Sekundārā specialitāte">
                        <input type="text" placeholder="Iepriekš absolvētā izglītības iestāde *" name="izglitiba" class="box1" title="Iepriekš absolvētā izglītības iestāde" required>
                        <input type="number" placeholder="Vidējais vērtējums diplomā *" min="4" max="10" step="0.1" name="vidVertejums" class="box1" title="Vidējais vērtējums diplomā" required>
                        <input type="text" placeholder="Jūsu komentārs" name="komentars" class="box2" title="Jūsu komentārs">
                        <input type="submit" value="Pieteikties!" name="iesniegtPieteikumu" class="btn">
                    </form>
                </div>
                <?php
        }}else{
            echo "<div class='zinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
            header("Refresh:2;url=./");
        }
        ?>
</div>

<footer>
    Liepājas Valsts tehnikums &copy; 2022
</footer>

<script src="files/script.js"></script>

</body>
</html>