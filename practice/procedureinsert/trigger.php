<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trigger</title>
</head>
<body>
<form action="" method="post">
            Manufacturer:<select name="manufact">
                <?php
                        $manu=$db->query("select * from manufacturetabl");
                        while(list($_mid,$_mname)=$manu->fetch_row()){
                            echo "<option value='$_mid'>$_mname</option>";
                        }
                ?>
            </select><br>
            <button name="delBtn">Delete</button>
        </form>
</body>
</html>