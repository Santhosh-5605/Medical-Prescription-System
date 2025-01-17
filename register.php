<?php
$Name=$_POST['Name'];
$D_O_B=$_POST['date'];
$email=$_POST['email'];
$password=$_POST['password'];
$Mobile_No=$_POST['phNumber'];

$link=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($link,"medicine") or die("cannot connect at database");
mysqli_query($link,"INSERT INTO doctor (Name,D_O_B,email,password,Mobile_No) VALUES ('$Name','$D_O_B','$email','$password','$Mobile_No')");
mysqli_select_db($link,"login") or die("cannot connect at database");
mysqli_query($link,"INSERT INTO santhosh (email,password) VALUES ('$email',$password)");
Print '<script>alert("Registered Successfully");</script>';
header("location:index.html");
?>