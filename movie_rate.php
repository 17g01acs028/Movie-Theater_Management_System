<?php
include('recoment.php');
include 'assets/db.php';

$movies=mysqli_query($conn, "select * from movie_info");
$matrix= array();
$recoment=array();;

while($movie=mysqli_fetch_array($movies)){
    $users=mysqli_query($conn,"select username from users where id=$movie[userid]");
    $username=mysqli_fetch_array($users);

    $users1=mysqli_query($conn,"select muid from movies where id=$movie[mid]");
    $username1=mysqli_fetch_array($users1);
    
   $matrix[$username['username']][$username1['muid']]=$movie['rating'];
//    $matrix[$username['username']][$movie['mid']]=$movie['rating'];
   
}
	

// echo "<pre>";
//  print_r($matrix);
// echo "</pre>";

$recoment=getRecomantation($matrix,"kk");
  
foreach($recoment as $key => $value){
    echo $key." ".$value."<br>"; 


}

?>