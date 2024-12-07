<?php
    include("dbconnect.php");
    if(isset($_GET['deleteid'])){
        $delete_id=$_GET['deleteid'];

        $sql="DELETE FROM client_det WHERE id = $delete_id";
        if(mysqli_query($conn,$sql)==TRUE){
            header("location:dataview.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data view</title>
</head>
<body>
    <p>
        <a href="insertdb.php">insert new data</a>
    </p>
    <h1>User Information</h1>

    <?php
        $sql="SELECT * FROM client_det";
        $query=mysqli_query($conn,$sql);
        echo "this is my table";
        echo "<table border='1' style='border-collapse:collapse;'>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>address</th>
                    <th>ACTION</th>
                </tr>";
                while($data=mysqli_fetch_assoc($query)){
                    $id=$data['id'];
                    $name=$data['name'];
                    //$age=$data['age'];
                    //$email=$data['email'];
                    $add=$data['address'];
                    echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$add</td>
                                <td>
                                    <span>
                                            <a href='dataview.php?deleteid=$id' >delete</a>
                                    </span>
                                   
                                </td>
                    </tr>";
                }
        //</table>";
    ?>
</body>
</html>