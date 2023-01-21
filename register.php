<?php
include 'assets/db.php';

if(isset($_POST['submit'])){
  $username=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $password=md5($_POST['password']);
  echo $username." ".$email." ".$password;
 
    $save = $conn->query(" INSERT INTO `users`( `username`, `email`, `type`, `password`,`address`, `phone`) VALUES ('$username','$email','1','$password','$address','$phone')");

    if($save==TRUE){
        header('location:login.php');
    }else{
     echo "Not Inserted";
    }



  
 
}else{
  $username=$_POST['name'];
  $email=$_POST['email'];
  $id=$_POST['id'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $save = $conn->query("UPDATE `users` SET `username`='$username',`email`='$email',`address`='$address', `phone`='$phone' where id='$id'");
  
    if($save==TRUE){
        header('location:index.php');
    }else{
     echo "Not Updated";
    }
}
$conn->close();
?>