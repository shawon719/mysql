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
            color: #962642;
            padding: 20px 0;
        }
        h1:hover{
            color: #333;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #962642;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #85afd4;
            color:black;
        }

        /* Table Styling */
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5899d1;
            color: white;
        }
        th:hover{
            background-color: #055737;
            color: white;
        }

        td {
            color: black;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }
        

        tr:hover {
            background-color: #ccebdf;
        }

        .action-links {
            display: flex;
            justify-content: space-evenly;
        }

        .action-links a {
            background-color: #82589F;
            padding: 5px 10px;
            border-radius: 3px;
            color: black;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-links a:hover {
            background-color: #EAB543;
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
