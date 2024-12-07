<?php
    include("dbconnect.php");
    if(isset($_POST['btn'])){
        $id = $_POST['idd'];
        $name = $_POST['na'];
        $add = $_POST['em'];

        $sql = "INSERT INTO client_det(id, name, address) VALUES ('$id', '$name', '$add')";
        if(mysqli_query($conn, $sql) == TRUE){
            echo "Data inserted.";
            header("location:dataview.php");
        }
        else{
            echo "Data not inserted.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data into Database</title>
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
            color: purple;
            padding-top: 20px;
        }

        section {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style> -->
</head>
<body>

    <h1>Insert Client Data into Database</h1>
    
    <section>
        <form action="#" method="post">
            <div>
                <label for="idd">ID:</label>
                <input type="text" name="idd" id="idd" required>
            </div>
            <div>
                <label for="na">Name:</label>
                <input type="text" name="na" id="na" required>
            </div>
            <div>
                <label for="em">Address:</label>
                <input type="text" name="em" id="em" required>
            </div>
            <div>
                <button name="btn">Submit</button>
            </div>
        </form>

        <div class="message">
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
        </div>
    </section>

</body>
</html>
