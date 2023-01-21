<?php
include("../assets/db.php");
session_start();
$username=$_POST['name'];
  $email=$_POST['email'];
  $password=md5("1234");
  $address=$_POST['address'];
  $phone=$_POST['phone'];

  $username_error="";
  $email_error="";
  $address_error="";
  $phone_error="";
  $success="";

  if(empty($username)){
    $username_error = 'UserName Field is Empty'; 
  }

  if(empty($email)){
    $email_error = 'Email Field is Empty'; 
  }else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = 'Incorrect Email Format';   
    }
  }
  if(empty($address)){
    $address_error = 'Address should not be  Empty'; 
  }
  if(empty($phone)){
    $phone_error = 'Phone is Empty'; 
  }

  if($username_error=="" &&
  $email_error==""&&
  $address_error==""&&
  $phone_error==""){
    $save = $conn->query(" INSERT INTO `users`( `username`, `email`,`phone`,`address`, `type`, `password`) VALUES ('$username','$email','$phone','$address','1','$password')");

    if($save==TRUE){
        $success='<script>fadout();</script>';
    }else{
     $success= "";
    }
  }

  $output=array(
      'success' => $success,
      'name_error' => $username_error,
      'email'      => $email_error,
      'phone'      => $phone_error,
      'address'    => $address_error

  );
   echo json_encode($output);
   ?>