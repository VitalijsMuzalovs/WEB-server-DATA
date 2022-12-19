<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzņemšana LVT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="files/style_main.css">
    <link rel="shortcut icon" href="images/lvt.png" type="image/x-icon">
</head>
<body>
    
<header>
    <a href="#" class="logo">Liepājas Valsts tehnikums</a>
    <nav class="navbar">
        <a href="#sakums">Sākumlapa</a>
        <a href="#specialitates">Uzņemšana</a>
        <a href="#informacija">Par mums</a>
        <a href="#iepazisti">Iepazīsti tehnikumu</a>
        <a href="#kontakti">Kontakti</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>

<section id="sakums">
    <div class="content">
        <h2>LVT uzsāk jauno audzēkņu uzņemšanu</h2>
        <p>Sākot no š.g. jūnija jaunieši var iesniegt dokumentus PIKC "Liepājas Valsts tehnikums", lai jau nākamajā mācību gadā apgūtu kādu no darba tirgū pieprasītām profesijām.</p>
        <a href="#specialitates" class="btn">Apskatīt specialitātes</a>
    </div>
    <div class="image">
        <img src="images/learn.png" alt="">
    </div>
    <div class="cloud"></div>
    <div class="cloud cloud2"></div>
</section>

<section id="specialitates">
    <h1> Piesakies kādā no <span>specialitātēm</span> </h1>
    <div class="box-container">

        <?php
            require('files/connect_db.php');
            $specialitates_SQL = "SELECT * FROM specialitates WHERE active=1";
            $atlasa_specialitates = mysqli_query($con,$specialitates_SQL);

            while($specialitate = mysqli_fetch_assoc($atlasa_specialitates)){
                echo "
                <div class='box'>
                    <img src='{$specialitate['attels_URL']}' alt=''>
                    <h3>{$specialitate['nosaukums']}</h3>
                    <p>{$specialitate['apraksts']}</p>
                    
                    <form action='entry.php' method='post'>
                        <button type='submit' name='pieteikties' class='btn' value='{$specialitate['nosaukums']}'>Pieteikties</button>
                    </form>
                </div>
                ";
            }
        ?>
    </div>
</section>

<section id="informacija">
    <h1><span>PIKC "Liepājas Valsts tehnikums"</span></h1>
    <div class="row">
        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>
        <div class="content">
            <h3 class="title">Kurzemes reģiona lielākā profesionālās izglītības iestāde</h3>
            <p>PIKC "Liepājas Valsts tehnikums" ir Kurzemes reģiona lielākā profesionālās izglītības iestāde ar plašāko piedāvāto izglītības programmu klāstu. Tas nodrošina kompetentu un kvalitatīvu speciālistu sagatavošanu gan pēc pamatskolas, gan pēc vidusskolas beigšanas un arī mūžizglītības kontekstā, atbilstoši reģiona attīstības vajadzībām un dinamikai. Tehnikums ir elastīgs un atvērts moderno tehnoloģiju un jaunu programmu ieviešanai.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-award"></i>
                    <h3>Vairāk nekā 25 specialitātes</h3>
                </div>
                <div class="icons">
                    <i class="fas fa-user"></i>
                    <h3>1200+ audzēkņu</h3>
                </div>
                <div class="icons">
                    <i class="fas fa-project-diagram"></i>
                    <h3>Neskaitāmi sadarbības partneri</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="iepazisti">
    <h1> Iepazīsti <span>tehnikumu!</span> </h1>
    <div class="box-container">
        <div class="box">
            <img src="images/lvt1.jpg" alt="">
            <div class="content">
                <h3>LVT Ventspils ielā</h3>
                <p>2021.gada maijs</p>
            </div>
        </div>
        <div class="box">
            <img src="images/lvt2.jpg" alt="">
            <div class="content">
                <h3>LVT Vānes ielā</h3>
                <p>2021.gada marts</p>
            </div>
        </div>
        <div class="box">
            <img src="images/lvt3.jpg" alt="">
            <div class="content">
                <h3>LVT telpas Ventspils ielā</h3>
                <p>2021.gada janvāris</p>
            </div>
        </div>
        <div class="box">
            <img src="images/lvt4.jpg" alt="">
            <div class="content">
                <h3>LVT telpas Vānes ielā</h3>
                <p>2021.gada janvāris</p>
            </div>
        </div>
        <div class="box">
            <img src="images/lvt5.jpg" alt="">
            <div class="content">
                <h3>LVT aktu zāle Ventspils ielā</h3>
                <p>2021.gada janvāris</p>
            </div>
        </div>
        <div class="box">
            <img src="images/lvt6.jpg" alt="">
            <div class="content">
                <h3>LVT bibliotēka</h3>
                <p>2021.gada janvāris</p>
            </div>
        </div>
    </div>
</section>

<section id="kontakti">
    <h1>Kontakti</h1>
    <div class="icons-container">
        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>Tālrunis</h3>
            <p>+371 69 999 999</p>
            <p>+371 69 999 998</p>
        </div>
        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>E-pasts</h3>
            <p>lvt@lvt.lv</p>
            <p>uznemsana@lvt.lv</p>
        </div>
        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Adrese</h3>
            <p>Ventspils iela 51, <br>Liepāja, LV-3405, Latvija</p>
        </div>
    </div>
    <div class="row">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24538.296252292257!2d21.01105825042034!3d56.528952523790004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46faa7ccb271be93%3A0xf9d1bf3406ae7d9d!2sLiep%C4%81jas%20Valsts%20tehnikums!5e0!3m2!1slv!2slv!4v1635667959583!5m2!1slv!2slv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <form action="">
            <input type="text" placeholder="Vārds" class="box">
            <input type="email" placeholder="E-pasts" class="box">
            <input type="number" placeholder="Tālrunis" class="box">
            <textarea name="" placeholder="Tavs ziņojums" class="box" id="" cols="30" rows="8"></textarea>
            <input type="submit" value="Sazināties!" class="btn">
        </form>
    </div>
</section>

<footer>
    Liepājas Valsts tehnikums &copy; 2022
</footer>

<script src="files/script.js"></script>
</body>
</html>