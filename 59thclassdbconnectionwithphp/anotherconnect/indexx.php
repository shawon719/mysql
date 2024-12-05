<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db connection</title>
</head>
<body>
        <table>
            <tr>
                <th>NAME</th>
                <th>id</th>
                <th>EMAIL</th>
            </tr>

            <?php
                $db=$connect->query("select * from ");
                while(list($_name,$_id,$_email)=$db->fetch_row()){
                    echo "<tr>
                        <td>$_name</td>
                        <td>$_id</td>
                        <td>$_email</td>
                    </tr>";
                }
            ?>
        </table>
</body>
</html>