<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	.hall_arrangement table{
		background:rgb(75,83,70);	
	}
	.hall_arrangement table tr th{
		color:white;
		text-align:center;
		font-size:20px;
	}
	.hall_arrangement table tr td{
		background:rgb(96,141,69);
		width:20px;
		height:20px;
		
	}
	.hall_arrangement .sel{
		background:rgb(94,42,76);
	}
	

</style>
<body>
<div class="hall_arrangement">	

	
	<?php  $rows=23;?>
	<table>
	<th colspan="<?php echo $rows;?>">Back</th>
	<tr>
<?php
include("assets/db.php");
$seats="";
$rows="";
$id=$_GET['id'];
$movie=mysqli_query($conn,"select * from schedule where Un_id = '$id'");
while($movie_img=mysqli_fetch_array($movie)){
 $mv_imgs=mysqli_query($conn,"select *,muid from movies where id=$movie_img[mid]");
 $mv_img=mysqli_fetch_array($mv_imgs);
 
 $mv_halls=mysqli_query($conn,"select * from hall where id=$movie_img[hallid]");
 $mv_hall=mysqli_fetch_array($mv_halls);

 $names=mysqli_query($conn,"select * from users where id=$_SESSION[user_id]");
 $name=mysqli_fetch_array($names);

 $uniqid=$movie_img['Un_id'];
 $rows=$mv_hall['columns'];
 $seats= $mv_hall['Seats'] ;
}


//tables type
$al_book=array();
$numbers=mysqli_query($conn,"select * from movie_info where uniqid='$uniqid'");
			  
			  
while($number=mysqli_fetch_array($numbers)){
  if(empty($number['seats'])){}else{

$n_array= unserialize($number['seats']);

$al_book=array_merge($al_book,$n_array);}

}


$count=$seats;
$i=0;
$k=0;
if(fmod($seats,$rows)>0){
	for($z=0;$z<fmod($seats,$rows);$z++){
		
		?>
		<td id="<?php echo $count;?>" onclick="sel(this)" class=""><p style="background:black;color:white;text-align:center;"><?php echo $count;?></p><img src="../icon/seats.png" alt="kk" height="20" width="20"></td>
	<?php $count--;}
}
$mod= fmod($seats,$rows);
 for($i;$i<($seats-$mod)/$rows;$i++){

?>
<tr>
<?php for($k=0;$k<$rows;$k++){?>
	
<td id="<?php echo $count;?>" onclick="sel(this)" class=""><p style="background:black;color:white;text-align:center;"><?php echo $count;?></p><img src="../icon/seats.png" alt="kk" height="20" width="20"></td>
<?php $count--;}?>
</tr>
<?php
 }
?>
<th colspan="<?php echo $rows;?>">Front</th>
</table>


</div>
</body>
<script>
 list=[];
	ids=<?php echo json_encode($al_book);?>;
	console.log(ids);
function disable(){
	ids.forEach(function(id){
	id=document.getElementById(id);
	if(id==null){
	}else{
   id.onclick=null; 
	id.classList.add('sel');}
	});
	
}
disable();
</script>
</html>
