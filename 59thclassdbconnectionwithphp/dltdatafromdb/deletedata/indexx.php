<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data delete</title>
</head>
<body>
        <h1>data delete</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ACTION</th>
            </tr>
            <?php
                     
                    $users=$db->query("select * from friend");
                    while(list($_id,$_name,$_email)=$users->fetch_row()){
                        echo "<tr>
                            <td>$_id</td>
                            <td>$_name</td>
                            <td>$_email</td>
                            <td>
                                <a href='indexx.php?deleteid=$_id'>DELETE</a>
                            </td>
                        </tr>";
                    }
                     
            ?>
        </table>
</body>
</html>