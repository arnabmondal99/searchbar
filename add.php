<?php
$connect = mysqli_connect("localhost", "root", "", "testing");

$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$postalcode=$_POST['postalcode'];
$country=$_POST['country'];

$sql="insert into customer set name='$name',address='$address',city='$city',postalcode='$postalcode',country='$country'";

$result=mysqli_query($connect,$sql);
if($result){
     $data=["msg"=>"inserted successfully"];
     echo json_encode($data);
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




?>