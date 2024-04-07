<?php
/*
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "event";

    $conn=mysqli_connect($servername,$username,$password,$database_name);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $fullName= $_POST['fullName'];
        $Email= $_POST['email'];
        $Phone= $_POST['phone'];
        $Username= $_POST['username'];
        $Password= $_POST['password'];
        $Department=$_POST['department'];
        $Usertype=$_POST['atype'];
        if(!empty($Email) && !empty($Password) && !is_numeric($Email))
        {
            $query = "INSERT INTO admin(fullName,email,phone,username,password,department) VALUES('$fullName',' $Email','$Phone','$Username','$Password','$Department','$Usertype')";
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
    */




    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "event";
    
    $conn = mysqli_connect($servername, $username, $password, $database_name);
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fullname = mysqli_real_escape_string($conn, $_POST['fullName']);
        $Email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $usertype = mysqli_real_escape_string($conn, $_POST['atype']);
    
        // Validate if fields are not empty
        if (!empty($Email) && !empty($username) && !empty($password) && !empty($department) && !empty($fullname)) {
            $query = "INSERT INTO admin (fullName, email, phone, username,password,department,atype) VALUES (?, ?, ?, ?,?,?,?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $Email, $phone, $username,$password,$department,$usertype);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
            } else {
                echo "<script type='text/javascript'> alert('Failed to register')</script>";
                // For debugging, you can uncomment below line to see the error message
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
        }
        mysqli_close($conn);
    }
    
    ?>