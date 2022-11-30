<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="script.js"></script>
    <title>Ievāds PHP</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="flex-item">
            <ul>
                <a onclick="showArticle('article1')"><img id="uzdevums1" src="images/one.png"></a>
                <a onclick="showArticle('article2')"><img id="uzdevums2" src="images/two.png"></a>
                <a onclick="showArticle('article3')"><img id="uzdevums3" src="images/three.png"></a>
                <a onclick="showArticle('article4')"><img id="uzdevums4" src="images/four.png"></a>
                <a onclick="showArticle('article5')"><img id="uzdevums5" src="images/five.png"></a>
            </ul>

            <article id="article1">
                <?php
                    echo "<h1>Title 1 PHP</h1><hr>";
                    echo "Teksta izvade ar ECHO.<br>";
                    print "Teksta izvade ar PRINT.<br>";
                    $zinojums = "Teksts, kurš ievietots mainīgajā ZIŅOJUMS";
                ?>

                <p><?php echo $zinojums; ?></p>
                
                <?php 
                    $userName = "Vital";
                    $birthYear = 1984;
                    $thisYear = 2022;
                    $age = $thisYear - $birthYear;

                    echo "$userName, you are $age years old! <br>";
                    echo 'User name: $userName <br>';
                    echo "User name: $userName <br>";

                    echo "Lietotājvārds: $userName (dzimšanas gads: $birthYear)<br>";
                    echo 'Lietotājvārds:'.$userName.'(dzimšanas gads: '.$birthYear.')<br>';

                    define("Pi",3.14159);
                    echo 'Defined constant: '.Pi.'<br>';
                    echo 'Rounded Pi: '.round(Pi,2).'<br>';

                    $uzraksts = "Es tagad mācos PHP";
                    echo var_dump($uzraksts);

                    $skaitlis = 68.456;
                    echo var_dump($skaitlis);

                    echo '<br> Random skaitlis: '.rand(10,100).'<br>';

                    echo 'Simbolu skaits:'.mb_strlen($uzraksts).'<br>';
                    echo 'Vārdu skaits: '.str_word_count($uzraksts).'<br>';
                ?>

                <hr>
                <form action="" method="post">
                    <input class="ievade" type="text" name="Ievade">
                    <input class="btn" type="submit" name="Iesniegt" value="Send">
                </form>

                <?php 
                    $teksts = '';
                    if(isset($_POST['Iesniegt'])){
                        $teksts = $_POST['Ievade'];
                        //echo "<script>showArticle('article1')</script>";
                        echo "<script>document.getElementById('article1').style.display ='block'</script>";

                        if(is_numeric($teksts)){
                            echo $teksts.' ir skaitlis<br>';
                        }else if($teksts == ''){
                            echo 'Ievades lauks ir tukšs!<br>';
                        }else{
                            echo "'".$teksts."' ir teksts!<br>";
                        }
                    }
                ?>

                <hr>

                <form action="" method="post">
                    <input class="ievade" type="number" name="laikaIevade">
                    <input class="btn" type="submit" name="laikaIesniegsana" value="Convert">
                </form>

                
                    
                <?php
                $sekundes = 0;
                $minutes = 0;
                $stundas = 0;

                $teksts = '';
                if(isset($_POST['laikaIesniegsana'])){
                    $sekundes = $_POST['laikaIevade'];
                    //echo "<script>showArticle('article1')</script>";
                    echo "<script>document.getElementById('article1').style.display ='block'</script>";
                    if(is_numeric($sekundes)){
                        $stundas =  $sekundes /3600;
                        $minutes = (int) ($sekundes /60) %60;
                        $sekundes = $sekundes %60;
                    }
                    echo round($stundas).'h:'.round($minutes).'m:'.round($sekundes).'s';
                }
    
                ?>

            </article>
            
            <article id="article2">
                <h1>PHP masīvi</h1>
                <?php
                    $komponents = array("processors","mātes plate","videokarte","RAM","barošanas bloks");
                    echo "<b>Datora sastāvdaļas</b> ir: $komponents[0],$komponents[1],$komponents[2],$komponents[4] u.c. <br>";
                    
                    print_r ($komponents);

                    echo "<br><br>";

                    $koki = array(
                        array("Priede","skujkoks"),
                        array("Ozols","lapu koks"),
                        array("Egle","skujkoks"),
                    );
                    
                    //var_dump($koki);

                    echo "* ".$koki[0][0]." ir koks, kas skaitās ".$koki[0][1]."<br>";
                    echo "* ".$koki[1][0]." ir koks, kas skaitās ".$koki[1][1]."<br>";
                    echo "* ".$koki[2][0]." ir koks, kas skaitās ".$koki[2][1]."<br><hr>";

                    foreach($koki as $koks){
                        echo "* ".$koks[0]." ir koks, kas skaitās ".$koks[1]."<br>";
                    }

                    echo "<hr>";

                    $audzekni = array(
                        array('vards'=>'Jānis','uzvards'=>'Bērziņš','telefons'=>28888888),
                        array('vards'=>'Juris','uzvards'=>'Strautmanis','telefons'=>27777777),
                        array('vards'=>'Anna','uzvards'=>'Panna','telefons'=>26666666),
                        array('vards'=>'Zane','uzvards'=>'Bērziņa','telefons'=>25555555),
                    );

                    echo "
                    <table>
                        <tr>
                            <th>Vārds</th>
                            <th>Uzvārds</th>
                            <th>Tālrunis</th>
                        </tr>
                        ";
                        foreach($audzekni as $audzeknis){
                            echo "
                            <tr>
                                <td>".$audzeknis['vards']."</td>
                                <td>".$audzeknis['uzvards']."</td>
                                <td>".$audzeknis['telefons']."</td>
                            </tr>
                        ";
                        }
                    echo "</table>";

                ?>
            </article>
            
            <article id="article3">
                <h1>PHP kontroles struktūras</h1>
                <hr>
                <p>Norādi gadalaiku:</p>
                <form action="" method="post">
                    <input class="ievade" type="text" name="gadalaikaIevade">
                    <input class="btn" type="submit" name="gadalaikaIesniegsana" value="Asociēti!">
                </form>
                
                <?php
                    $gadalaiks = '';
                    if(isset($_POST['gadalaikaIesniegsana'])){
                        echo "<script>showArticle('article3')</script>";
                        $gadalaiks = $_POST['gadalaikaIevade'];
                    }

                    if(!empty($gadalaiks)){
                        switch(mb_strtolower($gadalaiks)){
                            case 'ziema':
                                echo 'Ziema asociējas ar sniegu un ledu.';
                                break;
                            case 'pavasaris':
                                echo 'Pavasaris asociējas ar pumpuriem un lapu plaukšanu.';
                                break;
                            case 'vasara':
                                echo 'Vasara asociējas ar sauli un karstumu.';
                                break;
                            case 'rudens':
                                echo 'Rudens asociējas ar dzeltenajām lapām un dubļiem.';
                            default:
                                echo 'Diemžēl neatpazinu gadalaiku! :(';
                                break;
                        }
                    }
                    echo "<hr>";
                    echo "<p>Šahu laukuma izveide:</p>";
                    echo "<table style='width:400px; height:350px'>";
                    for($rinda=1; $rinda<=8;$rinda++){
                        echo "<tr>";
                            for($kolonna=1;$kolonna<=8;$kolonna++){
                                $kopa = $rinda + $kolonna;
                                if($kopa%2==0){
                                    echo "<td style='background: #fff;'></td>";
                                }else{
                                    echo "<td style='background: #000;'></td>";
                                }
                            }
                        echo "</tr>";
                    }
                    echo "</table>";

                    echo "<hr>";
                    echo "<p>100:</p>";
                    echo "<table style='width:600px; height:600px'>";
                    for($rinda=1; $rinda<=10;$rinda++){
                        echo "<tr>";
                            for($kolonna=1;$kolonna<=10;$kolonna++){
                                $kopa = $rinda * $kolonna;
                                echo "<td style='border: 1px solid #555; color:#000;'>". $kopa ."</td>";
                            }
                        echo "</tr>";
                    }
                    echo "</table>";

                    echo "<hr>";
                    echo "<h1>PHP funkcijas </h1><hr>";
                    
                    function zinojums(){
                        echo "Mana pirmā PHP funkcija";
                    }

                    zinojums();
                    echo "<br><p>Funkcija ar argumentiem jeb parametriem:</p>";
                    
                    function audzekni($vards,$uzvards,$kurss){
                        echo "Audzēknis <b>$vards $uzvards</b> mācās kursā: $kurss <br>";
                    }

                    audzekni("Liene","Ozola","Pavārs");
                    audzekni("Jānis","Bērziņš","Konditors");
                    audzekni("Andris","Lapa","Programetājs");

                    echo "<br><p>Funkcija, kas atgriež vērtību:</p>";
                    
                    function summa(int $x, int $y){
                        $iznakums = $x+$y;
                        return $iznakums;
                    }

                    function starpiba(int $x, int $y){
                        $iznakums = $x-$y;
                        return $iznakums;
                    }

                    function reizinajums(int $x, int $y){
                        $iznakums = $x*$y;
                        return $iznakums;
                    }

                    function dalijums(int $x, int $y){
                        $iznakums = $x/$y;
                        return $iznakums;
                    }

                    echo "5+10=".summa(5,10)."<br>";
                    echo "5-10=".starpiba(5,10)."<br>";
                    echo "5*10=".reizinajums(5,10)."<br>";
                    echo "5/10=".dalijums(5,10)."<br>";

                    $menesi=array(
                        "janvaris"=>31,
                        "februāris"=>"28, bet ja garais gads: 29",
                        "marts"=>31,
                        "aprilis"=>30,
                        "mājs"=>31,
                        "jūnijs"=>30,
                        "jūlijs"=>31,
                        "augusts"=>31,
                        "septembris"=>30,
                        "oktobris"=>31,
                        "novembris"=>30,
                        "decembris"=>31,
                    );

                    function izvele($menesa_nosaukums){
                        echo "<option value='$menesa_nosaukums'>$menesa_nosaukums</option>";
                    }
                    ?>

                    <p><b>Dienu skaits menesī: </b></p>
                    <form action="" method="post">
                        <select name="menesis" class="ievade">
                            <?php
                            foreach($menesi as $k=>$v){
                                izvele($k);
                            }
                            ?>
                        </select>
                        <input type="submit" class="btn" name = "iesniegtMenesi" value="Pārbaudit">
                    </form>

                    <?php
                        if(isset($_POST['iesniegtMenesi'])){
                            $menesis = $_POST['menesis'];
                            echo "<br>Dienu skaits šajā mēnesī <b>$menesis</b> ir $menesi[$menesis]";
                            echo "<script>showArticle('article3')</script>";
                        }
                    ?>
            </article>

            <article id="article4">
                <h1>MySQL datu bāzes piesaiste</h1>
                <hr>

                <?php
                    require("select.php");
                ?>

                <br>
                <form action="insert.php" method="POST">
                    <input type="text" name="precesIevade" class="ievade" placeholder="Preces nosaukums" required>
                    <input type="number" name="cenasIevade" class="ievade" placeholder="Preces cena" required step="0.01">
                    <input type="number" name="skaitaIevade" class="ievade" placeholder="Preces skaits" required min="1" max="9999" step="1">
                    <input type="submit" name="pievienotPreci" value="PIEVIENOT" class="btn">
                </form>

            </article>

            <article id="article5"><h1>Title 5</h1></article>
        </div>
    </div>

    <footer>Izstrādāja Vitālijs Muzaļovs &copy; 2022</footer>
</body>
</html>