<?php
    $page = "sakums";
    require "header.php"
?>
<body>
    <section class="admin">
        <div class="kopsavilkums">
            <?php require("../files/connect_db.php"); ?>
            <div class="informacija">
                <span>
                    <?php 
                        $jauni_pieteikumi_SQL = "SELECT COUNT(audzeknis_ID) FROM audzekni WHERE reg_datums BETWEEN NOW() - INTERVAL 1 DAY and NOW();";
                        $atlasa_jaunako_piet_sk = mysqli_query($con,$jauni_pieteikumi_SQL);

                        while($rezultats = mysqli_fetch_assoc($atlasa_jaunako_piet_sk)){
                            echo "{$rezultats['COUNT(audzeknis_ID)']}";
                        }
                    ?>
                </span>
                <h3>Jauni pieteikumi</h3>
                <p>Pēdējo 24h laikā</p>
            </div>
            <div class="informacija">
                <span>
                    <?php 
                        $parbauditi_dok_SQL = "SELECT COUNT(audzeknis_ID) FROM audzekni WHERE statuss = 3;";
                        $atlasa_parbaudito_dok_sk = mysqli_query($con,$parbauditi_dok_SQL);

                        while($rezultats = mysqli_fetch_assoc($atlasa_parbaudito_dok_sk)){
                            echo "{$rezultats['COUNT(audzeknis_ID)']}";
                        }
                    ?>
                </span>
                <h3>Pārbaudīti dokumenti</h3>
                <p>Kopš uzņemšanas sākuma</p>
            </div>
            <div class="informacija">
                <span>
                    <?php 
                        $total_docs_SQL = "SELECT COUNT(audzeknis_ID) FROM audzekni;";
                        $total_doc_count = mysqli_query($con,$total_docs_SQL);

                        while($rezultats = mysqli_fetch_assoc($total_doc_count)){
                            echo "{$rezultats['COUNT(audzeknis_ID)']}";
                        }
                    ?>
                </span>
                <h3>Pieteikumu kopā</h3>
                <p>Kopš uzņemšanas sākuma</p>
            </div>
            <div class="informacija">
                <span>
                    <?php 
                        $active_positions_SQL = "SELECT COUNT(specialitates_ID) FROM specialitates;";
                        $active_positions_count = mysqli_query($con,$active_positions_SQL);

                        while($rezultats = mysqli_fetch_assoc($active_positions_count)){
                            echo "{$rezultats['COUNT(specialitates_ID)']}";
                        }
                    ?>
                </span>
                <h3>Aktīvas specialitātes</h3>
                <p>Kurām var pieteikties</p>
            </div>
        </div>

        <div class="row">
            <div class="info">
                <div class="head-info">Pēdējās izmaiņas sistēmā:</div>
                <table>
                    <tr><th>Audzēknis</th><th>Specialitāte</th><th>Statuss</th></tr>
                    <?php
                        $last_changes_SQL = "SELECT * FROM audzekni a JOIN statuss st ON a.statuss = st.statuss_ID ORDER BY reg_datums DESC LIMIT 7;";
                        $last_changes = mysqli_query($con,$last_changes_SQL);

                        while($rezultats = mysqli_fetch_assoc($last_changes)){
                            echo "
                                <tr>
                                    <td>{$rezultats['vards']} {$rezultats['uzvards']}</td>
                                    <td>{$rezultats['spec1']}</td>
                                    <td>{$rezultats['stat_nosaukums']}</td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
            <div class="info2">
                <div class="head-info">Pieprasītākās specialitātes:</div>
                <table>
                    <tr><th>Specialitāte</th><th>Pieteikumi</th></tr>
                    <?php
                        $top_positions_SQL = "SELECT spec1,COUNT(spec1) FROM audzekni GROUP BY spec1 ORDER BY COUNT(spec1) DESC LIMIT 7;";
                        $top_positions = mysqli_query($con,$top_positions_SQL);

                        while($rezultats = mysqli_fetch_assoc($top_positions)){
                            echo "
                                <tr>
                                    <td>{$rezultats['spec1']}</td>
                                    <td>{$rezultats['COUNT(spec1)']}</td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
<?php
    include "footer.php"
?>