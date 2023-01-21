<?php
include("../assets/db.php");
session_start();
if(isset($_POST['save_user'])){
  $username=$_POST['name'];
  $email=$_POST['email'];
  $password=md5("1234");
  $address=$_POST['address'];
  $phone=$_POST['phone'];

  $username_error="";
  $email_error="";
  $address_error="";
  $phone_error="";
  $sql_error="";
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
     $sql_error=$conn-> error;
    }
  }

  $output=array(
       'sql_error' =>$sql_error,
      'success' => $success,
      'name_error' => $username_error,
      'email'      => $email_error,
      'phone'      => $phone_error,
      'address'    => $address_error

  );
   echo json_encode($output);
}
if(isset($_POST['save_settings'])){
  $name=$_POST['name'];
  $value=$_POST['value'];
  

  
  $error="";
  $sql_error="";
  $success="";

  
  if(empty($name)){
    $error .= 'Please enter settings Name<br>'; 
  }
  if(empty($value)){
    $error .= 'Please Enter value<br>'; 
  }

  if($error=="" ){
    $save = $conn->query(" INSERT INTO `settings`( `name`, `value`) VALUES ('$name','$value')");

    if($save==TRUE){
        $success='<script>fadout();</script>';
    }else{
     $success= "";
     $sql_error=$conn-> error;
    }
  }

  $output=array(
       'sql_error' =>$sql_error,
      'success' => $success,
      'error' => $error

  );
   echo json_encode($output);
}
if(isset($_POST['update_settings'])){
  $name=$_POST['name'];
  $value=$_POST['value'];
  $id=$_POST['id'];

  
  $error="";
  $sql_error="";
  $success="";

  
  if(empty($name)){
    $error .= 'Please enter settings Name<br>'; 
  }
  if(empty($value)){
    $error .= 'Please Enter value<br>'; 
  }

  if($error=="" ){
    $save = $conn->query("UPDATE `settings` set `name`='$name', `value`='$value' where id='$id'");

    if($save==TRUE){
        $success='<script>fadout();</script>';
    }else{
     $success= "";
     $sql_error=$conn-> error;
    }
  }

  $output=array(
       'sql_error' =>$sql_error,
      'success' => $success,
      'error' => $error

  );
   echo json_encode($output);
}
if(isset($_POST['save_schedule'])){
    $movie1=$_POST['movie1'];
    $price=$_POST['price'];
    $date=$_POST['date']." ".$_POST['time'];
    $dateout=$_POST['date1']." ".$_POST['time1'];
    $hall=$_POST['hall'];
    $code=substr(sha1(mt_rand()),17,6);
    $seats="";

    $error="";
    $sql_error="";
    $success="";

    if(empty($price)){
      $error.="Please Enter Price";
    }
    if(empty($date)){
      $error="Please Enter both start date and time";
    }
    if(empty($dateout)){
      $error="Please Enter both  date out and time out";
    }
    
    if($error==""){


    $id=$hall;
    
                       $movies=mysqli_query($conn, "select * from hall where id='$id'");
                       while($movie=mysqli_fetch_array($movies)){
                        $seats= $movie['Seats'];
                       }
    
     $save = $conn->query(" INSERT INTO `schedule`(`mid`, `Un_id`, `datetime`, `datetime_out`, `seats`, `hallid`,price) VALUES 
     ('$movie1','$code','$date','$dateout','$seats','$hall','$price')");
  
      if($save==TRUE){
         $success="success";
      }else{
       $sql_error=$conn-> error;
      }}
      $output=array(
        'sql_error' =>$sql_error,
       'success' => $success,
       'error' => $error
 
   );
    echo json_encode($output);
  }
  if(isset($_POST['update_hall'])){
    $name=$_POST['name'];
    $seat=$_POST['seat'];
    $col=$_POST['col'];
    $id=$_POST['id'];
    $error="";
    $success="";
    $sql_error="";

    if(empty($name)){
    $error.="Hall name Field Cannot be empty<br>";
    }
    if(empty($seat)){
      $error.="Seats Field Cannot be empty<br>";
    }else{
    if(!is_numeric($seat)){
      $error.="Seats Field Allows Integer Only<br>";
    }}

    if(empty($col)){
      $error.="columns Field Cannot be empty<br>";
    }else{
    if(!is_numeric($col)){
      $error.="Columns Field Allows Integer Only<br>";
    }}
    if($error==""){
      $save = $conn->query(" update `hall` set `Name`='$name', `Seats`='$seat',columns='$col' where id='$id'");
  
      if($save==TRUE){
          $success="suceeded";
      }else{
       $sql_error= $conn.error;
      }}
      $output=array(
        'sql_error' =>$sql_error,
       'success' => $success,
       'error' => $error
 
   );
    echo json_encode($output);


  }
if(isset($_POST['save_hall'])){
    $name=$_POST['name'];
    $seat=$_POST['seat'];
    $col=$_POST['col'];
    $error="";
    $success="";
    $sql_error="";

    if(empty($name)){
    $error.="Hall name Field Cannot be empty<br>";
    }
    if(empty($seat)){
      $error.="Seats Field Cannot be empty<br>";
    }else{
    if(!is_numeric($seat)){
      $error.="Seats Field Allows Integer Only<br>";
    }}

    if(empty($col)){
      $error.="columns Field Cannot be empty<br>";
    }else{
    if(!is_numeric($col)){
      $error.="Columns Field Allows Integer Only<br>";
    }}
    if($error==""){
      $save = $conn->query(" INSERT INTO `hall`( `Name`, `Seats`,`columns`) VALUES ('$name','$seat','$col')");
  
      if($save==TRUE){
          $success="suceeded";
      }else{
       $sql_error= $conn.error;
      }}
      $output=array(
        'sql_error' =>$sql_error,
       'success' => $success,
       'error' => $error
 
   );
    echo json_encode($output);


  }
if(isset($_POST['edit_user'])){
  
  $id=$_POST['id'];
   
  $username=$_POST['name'];
  $email=$_POST['email'];
  $password=md5("1234");
  $address=$_POST['address'];
  $phone=$_POST['phone'];

  $username_error="";
  $email_error="";
  $address_error="";
  $phone_error="";
  $sql_error="";
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
    $save = $conn->query(" update `users` set `username`='$username', `address`='$address',`phone`='$phone',`email`='$email' where id='$id'");

    if($save==TRUE){
        $success='<script>fadout();</script>';
    }else{
     $success= "";
     $sql_error=$conn-> error;
    }
  }

  $output=array(
       'sql_error' =>$sql_error,
      'success' => $success,
      'name_error' => $username_error,
      'email'      => $email_error,
      'phone'      => $phone_error,
      'address'    => $address_error

  );
   echo json_encode($output);
    

   

}

