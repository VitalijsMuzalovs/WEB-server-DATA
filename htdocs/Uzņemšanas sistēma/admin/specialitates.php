<?php
    $page = "specialitates";
    require "header.php"
?>
<section class="admin">
    <div class="row" >
        <div class="info">
            <div class="head-info head-color">
                <div class="left">Pievienot jaunu specialītāti:</div>
                <div></div>
                <div class="right"></div>
            </div>
            
            <div class="form" >
                <form action="" method="POST">
                    <label for="specialitate">Specialītāte: </label>
                    <input class="box1" type="text" name="specialitate" id="specialitate" placeholder="Ievadi specialītātes nosaukumu *" required>
                    <!-- <label for="description">Apraksts: </label>
                    <input class="box1" type="textarea" rows="5" cols="60" name="description" id="description" placeholder="Ievadi specialītātes aprakstu *" required> -->
                    <!-- <input type="text" name="userID" id="userID" hidden>
                    <div class="buttons">
                    <input class="button" type="submit" name="addUserBtn" id="addUserBtn" value="ADD">
                    <input class="button disabled" type="button" name="saveUserBtn" id="saveUserBtn" value="SAVE">
                    <input class="button disabled" type="button" name="cancelEditUser" id="cancelEditUser" onclick="cancelEdit()" value="CANCEL"> -->
                    <!-- </div> -->
                </form>
            </div>

            <div class="info">
                <div class="head-info head-color">
                        <div class="left">Specialītāšu administrēšana:</div>
                        <div></div>
                        <div class="right">
                            <div class="btn">Pievienot specialitāti <i class="fa-solid fa-plus"></i></div>
                        </div>
                </div>
                <table class="specialitatesTabula">
                    <tr>
                        <th>Attēls</th>
                        <th>Specialītāte</th>
                        <th>Apraksts</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                        require("../files/connect_db.php");
                        $all_positions_SQL = "SELECT * FROM specialitates";
                        $all_positions_RS = mysqli_query($con,$all_positions_SQL);
                        while($position = mysqli_fetch_assoc($all_positions_RS)){
                            echo "
                                <tr>
                                    <td><img src='{$position['attels_URL']}' alt='{$position['nosaukums']}'></img></td>
                                    <td>{$position['nosaukums']}</td>
                                    <td>{$position['apraksts']}</td>
                                    <td>
                                        <form method='post' action='#'>
                                            <button type='submit' name='edit' class='btn2' value=''><i class='fas fa-edit'></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method='post' action='#'>
                                            <button type='submit' name='delete' class='btn2' value=''><i class='fa-regular fa-trash-can'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
    include "footer.php"
?>