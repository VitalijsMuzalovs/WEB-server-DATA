<?php ob_start();?>
<?php
    require("../files/connect.php");
    // require("activeUser.php");
    $selectUsers = "SELECT userID,login,name,surname,email,active FROM users ORDER BY login";
    $rsUsers = mysqli_query($con,$selectUsers);
    echo "
        <div class='users'>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>E-mail</th>
                    <th>Active</th>
                </tr>";
                
            while($row = mysqli_fetch_assoc($rsUsers)){
                echo "
                <tr>
                    <td>
                        <form action='#' method='post'>
                            <button class='edit_button' type='submit' name='edit' value=".$row['userID'].">
                                <i class='fa-solid fa-user-pen'></i>
                            </button>
                        </form></td>
                    <td>".$row['login']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['surname']."</td>
                    <td>".$row['email']."</td>";
                    if($row['active']){
                        echo "<td>Active</td>";
                    }else{
                        echo "<td>Disabled</td>";
                    }
                    
                echo "</tr>";
            }
    echo "
            </table>
        </div>
    ";
?>
<?php ob_end_flush();?>