<?php
$db = mysqli_connect("localhost","root","","products_data");
if(isset($_POST["btnSubmit"])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $db->query("call brand_insert('$name','$contact')");
}
if(isset($_POST["btnProduct"])){
    $name = $_POST['bname'];
    $price = $_POST['bprice'];
    $nanuf = $_POST['manuf'];
    // $id = $_POST['manufac'];
    $db->query("call add_product('$name','$price','$nanuf')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .separator {
            text-align: center;
            margin: 20px 0;
            color: #777;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-action {
            background-color: #ff4c4c;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-action:hover {
            background-color: #e04343;
        }

        .btn-update {
            background-color: #ffa500;
        }

        .btn-update:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>

    <!-- Personal Info Form -->
    <section>
        <h1>Add Brand Name</h1>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" required><br>

            <button type="submit" name="btnSubmit">Submit</button>
        </form>
    </section>

    <div class="separator">or</div>

    <!-- Product Form -->
    <section>
        <h1>Add Product</h1>
        <form action="" method="post">
            <label for="bname">Product Name:</label>
            <input type="text" name="bname" required><br>

            <label for="bprice">Price:</label>
            <input type="number" name="bprice" required><br>

            <label for="manuf">Manufacturer:</label>
            <select name="manuf" required>
                <?php 
                $manufaclist = $db->query("SELECT * FROM brand");
                while(list($_bid, $_bname) = $manufaclist->fetch_row()){
                    echo "<option value='$_bid'>$_bname</option>";
                }
                ?>
            </select><br>

            <button type="submit" name="btnProduct">Submit</button>
        </form>
    </section>

    <!-- Product List Table -->
    <div class="table-container">
        <h2>Product Information</h2>
        <table>
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>Brand</th>
                    <th>Contact</th>
                    <th>Product name</th>
                    <th>Product Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = mysqli_connect("localhost","root","","products_data");

                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $user = $db->query("SELECT * FROM product_details");
                    $counter = 1;
                    while (list($brand,$contact, $product_name, $price) = $user->fetch_row()) {
                        $counter++;
                        echo "<tr>
                            <td>$counter</td>
                            <td>$brand</td>
                            <td>$contact</td>
                            <td>$product_name</td>
                            <td>$price</td>
                        </tr>";
                       
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
