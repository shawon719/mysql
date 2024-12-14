<?php
    // Database connection
    $dbcon = new mysqli('localhost', 'root', '', 'brandproductdb');
    
    // This code inserts data into the database
    if (isset($_POST['btn'])) {
        $bname = $_POST['bname'];
        $contact = $_POST['contact'];
        $dbcon->query("CALL br('$bname', '$contact')");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // This code will show for product
    if (isset($_POST['addproduct'])) {
        $pname = $_POST['pnam'];
        $pprice = $_POST['pp'];
        $mid = $_POST['product'];
        $dbcon->query("CALL pro('$pname', '$pprice', '$mid')");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedure Way Insert</title>
    <style>
        /* General Page Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h3 {
            text-align: center;
            color: #555;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        section {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Form Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 10px;
            font-size: 1.1rem;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }

        button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: bold;
        }

        /* Table Styling */
        table, th, td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
            font-size: 1.1rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Centering the table and form */
        .form-section, .table-section {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <section class="form-section">
        <h3>Brand Table</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="nam">Name:</label></td>
                    <td><input type="text" name="bname" id="nam" required></td>
                </tr>
                <tr>
                    <td><label for="con">Contact:</label></td>
                    <td><input type="text" name="contact" id="con" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="btn">Submit</button></td>
                </tr>
            </table>
        </form>
    </section>

    <section class="form-section">
        <h3>Product Table</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="pname">Product Name:</label></td>
                    <td><input type="text" name="pnam" id="pname" required></td>
                </tr>
                <tr>
                    <td><label for="pprice">Price:</label></td>
                    <td><input type="number" name="pp" id="pprice" required></td>
                </tr>
                <tr>
                    <td><label for="prod">Brand Name:</label></td>
                    <td>
                        <select name="product" id="prod" required>
                            <?php
                                $product = $dbcon->query("SELECT * FROM brandtab");
                                while (list($_mid, $_name) = $product->fetch_row()) {
                                    echo "<option value='$_mid'>$_name</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="addproduct">Add Product</button></td>
                </tr>
            </table>
        </form>
    </section>

    <section class="table-section">
        <h3>View Table</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Brand Name</th>
                <th>Contact</th>
            </tr>
            <?php
                $product = $dbcon->query("SELECT * FROM products_details");
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
