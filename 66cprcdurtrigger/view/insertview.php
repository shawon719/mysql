<?php
// Database connection
$db = new mysqli("localhost", "root", "", "brandn");

// Binding brand table properties with server using POST variable.
if (isset($_POST["brbtn"])) {
    $bname = $_POST["bname"];
    $contact = $_POST["cname"];
    $db->query("CALL brn('$bname','$contact')");
}

// Binding product table properties with server using POST variable
if (isset($_POST["addpro"])) {
    $pname = $_POST["pname"];
    $price = $_POST["ppr"];
    $brid = $_POST["probrand"];
    $db->query("CALL proadd('$pname','$price','$brid')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trigger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            margin-bottom: 20px;
        }

        h3 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 8px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            width: 80%;
            max-width: 700px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <section class="one">
        <h3>This is the brand name table</h3>
        <form action="" method="post">
            <label for="bname">Name:</label>
            <input type="text" name="bname" id="bname" required><br><br>
            <label for="cname">Contact:</label>
            <input type="number" name="cname" id="cname" required>
            <button name="brbtn">Submit</button>
        </form>
    </section>

    <section class="two">
        <h3>This is the product table</h3>
        <form action="" method="post">
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" id="pname" required><br><br>
            <label for="ppr">Price:</label>
            <input type="text" name="ppr" id="ppr" required><br><br>
            <label for="probrand">Brand Name:</label>
            <select name="probrand" id="probrand">
                <?php
                $product = $db->query("SELECT * FROM brandname");
                while (list($_brid, $_brname) = $product->fetch_row()) {
                    echo "<option value='$_brid'>$_brname</option>";
                }
                ?>
            </select><br><br>
            <button name="addpro">Add</button>
            <button name="delpro">Delete</button>
        </form>
    </section>

    <section class="three table-container">
        <h3>This is the view table</h3>
        <table>
            <tr>
                <th>Serial</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Brand Name</th>
                <th>Contact</th>
            </tr>
            <?php
            $product = $db->query("SELECT * FROM product_details");
            $count = 1;
            while ($row = $product->fetch_row()) {
                list($_id, $_name, $_price, $_bname, $_cont) = $row;
                echo "<tr>
                        <td>$count</td>
                        <td>$_name</td>
                        <td>$_price</td>
                        <td>$_bname</td>
                        <td>$_cont</td>
                      </tr>";
                $count++;
            }
            ?>
        </table>
    </section>

</body>

</html>
