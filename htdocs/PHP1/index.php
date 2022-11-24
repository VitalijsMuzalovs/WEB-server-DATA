<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzalovs</title>
</head>
<body>

<?php
echo "<h1>1.uzd</h1>";
$a = array(7,8,9,10,11,12);
echo $a[4];
echo "<hr>";

echo "<h1>2.uzd</h1>";
$b = array("viens" => 1, "divi" => 2, "trīs" => 3, "četri" => 4);
echo $b['trīs'];
echo "<hr>";

echo "<h1>3.uzd</h1>";
$skaitli = [2,3,4];
array_push($skaitli,5);
echo "Skaitļa 5 indekss:".array_search(5,$skaitli);
echo "<hr>";

echo "<h1>4.uzd</h1>";
$divdimensiju[1][] = "viens";
$divdimensiju[1][] = "divi";
$divdimensiju[1][] = "trīs";
$divdimensiju[2][] = "četri";
$divdimensiju[2][] = "pieci";
$divdimensiju[2][] = "seši";

echo "3: ".$divdimensiju[1][2];
echo "<br>";
echo "5: ".$divdimensiju[2][1];
echo "<hr>";

echo "<h1>5.uzd</h1>";
$augusts =[22.5,23.6,27.1,27.3,27.5,27.9,28.0,28.6,28.8];
rsort($augusts);
foreach($augusts as $num){
    echo $num."<br>";
}
echo "<hr>";

echo "<h1>6.uzd</h1>";
$draugi = array('Viktors'=>17,'Aldis'=>19,'Ansis'=>26,'Miks'=>23,);
arsort($draugi);

foreach ($draugi as $key => $value){
    echo $key." ir ".$value." gadus vecs. <br>";
}
echo "<hr>";

echo "<h1>7.uzd</h1>";

$profesijas = array(
array('profesija'=>'Programmēšanas tehniķis','text'=>'Programmēšanas tehniķis piedalās programmatūras projektēšanā, ieviešanā un uzturēšanā, kā arī jau esošas programmatūras pielagošanā konkrētā pasūtītāja vajadzībām. Programmēšanas tehniķis apkalpo datorsistēmas un programmatūru, instalē un konfigurē esošo un vēlamo programmatūru.','pamatalga'=> '1000 EUR','vakances'=> 3, 'slodze'=> 'Pilna (8h)'),

array('profesija'=>'Datorsistēmu tehniķis','text'=>'Brīvi pārvalda biroja lietojumprogrammas dokumentu, aprēķinu tabulu, prezentāciju sagatavošanai un datorlietotāja darba procesu automatizēšanaim sagatavo un uztur vienkāršas datubāzes un interneta mājas lapas.','pamatalga'=> '850 EUR','vakances'=> 3, 'slodze'=> 'Pilna (8h)'),

array('profesija'=>'Elektrotehniķis','text'=>'Veic ārējo un iekšējo elektrisko tīklu izbūvi un elektroietaišu ierīkošanas, ekspluatācijas un remonta darbus - labo dažādas elektrīskās iekārtas - sadzīvs tehniku, apgaismes objektus, elektriskos sadalītājus, elektromotrus, ģeneratorus, slodzes un jaudas slēdžus u.c. iekārtas.','pamatalga'=> '800 EUR','vakances'=> 1, 'slodze'=> 'Pilna (8h)'),

array('profesija'=>'Mehatronisku sistēmu tehniķis','text'=>'Mehatronisku sistēmu tehniķis veic elektropiedziņas un iekārtu vadības elektrisko shēmu montāžu un regulēšanu.Mehatronisku sistēmu tehniķis veic individuālu darbu saistībā ar automatizētu un datorizētu vadāmu tehnoloģisku procesu tehnisko apkalpošanu, ierīču montāžu un regulēšan, veic defektu atklāšanu un novertēšanu.','pamatalga'=> '500 EUR','vakances'=> 2, 'slodze'=> 'Nepilna (4h)'));
?>

<style>
.flex-item{
    display:flex;
    width: 80%;
    background-color: #eee;
    font-family: Calibri;
    font-size: 18px;
    margin: 0 auto;
}

.article{
    display: grid;
    grid-auto-flow: row;
    grid-template: 15% auto 10% 10% / auto;
    border: 1px solid #000;
    font-size: 18px;
}

h2{
    font-size: 21px;
    text-align: center;
}

.description{
    margin: 10px;
    text-align:justify;
}

.details{
    text-align: center;
    font-size: 16px;
}

.btn{
    width: fit-content;
    justify-self: center;
    padding: 2% 20%;
    background: #333;
    height: 30px;
    text-align: center;
    color:#fff;

}

</style>

<div class="container">
    <div class="flex-item">
        <?php
        foreach($profesijas as $item){
            echo    
            "<div class='article'>
                <h2>".$item['profesija']."</h2>

                <p class='description'>".$item['text']."</p>

                <p class='details'>
                    Pamatalga: ".$item['pamatalga']." | 
                    Vakances: ".$item['vakances']." | 
                    Slodze: ".$item['slodze']." 
                </p>

                <a class='btn'>PIETEIKTIES</a>
            </div>";
        }
        ?>
    </div>
</div>

</body>
</html>