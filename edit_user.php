
<?php
include 'assets/db.php';
include('recoment.php');

session_start();
$id=$_SESSION['user_id'];
$users=mysqli_query($conn, "select * from users where id=$id");


while($user=mysqli_fetch_array($users)){
   
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>SignUp</h1>
        <form action="register.php" method="post" id="form1">
            <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']?>">
        <div class="error" id="error"><h4></h4></div>
            <div class="txt_field">
                <input type="text" id="name" name="name" value="<?php echo  $user['username']; ?>">
                <span></span>
                <label for="User_name" >UserName</label>
            </div>
            <div class="txt_field">
                <input type="text" id="email" name="email" value="<?php echo  $user['email'];?>">
                <span></span>
                <label for="User_name">Email</label>
            </div>
            
           
            <input type="submit"  value="Save changes">
              
            <br><br>
        </form>
        
        <script type="text/javascript">
          
        </script>
    </div>
</body>
</html>

<?php }?>