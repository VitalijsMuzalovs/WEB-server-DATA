<?php
    require("connect_db.php");

    if(isset($_POST['pievienotPreci'])){
        $prece = $_POST['precesIevade'];
        $cena = $_POST['cenasIevade'];
        $skaits = $_POST['skaitaIevade'];
    }

    if(!empty($prece) && !empty($cena) && !empty($skaits)){
        $preces_ievietosana_SQL = "INSERT INTO prece (nosaukums,cena,daudzums) VALUES ('$prece','$cena','$skaits')";
        if(mysqli_query($con,$preces_ievietosana_SQL)){
            // echo "Prece veiksmīgi pievienota!";
            header("Refresh:0,url=index.php");
        }else{
            echo "Error!";
        }
    }else{
        echo "Nav aizpildīti visi ievades lauki!";
        header("Refresh:1,url=index.php");
    }
?>