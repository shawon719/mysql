<?php
    $db= mysqli_connect('localhost','root','','student_info');
    if(!$db){
        echo "connection failed";
    }else{
        echo "connect successfully";
    }
?>

<table border="1" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>email</th>
    </tr>
    <?php
            $users= $db->query("select * from sharmony");
            while(list($_id,$_name,$_email)= $users->fetch_row()){
                echo "<tr>
                    <td>$_id</td>
                    <td>$_name</td>
                    <td>$_email</td>
                </tr>";
            }
    ?>
</table>