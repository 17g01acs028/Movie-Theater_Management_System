<?php
include 'assets/db.php';
session_start();
  $id=$_SESSION['user_id'];
  $users=mysqli_query($conn,"select * from users where id='$id'");
  $userpass=mysqli_fetch_array($users);
  $db_pass=$userpass['password'];
  $old_pass=md5($_POST['old_pass']);
  $new_pass=md5($_POST['new_pass']);
  $c_pass=md5($_POST['c_pass']);
  $error="";
  $sucess="";

  if(empty($_POST['old_pass']) || $old_pass===""){
  $error.="Please enter old password<br>";
  }
  if(empty($_POST['c_pass']) || $_POST['c_pass']===""){
    $error.="Please enter confirm password<br>";
  }
  if(empty($_POST['new_pass']) || $_POST['new_pass']===""){
    $error.="Please enter New password<br>";
  }
  if($new_pass != $c_pass){
    $error.="New password and confirm password do not match<br>";
  }
 
  if($db_pass===$old_pass){
 
  if($error==""){
  $save = $conn->query("UPDATE `users` SET `password`='$new_pass' where id='$id'");
  
    if($save==TRUE){
      $sucess="success";
        
    }else{
     $error.="Data not inserted";
    }}
  }else{
    $error.="Incorect old password";
  }

  
  $output=array(
    'success' => $sucess,
    'error' => $error
   

);
echo json_encode($output);
$conn->close();
?>