<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzņemšana LVT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../files/style_main.css">
    <link rel="shortcut icon" href="images/lvt.png" type="image/x-icon">
</head>
<body>

<header>
    <a href="#" class="logo">Liepājas Valsts tehnikums</a>
    <nav class="navbar">
        <a href="./"><i class="fas fa-home"></i> Sākumlapa</a>
        <a href="audzekni.php"><i class="fas fa-users"></i> Audzēkņi</a>
        <a href="specialitates.php"><i class="fas fa-tasks"></i> Specialitātes</a>
        <a href="../"><i class="fas fa-sign-out-alt"></i> Uz pieteikšanās vietni</a>
    </nav>
    <nav class="navbar">
        <a href="#iepazisti"><b>Administrator</b> <i class="fas fa-power-off"></i></a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>

<section class="admin">
    <div class="kopsavilkums">
        <div class="informacija">
            <span>13</span>
            <h3>Jauni pieteikumi</h3>
            <p>Pēdējo 24h laikā</p>
        </div>
        <div class="informacija">
            <span>7</span>
            <h3>Iesniegti dokumenti</h3>
            <p>Pēdējo 24h laikā</p>
        </div>
        <div class="informacija">
            <span>350</span>
            <h3>Pieteikumu kopā</h3>
            <p>Kopš uzņemšanas sākuma</p>
        </div>
        <div class="informacija">
            <span>205</span>
            <h3>Iesniegti dokumenti</h3>
            <p>Kopumā no visiem pieteikumiem</p>
        </div>
    </div>

    <div class="row">
        <div class="info">
            <div class="head-info">Pēdējās izmaiņas sistēmā:</div>
            <table>
                <tr><th>Audzēknis</th><th>Specialitāte</th><th>Statuss</th></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
            </table>
        </div>
        <div class="info2">
            <div class="head-info">Pieprasītākās specialitātes:</div>
            <table>
                <tr><th>Specialitāte</th><th>Pieteikumi</th></tr>
                <tr><td>Programmēšanas tehniķis</td><td>76</td></tr>
                <tr><td>Datorisistēmu tehniķis</td><td>28</td></tr>
                <tr><td>Pavārs</td><td>26</td></tr>
                <tr><td>Mehatronisku sistēmu tehniķis</td><td>25</td></tr>
                <tr><td>Grāmatvedis</td><td>25</td></tr>
            </table>
        </div>
    </div>
</section>

<footer>
    Liepājas Valsts tehnikums &copy; 2022
</footer>

<script src="files/script.js"></script>
</body>
</html>