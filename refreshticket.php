<?php 
include 'assets/db.php';
session_start();
$date=$_POST['date'];
?>

<div id="schedule">
             <table style="width:100%;">
                 <tr style="background:black;border:none;color:white;padding:10px;height:50px">
                     
                     <th>Time</th>
                     <th>Movie</th>
                     <th>Hall</th>
                     <th>Seats</th>
                     <th>Action</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $id=$_SESSION['user_id'];
                    $date=$_POST['date'];
                    $users=mysqli_query($conn, "SELECT *,Time(dateadded) as date FROM `movie_info` where userid='$id' and DATE(dateadded) ='$date' ORDER BY `dateadded` Desc limit 10");
                    while($user=mysqli_fetch_array($users)){
                       
                      $schedules=mysqli_query($conn,"select * from schedule where Un_id='$user[uniqid]'");
                      $schedule=mysqli_fetch_array($schedules);
                      
                    ?>
                 <tr style="text-align:center;">
                     
                     <td><?php echo $user['date']; ?></td>
                     <td><?php 
                     $users1=mysqli_query($conn,"select * from movies where id=$schedule[mid]");
                     $username1=mysqli_fetch_array($users1);
                     echo $username1['mname'];
                     
                     ?></td>
                     <td><?php
                      $users1=mysqli_query($conn,"select * from hall where id=$schedule[hallid]");
                      $username1=mysqli_fetch_array($users1);
                      echo $username1['Name'];
                     ?></td>
                     <td><?php echo $schedule['seats'];?></td>

                     <td>
                     
                    <a href="" class="btn">Print</a>
          
                        </td>
                     </tr>
                 <?php $count++;}?>
                 
                 
             </table>
             </div> 