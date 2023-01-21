<?php 
include("../assets/db.php");
session_start();
	
$limit_number=$_POST['limit_number'];
$s_date=$_POST['s_date'];
$e_date=$_POST['e_date'];
$column_order=$_POST['column_order'];
$order_in=$_POST['order_in'];
$f_date=$_POST['f_date'];
$f_time1=$_POST['f_time1'];
$f_time2=$_POST['f_time2'];


$query="SELECT * FROM `movie_info`";
if(!empty($f_date) && !empty($f_time1) && !empty($f_time2)){
    $f_time_date=$f_date." ".$f_time1;
    $f_time2_date=$f_date." ".$f_time2;
    $query.=" where dateadded BETWEEN '$f_time_date' AND '$f_time2_date'";
}

if(!empty($e_date) && !empty($s_date)){
    $query.=" where DATE(dateadded) BETWEEN '$s_date' AND '$e_date'";
}


if(!empty($column_order)){
    $query.=  " ORDER BY `movie_info`.`$column_order` $order_in";
}

if(!empty($limit_number)){
    $query.=  " limit $limit_number";
}else{
    $query.= " limit 10"; 
}

$users=mysqli_query($conn, "$query");
?>
 <table style="width:100%;">
             <tr>
                     <th>Number</th>
                     <th>Movie</th>
                     <th>Person</th>
                     <th>Hall</th>
                     <th>Date</th>
                     
                 </tr>
                 <?php
                    $count =1;
                   
                    while($user=mysqli_fetch_array($users)){
                        $id=$user['uniqid'];
                        $schedules=mysqli_query($conn, "SELECT * FROM schedule where Un_id='$id'");
                        $schedule=mysqli_fetch_array($schedules);

                        

                        $userid=$user['userid'];
                        $persons=mysqli_query($conn, "SELECT * FROM users where id='$userid'");
                        $person=mysqli_fetch_array($persons);

                        $mid=$schedule['mid'];
                        $movies=mysqli_query($conn, "SELECT * FROM movies where id='$mid'");
                        $movie=mysqli_fetch_array($movies);

                        $hallid=$schedule['hallid'];
                        $halls=mysqli_query($conn, "SELECT * FROM hall where id='$hallid'");
                        $hall=mysqli_fetch_array($halls);
                    ?>
                 <tr >
                     <td><?php echo $count;?></td>
                     <td><?php echo $movie['mname']; ?></td>
                     <td><?php echo $person['username'];?></td>
                     <td><?php echo $hall['Name'];?></td>
                     <td><?php echo $user['dateadded']?></td>
                     </tr>
                 <?php $count++;}?>
                 
             </table>