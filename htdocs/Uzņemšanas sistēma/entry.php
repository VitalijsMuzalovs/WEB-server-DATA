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
            # šeit būs daudz PHP koda    
        ?>
        <h1>Pieteikšanās specialitātē 
            <span>
                <?php $specialitate = $_POST['pieteikties']; echo $specialitate; ?>
            </span>
        </h1>
        <div class="row">
            <form action="">
                <input type="text" placeholder="Vārds *" name="vards" class="box1" title="Vārds">
                <input type="text" placeholder="Uzvārds *" name="uzvards" class="box1" title="Uzvārds">
                <input type="text" placeholder="Dzimšanas dati *" name="dzimDati" class="box1" title="Dzimšanas dati">
                <input type="number" placeholder="Tālrunis *" name="talrunis" class="box1" title="Tālrunis">
                <input type="email" placeholder="E-pasts *" name="epasts" class="box1" title="E-pasts">
                <input type="text" placeholder="Dzīvesvietas adrese *" name="adrese" class="box1" title="Dzīvesvietas adrese">
                <input type="text" placeholder="Prioritārā specialitāte *" name="spec1" class="box1" title="Prioritārā specialitāte">
                <input type="text" placeholder="Sekundārā specialitāte " name="spec2" class="box1" title="Sekundārā specialitāte">
                <input type="text" placeholder="Iepriekš absolvētā izglītības iestāde *" name="izglitiba" class="box1" title="Iepriekš absolvētā izglītības iestāde">
                <input type="number" placeholder="Vidējais vērtējums diplomā *" name="vidVertejums" class="box1" title="Vidējais vērtējums diplomā">
                <input type="text" placeholder="Jūsu komentārs" name="komentars" class="box2" title="Jūsu komentārs">
                <input type="submit" value="Pieteikties!" class="btn">
            </form>
        </div>
        <?php
        }else{
            echo "<div class='zinojums sarkans'>Kaut kas nogāja greizi! ATgriezies sākumlapā un mēģini vēlreiz!</div>";
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