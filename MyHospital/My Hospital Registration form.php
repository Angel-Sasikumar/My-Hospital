<?php
$uname      = $_POST['uname'];
$age        = $_POST['age'];
$gender     = $_POST['gender'];
$contact    = $_POST['contact'];
$email      = $_POST['email'];
$address    = $_POST['address'];
$pincode    = $_POST['pincode'];
$password1  = $_POST['password1']; 
$password2  = $_POST['password2'];


$conn = new mysqli('localhost','root','','hospital');
if($conn->connect_error)
{
    die('connection Failed: '.$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into hregister(uname,age,gender,contact,email,address,pincode,password1,password2) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisississ",$uname,$age,$gender,$contact,$email,$address,$pincode,$password1,$password2);
    $stmt->execute();
    header("location:http://localhost/MyHospital/My Hospital Login.html");
    $stmt->close();
    $conn->close();
}
?>