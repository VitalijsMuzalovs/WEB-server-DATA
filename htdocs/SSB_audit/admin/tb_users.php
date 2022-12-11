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
                    <th>Login</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>E-mail</th>
                    <th>Active</th>
                </tr>";
                
            while($row = mysqli_fetch_assoc($rsUsers)){
                echo "
                <tr>
                    <td>".$row['login']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['surname']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['userID']."</td>";
                    if($row['active']){
                        echo "<td><form method='post' action='activeUser.php'><input type='checkbox' name=".$row['userID']." checked></form</td>";
                    }else{
                        echo "<td><form method='post' action='activeUser.php'><input type='checkbox' name=".$row['userID']."></form></td>";
                    }
                    
                echo "</tr>";
            }
    echo "
            </table>
        </div>
    ";
?>
<?php ob_end_flush();?>