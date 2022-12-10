<?php
    require("connect_db.php");
    
    $preces_atlasisanas_SQL = "SELECT * FROM prece WHERE active=1";
    $preces_atlasisana = mysqli_query($con, $preces_atlasisanas_SQL) or die("Nekorrekts SQL vaicājums!");

    if(mysqli_num_rows($preces_atlasisana) > 0){
        echo "<table>";
            echo "
                <tr>
                    <th>ID</th>
                    <th>PRECE</th>
                    <th>CENA</th>
                    <th>DAUDZUMS</th>
                    <th></th>
                </tr>";

                while($ieraksts = mysqli_fetch_assoc($preces_atlasisana)){
                    echo "
                        <tr>
                            <td>{$ieraksts['ID']}</td>
                            <td>{$ieraksts['nosaukums']}</td>
                            <td>{$ieraksts['cena']}</td>
                            <td>{$ieraksts['daudzums']}</td>
                            <td>
                                <form action='delete.php' method='post'>
                                    <button name='dzestPreci' type='submit' value='{$ieraksts['ID']}'>
                                        <i class='fas fa-times'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        ";
                }

        echo "</table>";
    }else{
        echo "<p>Nav datu ko atlasīt!<?p>";
    }
?>