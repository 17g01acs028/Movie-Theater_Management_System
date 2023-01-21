<?php
include("../assets/db.php");
session_start();



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

 

 ?>