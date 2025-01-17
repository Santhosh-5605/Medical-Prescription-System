<?php
session_start();
$email=$_POST['email'];
$password=$_POST['pswd'];
$link=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($link,"login") or die("cannot connect at database");
$result = mysqli_query($link, "SELECT * FROM santhosh WHERE email='$email'");
$exists = mysqli_num_rows($result);
$tableEmail = '';
$tablePass = '';
if ($exists > 0)
{
    while($row=(mysqli_fetch_array($result)))
    {
        $tableEmail = $row['email'];
        $tablePass = $row['password'];
    }
    if($email === $tableEmail)
    {
        if($password === $tablePass)
        {
            // $_SESSION['email'] = $tableEmail;
            header('location:medicine.html');
        }
        else{
            echo('pass wrong');
            Print '<script>alert("Incorrect Password...!!");</script>';
            header('location:index.html');
        }
    }
    else{
        echo('no user found');
        // Print '<script>alert("Incorrect User...!!");</script>';
        header('location:index.html');
    }
}
?>