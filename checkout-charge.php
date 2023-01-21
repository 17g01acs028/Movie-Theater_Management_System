<?php
include 'assets/db.php';
session_start();

    include("./config.php");
    $un_id=$_POST['save_id'];
    $userid=$_SESSION['user_id'];
    $serial=substr(sha1(mt_rand()),17,6);
    $token = $_POST["stripeToken"];
    $contact_name = "steve";
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = $_POST["phone"];
    $email           =  $_POST['email'];
    $ticket_1=$_SESSION['seats'];
    $s_array=serialize($ticket_1);
    $number=$_POST['ticket'];
    $amount          = $_POST['price']*$_POST['ticket']; 
    $desc            = $_POST["phone"];

    
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'kes',
      "description"=> $serial,
      "source"=> $token,
    ]);

    if($charge){
        echo $s_array;
         $save = $conn->query("INSERT INTO `movie_info`( `uniqid`, `userid`, `payment_status`,`serial`,seats) VALUES ('$un_id','$userid','$number','$serial','$s_array')");
        // $conn->query("update `schedule` set seats =seats-$seat where Un_id='$un_id'");
          if($save==TRUE){
            $_SESSION['id']='';
            $_SESSION['seats']='';
              header('location:myticket.php');
          }else{
           echo "Not Inserted";
          }
        }
?>