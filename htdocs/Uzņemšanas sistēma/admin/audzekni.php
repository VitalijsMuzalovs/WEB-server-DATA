<?php
    $page = "audzekni";
    require "header.php"
?>
<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Audzēkņu administrēšana:</div>
            <table class="adminTabula">
                <tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>1.specialitāte</th>
                    <th>1.specialitāte</th>
                    <th>Absolvējis</th>
                    <th>Vidēja atzīme</th>
                    <th>Statuss</th>
                    <th>Komentāri</th>
                    <th></th>
                </tr>
                <?php
                    require("../files/connect_db.php");
                    $atlasit_audzeknus_SQL = "SELECT * FROM audzekni a JOIN statuss st ON a.statuss = st.statuss_ID";
                    $atlasa_audzeknus = mysqli_query($con,$atlasit_audzeknus_SQL);
                    while($audzeknis = mysqli_fetch_assoc($atlasa_audzeknus)){
                        if(empty($audzeknis['komentari'])){
                            $komentari = "<i class='fas fa-times'></i>";
                        }else{
                            $komentari = "<i class='fas fa-check'></i>";;
                        }
                        echo "
                            <tr>
                                <td>{$audzeknis['vards']}</td>
                                <td>{$audzeknis['uzvards']}</td>
                                <td>{$audzeknis['spec1']}</td>
                                <td>{$audzeknis['spec2']}</td>
                                <td>{$audzeknis['izglitiba']}</td>
                                <td>{$audzeknis['vid_vertejums']}</td>
                                <td>{$audzeknis['stat_nosaukums']}</td>
                                <td>{$komentari}</td>
                                <td>
                                    <form method='post' action='audzeknis.php'>
                                        <button type'submit' name='apskatit' class='btn2' value='{$audzeknis['audzeknis_ID']}'><i class='fas fa-edit'></i></button>
                                    </form></td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php"
?>