if(isset($_POST['delete_user'])){
    
    $id=$_POST['id'];;
    echo $id;
      $save = $conn->query(" delete from `users` where id='$id'");
  
      if($save==TRUE){
          header('location:users.php');
      }else{
       echo "Not Inserted";
      }
}
if(isset($_POST['save_movie'])){

        $movie_name=$_POST['name'];
        $movie_description=$_POST['description'];
        $movie_director=$_POST['director'];
        $pic="";
        $video="";
        
        // error declare
        $error="";
        $success="";
        $sql_error="";
       

        //validate fields
    if(empty($movie_name)){
    $error.="Please Enter Moviename<br>";
    }
    if(empty($movie_description)){
    $error.="Please Enter Movie description<br>";

    }
    if(empty($movie_director)){
      $error.="Please Enter Director's Name<br>";
    }

      //Validate Video and Image Selection
    if(isset($_FILES['video'])){
		$file_name = $_FILES['video']['name'];
		$file_temp = $_FILES['video']['tmp_name'];
		$file_size = $_FILES['video']['size'];
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$location = 'videos/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location)){
					
                    $video=$location;
                    
				}
			}else{
				$error.="Wrong video format<br>";
			}
		}else{
			$error.="Video is too large to be uploaded!!!<br>";
		}
      }else{
        $error.="Please Select video<br>";
      }
      if(isset($_FILES['pic'])){
        $file_name = $_FILES['pic']['name'];
		$file_temp = $_FILES['pic']['tmp_name'];
		$file_size = $_FILES['pic']['size'];
        
        if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('gif', 'png', 'jpg', 'jpeg');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$location = 'images/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location)){
					
                    $pic=$location;
                    
					
				}
			}else{
				$error.="Incorrect Image format<br>";
			}
		}else{
		
			$error.="File too large to be Uploaded<br>";
		}

      }else{
        $error.="Please Select Image<br>";
      }

     if($error!=""){

     }else{
     $code=substr(sha1(mt_rand()),17,6);
     $result=  mysqli_query($conn, "INSERT INTO `movies`( `muid`, `mname`, `director`, `description`, `img`, `movie`) VALUES('$code', '$movie_name', '$movie_director','$movie_description','$pic ','$video')") or die(mysqli_error());
	   if($result){
      $success="succeeded";

     }else{
      $success= "";
      $sql_error=$conn-> error;
     }
    }

    $output=array(
     'sql_error' =>$sql_error,
     'success' => $success,
     'error' => $error
    

 );
  echo json_encode($output);

  }
  if(isset($_POST['edit_movie'])){
      $username=$_POST['name'];
      $email=$_POST['email'];
      $id=$_POST['id'];;
        $save = $conn->query(" update `users` set `username`='$username', `email`='$email' where id='$id'");
    
        if($save==TRUE){
            header('location:users.php');
        }else{
         echo "Not Inserted";
        }
  
  }
  if(isset($_POST['update_schedule'])){
    $idp=$_POST['id'];
    $movie1=$_POST['movie1'];
    $date=$_POST['date']." ".$_POST['time'];
    $dateout=$_POST['date1']." ".$_POST['time1'];
    $hall=$_POST['hall'];
    $code=substr(sha1(mt_rand()),17,6);
    $seats="";

    $id=$hall;
    
                       $movies=mysqli_query($conn, "select * from hall where id='$id'");
                       while($movie=mysqli_fetch_array($movies)){
                        $seats= $movie['Seats'];
                       }
                     //  echo "update `schedule` set `mid`='$movie1', `datetime`='$date',datetime_out=`$dateout`,seats=`$seats`,hallid=`$hall` where id='$idp'";
      $save = $conn->query(" update `schedule` set `mid`='$movie1', `datetime`='$date',datetime_out='$dateout',seats='$seats',hallid='$hall' where id='$idp'");
      
      if($save==TRUE){
          header('location:schedule.php');
      }else{
       echo "Not Inserted";
      }

}
  
  if(isset($_POST['delete_movie'])){
      
      $id=$_POST['id'];;
      echo $id;
        $save = $conn->query(" update  `movies` set deleted='1'  where id='$id'");
        if($save==TRUE ){
            header('location:movie.php');
        }else{
         echo "Not Inserted";
        }
  }
  if(isset($_POST['delete_schedule'])){
      
    $id=$_POST['id'];;
    echo $id;
      $save = $conn->query(" update `schedule` set deleted='1' where id='$id'");
      
      if($save==TRUE ){
          header('location:schedule.php');
      }else{
       echo "Not Inserted";
      }
}
if(isset($_POST['delete_hall'])){
      
    $id=$_POST['id'];;
    echo $id;
      $save = $conn->query(" update `hall` set deleted='1' where id='$id'");
      
      if($save==TRUE ){
          header('location:Hall.php');
      }else{
       echo "Not Inserted";
      }
}
if(isset($_POST['delete_settings'])){
  $success="";
  $sql_error="";    
  $id=$_POST['id'];
 
    $save = $conn->query(" delete from settings where id='$id'");
    
    if($save==TRUE){
      $success='<script>fadout();</script>';
  }else{
   $success= "";
   $sql_error=$conn-> error;
  }
  $output=array(
    'sql_error' =>$sql_error,
   'success' => $success,
   'id' => $id

);
echo json_encode($output);

}


  
?>
