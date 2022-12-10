<?php
    require("../files/connect.php");
    $selectUsers = "SELECT login,name,surname,email,active FROM users ORDER BY login";
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
                    <td>".$row['active']."</td>
                </tr>";
            }
    echo "
            </table>
        </div>
    ";
?>