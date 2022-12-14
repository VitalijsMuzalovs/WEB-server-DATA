<?php
    $page = "audzekni";
    require "header.php"
?>
<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Apskats par audzekni:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "../files/connect_db.php";
                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_statuss = $_POST['statuss'];
                        $atjaunot_statusu_SQL = "UPDATE audzekni SET statuss='$atlasitais_statuss' WHERE audzeknis_ID =".$_POST['rediget'];
                        if(mysqli_query($con,$atjaunot_statusu_SQL)){
                            echo "<div class='zinojums zals'>Statuss veiksmīgi atjaunots!</div>";
                            header("Refresh:2; url=audzekni.php");
                        }else{
                            echo "<div class='zinojums sarkans'>Kaut kas nogāji greizi! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=audzekni.php");
                        }
                    }else{
                        $audzeknaID = $_POST['apskatit'];
                        $atlasit_audzekni_SQL = "SELECT * FROM audzekni a JOIN statuss st ON a.statuss = st.statuss_ID WHERE a.audzeknis_ID = $audzeknaID";
                        $atlasa_audzekni = mysqli_query($con, $atlasit_audzekni_SQL);

                        $statusi_SQL = "SELECT * FROM statuss";
                        $atlasa_statusus = mysqli_query($con,$statusi_SQL);
                        $statusi ="";

                        while($statuss = mysqli_fetch_assoc($atlasa_statusus)){
                            $statusi = $statusi."<option value='{$statuss['statuss_ID']}'>{$statuss['stat_nosaukums']}</option>";
                        }

                        while($audzeknis = mysqli_fetch_assoc($atlasa_audzekni)){
                            echo "
                                <table>
                                    <tr>
                                        <td rowspan='13'><i class='fas fa-user user-ico'></i>
                                    </tr>
                                    <tr><td>Audzeknis:</td><td class='value'>{$audzeknis['vards']}{$audzeknis['uzvards']}</td></tr>
                                    <tr><td>Dzimšanas dati:</td><td class='value'>{$audzeknis['dzim_dati']}</td></tr>
                                    <tr><td>Tālrunis:</td><td class='value'>{$audzeknis['talrunis']}</td></tr>
                                    <tr><td>E-pasts:</td><td class='value'>{$audzeknis['epasts']}</td></tr>
                                    <tr><td>Dzīvesvietas adrese:</td><td class='value'>{$audzeknis['adrese']}</td></tr>
                                    <tr><td>Prioritārā specialitāte:</td><td class='value'>{$audzeknis['spec1']}</td></tr>
                                    <tr><td>Sekundārā specialitāte:</td><td class='value'>{$audzeknis['spec2']}</td></tr>
                                    <tr><td>Absolvētā izglītības iestāde:</td><td class='value'>{$audzeknis['izglitiba']}</td></tr>
                                    <tr><td>Vidējais vertējums:</td><td class='value'>{$audzeknis['vid_vertejums']}</td></tr>
                                    <tr><td>Reģistrēšanas datums:</td><td class='value'>{$audzeknis['reg_datums']}</td></tr>
                                    <tr><td>Komentāri:</td><td class='value'>{$audzeknis['komentari']}</td></tr>
                                    <tr><td>Uzņemšanas statuss dati:</td><td class='value'>
                                        <form method='POST'>
                                            <select name='statuss' required>
                                                <option value='{$audzeknis['statuss']}' selected hidden>{$audzeknis['stat_nosaukums']}</option>
                                                $statusi;
                                            </select>
                                            <button name='rediget' type='submit' class='btn' value='{$audzeknis['audzeknis_ID']}'>Saglabāt</button>
                                        </form>
                                    </td></tr>
                                </table>
                            ";
                        }
                    }
                }else{
                    echo "<div class='zinojums sarkans'>Kaut kas nogāji greizi! Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=audzekni.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>
