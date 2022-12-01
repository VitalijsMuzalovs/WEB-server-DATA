<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP tests Oksana Gedminta</title>
    <style>
    body {font-family: 'Calibri', sans-serif}
    .konteiners {box-sizing: border-box; border: none; background: #f2f2f2; width: 920px; height: 725px; margin: 20px; padding: 12px; display: grid; grid-template-columns: auto auto; align-content: space-between; justify-content: space-between}
    .dati {background: #d4d2d2; font-size: 14px; width: 400px;  padding: 15px; display: flex; align-items: center; flex-wrap: wrap; justify-content: center}
    h3 {font-size: 18px}
    p {text-align: justify}
    .small {font-size: 12px}
    button {text-align: center; width: 400px; color:#fff; font-size: 14px; background: black; padding: 8px; border-radius: 5px; margin: 10px; cursor: pointer} </style>
</head>
<body style="font-size:20px">
    <?php
    echo "<h5> <em>1. Uzdevums </em> </h5>";
        $a = array (7, 8, 9, 10, 11, 12);
        echo "Skaitlis 11 atrodas dotā Masīva indekā Nr.4. <br> Izvadu elementu ar vērtību '11' : <b> $a[4]</b> <br>";


    echo "<h5> <em> 2. Uzdevums </em> </h5>";
    $b = array ("viens" => 1, "divi" => 2, "trīs" => 3, "četri" => 4);
        echo "<b> $b[trīs] </b><br>";


    echo "<h5><em> 3. Uzdevums </em> </h5>";
    $skaitli = array (2, 3, 4);
    echo 'Sākotnējs masīvs: ';
    var_dump($skaitli);
    $skaitli[]= 5;
    echo "<br> Jaunizveidotāis masīvs: ";
    var_dump($skaitli);
    echo "<br> Atbilde: <br> Masīvā pievienotā elementa indeksa skaitlis ir  <b>3</b> ";


    echo "<h5><em> 4. Uzdevums </em> </h5>";
    $divdimensiju [1][] = "viens";
    $divdimensiju [1][] = "divi";
    $divdimensiju [1][] = "trīs";

    $divdimensiju [2][] = "četri";
    $divdimensiju [2][] = "pieci";
    $divdimensiju [2][] = "seši";
    echo 'Izvadu masīva elementu ar vērtību - trīs: <b>'.$divdimensiju[1] [2].'</b> <br> Un elementu ar vērtību - pieci: <b>'.$divdimensiju[2] [1].'</b>';
    

    echo "<br><h5><em> 5. Uzdevums </em> </h5>";
    $augusts = array (30, 35, 37, 33, 34, 32, 35, 32, 34, 37);
    rsort($augusts);
    echo "Izmantojot 'foreach(x as y)' izsaucam masīva komponentes: <br>";
    foreach ($augusts as $temperatura) {
        echo 'Augustā gaisa temperatūra sasniedza rekordrādītājus: + '.$temperatura. '<br>';
    };


    echo "<br><h5><em> 6. Uzdevums </em> (asociatīvais masīvs)</h5>";

    $draugi = array ('Jānis'=> 22, 'Māris'=> 23, 'Atis'=> 33, 'Gatis'=> 35, 'Vairis'=> 66, 'Juris'=> 44, 'Mareks'=> 43);
    arsort($draugi);
    foreach ($draugi as $vards => $vecums) {
        echo "$vards ir $vecums gadus vecs.<br>";
    }


    echo "<br><h5><em> 7. Uzdevums </em> (multidimensiju asociatīvais masīvs)</h5>";
  
    $profesijas = array(
        array('Programmēšanas tehniķis', 'Programmēšanas tehniķis piedalās programmatūras projektēšanā, ieviešanā un uzturēšanā, kā arī jau esošās programmatūras pielāgošanā konlrētā pasūtījuma vajadzībām. Programmēšanas tehniķis apkalpo datorsistēmas un programmatūru, instale un konfigurē esošo un vēlamo programmatūru.', 'Pamatalga: 1000 EUR | Vakances: 3 | Slodze: Pilna (8h)'),
        array('Datorsistēmu tehniķis', 'Brīvi pārvalda biroja lietojumprogrammas dokumentu, aprēkinu tabulu, prezentāciju sagatavošanai un datorlietotāja darba procesu automatizēšanai, sagatavo un uztur vienkāršas datubāzes un interneta mājaslapas. ','Pamatalga: 850 EUR | Vakances: 3 | Slodze: Pilna (8h)'),
        array('Elektrotehniķis', 'Veic ārējo un iekšējo elektrisko tīklu izbūvi un elektroietaišu irīkošanas, ekspluatācijas un remonta darbus - labo dažādas elektriskas iekārtas - sadzīves tehniku, apgaismes objektus, elektriskos sadalītājus, elektromotorus,ģeneratorus, slodzes un jaudas sledzus u.c.iekārtas.', 'Pamatalga: 800 EUR | Vakances: 1 | Slodze: Pilna (8h)'),
        array('Mehatronisku sistēmu tehniķis', 'Mehatronisku sistēmu tehniķis veic elektropiedziņas un iekārtu vadības elektrisko shēmu montāžu un regulēšanu. Mehatronisku sistēmu tehniķis veic individuālu darbu saistībā ar automatizētu un datorizēti vadāmu tehnoloģisku procesu tehnisko apkalpošanu, ierīču montāžu un regulēšanu, veic defektu atklāšanu un novēršanu.', 'Pamatalga: 500 EUR | Vakances: 2 | Slodze: Nepilna (4h)'),
    );
    echo "<div class='konteiners'>";

    foreach ( $profesijas as $profesija) {
        
        echo "
                <div class='dati'>
                     <h3>".$profesija[0]."</h3><p>".$profesija[1]."</p><p class='small'><br><br>".$profesija[2]."</p><br><br>
                    <button>PIETEIKTIES</button>
                </div>
            ";
    }
    echo "</div>";
    ?>

</body>
</html>