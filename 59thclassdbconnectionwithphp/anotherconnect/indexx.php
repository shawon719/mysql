<?php
        include("connectdbwphp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db connection</title>
</head>
<body>
            <h1>database connection procedural way.Without try and catch function.</h1>
        <table border="2" style="border-collapse:collapse;">
            <tr>
                <th>id</th>
                <th>NAME</th>
                <th>EMAIL</th>
            </tr>

            <?php
                $db=$connect->query("select * from trainee_details");
                while(list($_id,$_name,$_email)=$db->fetch_row()){
                    echo "<tr>
                        <td>$_id</td>
                        <td>$_name</td>
                        <td>$_email</td>
                    </tr>";
                }
            ?>
        </table>
</body>
</html>