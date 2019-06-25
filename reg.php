<?php
$username=$_POST['name'];
$emailid=$_POST['email'];
$password = $_POST['password'];
$clg=$_POST['clg'];
$c1=$_POST['c1'];
$c2=$_POST['c2'];
$c3=$_POST['c3'];
$c4=$_POST['c4'];
$c5=$_POST['c5'];





if (!empty($username) || !empty($emailid) || !empty($password) || !empty($c1)|| !empty($c2)|| !empty($c3)|| !empty($c4)|| !empty($c5))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ritctf";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
$sql="INSERT INTO `loginreg` (`username`, `emailid`, `password` ,`collegename`,`challenge1`,`challenge2`,`challenge3`,`challenge4`,`challenge5`) VALUES ('$username', '$emailid', '$password','$clg','$c1','$c2','$c3','$c4','$c5')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    header("Location:login.html");
}
elseif ($conn->query($sql)===FALSE) {
  # code...
   echo "Error: user name already exist" ;
   //$conn->close();
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}else{
  echo "all fields must be filled";
  $conn->close();
}
?>