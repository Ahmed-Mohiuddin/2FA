<?php
$name=$_POST['name'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$phone=$_POST['phone'];
$imeinumber=$_POST['imei'];
if($name="")
echo "Please Enter Name";
elseif(!ctype_alpha($name))
echo "Invalid Name";
elseif ($password="") {
  echo "Password cannot be empty";
}
elseif($password!=$repassword)
echo "Password does not match";
elseif(!ctype_digit($phone))
echo "Not a valid phone number";
elseif (!ctype_digit($imeinumber) || strlen($imeinumber)!=15) {
  echo "Invalid IMEI number";
}
else
{
  $dbname="project";
  $hostname="localhost";
  $username="root";
  $pass="";

  $link=mysqli_connect($hostname,$username,$pass,$dbname);
  if(!$link)
    die('could not connect'.mysql_error());
    echo "connected";
    $query="INSERT INTO `final` (`Name`, `password`, `phone`, `imei`) VALUES ('$name','$password','$phone','$imeinumber')";
    if ($link->query($query) === TRUE) {
    echo "New record created successfully";
}
}
 ?>
