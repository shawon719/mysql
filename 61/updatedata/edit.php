<?php
    // $conn=mysqli_connect('localhost','root','','shop');
    // if($_GET['id']){
    //     $getid=$_GET['id'];
    //     $sql="SELECT * FROM shop_emp WHERE id=$getid";
    //     $query=mysqli_query($conn,$sql);
    //     $data=mysqli_fetch_assoc($query);
    //     $id=$data['id'];
    //     $name=$data['name'];
    //     $address=$data['address'];
    // }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        Name: <br>
        <input type="text" name="na" value="<?php echo $name ?>" id=""><br>
        Address: <br>
        <input type="text" name="add" value="<?php echo $address ?>" id="">

        <input type="text" name="id" value="<?php echo $id ?>" hidden id=""><br><br>
        <input type="submit" name="edit" value="EDIT">
    </form>
</body>
</html> -->

<?php 
$conn = mysqli_connect('localhost','root','','shop');
if ($_GET['id']){ 
    $getid = $_GET['id'];
   $sql = "SELECT * FROM shop_details WHERE id=$getid";
   $query = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($query);
   $id = $data['id'];
   $name = $data['name'];
   $address=$data['address'];
//    $age = $data['age'];
//    $email = $data['email'];
}


?>
<html lang="en">
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>
</head>
<body>
   <!-- <div class="container"> 
    <div class="row"> 
        <div class="col-sm-3"></div>
        <div class="col-sm-6 pt-4 mt-4 border border-success">  -->
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"> 
        Name:<br>
        <input type ="text" name ="name" value="<?php echo $name ?>"><br><br>
        Address: <br>
        <input type="text" name="add" value="<?php echo $address?>" id="">
        <!-- Age:<br>
        <input type ="text" name ="age" value="<?php echo $age ?>"><br><br> -->
        <!-- Email:<br> 
        <input type ="email" name ="email" value="<?php echo $email ?>"><br><br>-->
        <input type ="text" name ="id" value =" <?php echo $id ?>" hidden><br><br>
        <input type ="submit" name ="edit" value="Edit" class="btn btn-success">
    </form>
    </div>
        <div class="col-sm-3"></div>
    </div>
   </div>
</body>
</html>