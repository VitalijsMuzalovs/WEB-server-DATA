<?php
    $servera_vards = "localhost";
    $lietotajvards = "root";
    $parole = "";
    $db_nosaukums ="sessija";

    $con = mysqli_connect($servera_vards,$lietotajvards,$parole,$db_nosaukums);

    if(!$con){
        die("Pieslēgties neizdevās:".mysqli_connect_error());
    }
?>