<?php
include 'assets/db.php';
include('recoment.php');
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
if(isset($_SESSION['type']) && $_SESSION['type']==1) {
header('location:index.php');
			   }
               if(isset($_SESSION['type']) && $_SESSION['type']==0){
                header('location:admin/index.php');
			   }

              

$connect = new PDO("mysql:host=localhost;dbname=movies;charset=utf8mb4", "root", "");





$message = '';

// if(isset($_SESSION['user_id']))
// {
	
// 	header('location:index.php');
// }

if(isset($_POST['submit']))
{
	
	$query = "
		SELECT * FROM users
  		WHERE email = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			
			//echo '<label>in here '.$row["password"].' 
           //  '.$_POST["password"].'</label>';
			//echo '<script> alert("Before login");</script>';
			if(md5($_POST["password"]) == $row["password"])
			{
				
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['type'] = $row['type'];
				$secretKeys=mysqli_query($conn, "SELECT * FROM `settings` WHERE Name='secretKey'");
				$secretkey=mysqli_fetch_array($secretKeys);
				$_SESSION['secretKey'] = $secretkey['value'];

				$publishableKeys=mysqli_query($conn, "SELECT * FROM `settings` WHERE Name='publishableKey'");
				$publishableKey=mysqli_fetch_array($publishableKeys);
				$_SESSION['publishableKey'] = $publishableKey['value'];

               if($row["type"]==1){
				header('location:index.php');
			   }else{
                header('location:admin/index.php');
			   }
			}
			else
			{
                $message = '<label>Wrong Password</labe>';
                echo "<script> alert('Wrong Password');</script>";
			
			}
		}
	}
	else
	{
		
		
		
		
		$message = '<label>Wrong Username</labe>';

        echo "<script> alert('Incorect UserName');</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>login</h1>
        <form action="" method="post" id="form">
            <div class="error" id="error"><h4><?php echo $message;?></h4></div>
            <div class="txt_field">
                <input type="text" id="name" name="username">
                <span></span>
                <label for="User_name">UserName</label>
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password">
                <span></span>
                <label for="User_name">Password</label>
            </div>
            <div class="pass">Forgotten Password</div>
            <input type="submit" value="Login" name="submit">
            <div class="signup_link">
                Not a Member? <a href="signup.php">SignUp</a>
            </div>    
            
        </form>
    </div>
    <script src="validate.js"></script>
</body>
</html>