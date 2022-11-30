<?php
    require("connect_db.php");

    if(isset($_POST['dzestPreci'])){
        $precesID = $_POST['dzestPreci'];

        // $dzest_SQL = "DELETE FROM prece WHERE ID = $precesID";

        $dzest_SQL = "UPDATE prece SET active = '0' WHERE ID = $precesID";

        if(mysqli_query($con,$dzest_SQL)){
            // echo "Prece veiksmīgi izdzēsta!";
            header("Refresh:0,url=index.php");
        }else{
            echo "Error!";
        }
    }
?>