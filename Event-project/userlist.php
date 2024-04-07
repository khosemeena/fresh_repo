<?php

require_once('db.php');
$query = "select * from admin";
$result=mysqli_query($conn,$query);
?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">

<title>Fatech Data From Database in Php</title>

</head>

<body class="bg-dark">

<div class="container">

<div class="row">

<div class="col">

<div class="card">

<div class="card-header">

<h2 class="display-6 text-center">User Details List</h2>

</div>
<div class="card-body">
    <table class="table table-bordered text-center">
        <tr class="bg-dark text-white">
            <td>sr no</td>
            <td>User name</td>
            <td>email</td>
            <td>phone no</td>
            <td>username</td>
            <td>password</td>
            <td>department</td>
            <td>usertype</td>
        </tr>
        <tr>
            <?php
            
            while($row=mysqli_fetch_assoc($result)){
                ?>

                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['fullName'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['department'];?></td>
                    <td><?php echo $row['atype'];?></td>


        </tr>
                <?php
            }
        
            ?>
       
    </table>

</div>

</div>

</div>

</div>

</div>

</body>

</html>