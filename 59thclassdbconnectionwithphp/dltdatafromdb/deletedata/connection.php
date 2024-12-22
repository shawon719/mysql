<?php
        $db=mysqli_connect('localhost','root','','friend_list');
        if(isset($_GET['deleteid'])){
            $delete_id=$_GET['deleteid'];

            $sql="DELETE FROM friend WHERE id = $delete_id";
                    if(mysqli_query($db,$sql)==TRUE){
                        header("location:indexx.php");
                        exit();
                    } 
        }
?>