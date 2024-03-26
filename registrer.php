<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "Event";

    $conn=mysqli_connect($servername,$username,$password,$database_name);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $firstname= $_POST['fname'];
        $lastname= $_POST['lname'];
        $Email= $_POST['email'];
        $Password= $_POST['pass'];
        $Department=$_POST['department'];
        if(!empty($Email) && !empty($Password) && !is_numeric($Email))
        {
            $query = "INSERT INTO form (fname,lname,email,pass,department) VALUES ('$firstname','$lastname','$Email','$Password',$Department)";
            $result=mysqli_query($conn, $query);
            if ($result) {
                echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
            }
            else {
                echo "<script type='text/javascript'> alert('Failed to register')</script>";
            }
        }   
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
        }
    }
?>