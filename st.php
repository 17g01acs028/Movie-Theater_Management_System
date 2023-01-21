<?php
session_start();
//create session for payment
$_SESSION['id']='';
$_SESSION['seats']='';

//assign values to sessions
$array=explode(',',$_POST['data']);
$_SESSION['seats']=$array;
$_SESSION['id']=$_GET['id'];





// include("assets/db.php");
// $s_array=serialize($array);
// $save = $conn->query("Insert into seats(`uniqid`,`number`) values('2','$s_array') ");
// if($save){
// 	echo "saved";
// }else{
// 	echo $conn -> error;
// }

?>