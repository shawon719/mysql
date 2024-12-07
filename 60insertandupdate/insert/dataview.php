<?php
    include("dbconnect.php");
    if(isset($_GET['deleteid'])){
        $delete_id = $_GET['deleteid'];

        $sql = "DELETE FROM client_det WHERE id = $delete_id";
        if(mysqli_query($conn, $sql) == TRUE){
            header("location:dataview.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            padding: 20px 0;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-links {
            display: flex;
            justify-content: space-evenly;
        }

        .action-links a {
            background-color: #ff4e42;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-links a:hover {
            background-color: #ff2a1e;
        }
    </style>
</head>
<body>
    <p>
        <a href="insertdb.php">Insert New Data</a>
    </p>
    <h1>User Information</h1>

    <?php
        $sql = "SELECT * FROM client_det";
        $query = mysqli_query($conn, $sql);

        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>";
        
        while($data = mysqli_fetch_assoc($query)){
            $id = $data['id'];
            $name = $data['name'];
            $add = $data['address'];
            echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$add</td>
                    <td class='action-links'>
                        <a href='dataview.php?deleteid=$id'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
