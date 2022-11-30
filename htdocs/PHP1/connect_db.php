<?php
    $servera_vards = "localhost";
    $lietotajvards = "root";
    $parole = "";
    $db_nosaukums ="php1";

    $con = mysqli_connect($servera_vards,$lietotajvards,$parole,$db_nosaukums);

    if($con){
        echo "Savienojums ar DB veiksmīgi izveidots!";
    }else{
        die("Pieslēgties neizdevās:".mysqli_connect_error());
    }
?>