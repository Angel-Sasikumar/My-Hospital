<?php
$uname          = $_POST['uname'];
$age            = $_POST['age'];
$gender         = $_POST['gender'];
$contact        = $_POST['contact']; 
$email          = $_POST['email'];
$gcontact       = $_POST['gcontact'];
$problem        = $_POST['problem'];
$consultant     = $_POST['consultant'];
$slot           = $_POST['slot'];
$type           = $_POST['type'];

$conn = new mysqli('localhost','root','','hospital');
if($conn->connect_error)
{
    die('connection Failed: '.$conn->connect_error);
}

else
{
    $stmt = $conn->prepare("insert into hbook(uname,age,gender,contact,email,gcontact,problem,consultant,slot,type) values(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisisissss",$uname,$age,$gender,$contact,$email,$gcontact,$problem,$consultant,$slot,$type);
    $stmt->execute();
    header("location:http://localhost/MyHospital/Bsuccess.html");
    $stmt->close();
    $conn->close();
}
?>