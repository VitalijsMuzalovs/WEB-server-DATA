<?php
    $servera_vards = "fdb27.runhosting.com";
    $lietotajvards = "4221368_userauth";
    $parole = "";
    $db_nosaukums ="4221368_userauth";
    $port = 3306; 

    $con = mysqli_connect($servera_vards,$lietotajvards,$parole,$db_nosaukums,$port);

    if(!$con){
        die("Pieslēgties neizdevās:".mysqli_connect_error());
    }
?>