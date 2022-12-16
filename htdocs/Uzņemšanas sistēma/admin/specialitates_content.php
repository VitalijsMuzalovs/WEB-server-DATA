<section class="admin">
    <div class="editForm" id="editForm">
        <div class="row">
            <div class="info">
                <div class="head-info head-color">
                    <div class="left">Pievienot jaunu specialītāti:</div>
                    <div></div>
                    <div class="right"></div>
                </div>
                
                <div class="form" >
                    <form action="" method="POST" class="form_container">
                        <div><span>Specialītāte: </span></div>
                        <div><input class="box1" type="text" name="specialitate" id="specialitate" placeholder="Ievadi specialītātes nosaukumu *" required></div>
                        <div><span >Apraksts: </span></div>
                        <div><textarea class="box1 " rows="5" cols="10" name="description" id="description" placeholder="Ievadi specialītātes aprakstu *" required style="resize: vertical;"></textarea></div>
                        <div><span>Attēls: </span></div>
                        <div><input class="box1" type="text" name="img_url" id="img_url" placeholder="Ievadi specialītātes attēla saiti *" required></div>
                        <div><input class="box1" type="text" name="specialitates_ID" id="specialitates_ID"></div>
                        <div class="buttons">
                        <input class="btn" type="submit" name="addPositionBtn" id="addPositionBtn" value="ADD">
                        <input class="btn disabled" type="button" name="savePositionBtn" id="savePositionBtn" value="SAVE">
                        <input class="btn disabled" type="button" name="cancelEditPosition" id="cancelEditPosition" onclick="cancelEdit()" value="CANCEL">
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
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
                            <td>{$position['specialitates_ID']}</td>
                            <td><img src='{$position['attels_URL']}' alt='{$position['nosaukums']}'></img></td>
                            <td>{$position['nosaukums']}</td>
                            <td>{$position['apraksts']}</td>
                            <td>
                                <form method='post' action='#'>
                                    <button type='submit' name='edit' class='btn2' value='{$position['specialitates_ID']}'><i class='fas fa-edit'></i></button>
                                </form>
                            </td>
                            <td>
                                <form method='post' action='#'>
                                    <button type='submit' name='delete' class='btn2' value='{$position['specialitates_ID']}'><i class='fa-regular fa-trash-can'></i></button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>
        <!-- </div> -->
    <!-- </div> -->
</section>