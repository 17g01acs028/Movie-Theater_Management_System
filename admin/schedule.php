<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Schedule</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Schedule Movie</h2>
                 <a href="newschedule.php" class="btn">Add New</a>
             </div>
             <table style="width:100%;">
                 <tr>
                     <th>Schedule-no</th>
                     <th>Movie Name</th>
                     <th>Date IN</th>
                     <th>Date Out</th>
                     <th>Seats</th>
                     <th>Hall</th>
                     <th>Date added</th>
                     <th>Operations</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $schedules=mysqli_query($conn, "SELECT * FROM `schedule` where deleted!='1' order by dateadded");
                    while($schedule=mysqli_fetch_array($schedules)){
                        
                    ?>
                 <tr >
                 <td><?php echo $count;?></td>
                     <td>
                     <?php
                       $id=$schedule['mid'];
                       $movies=mysqli_query($conn, "select * from movies where id='$id'");
                       while($movie=mysqli_fetch_array($movies)){
                           echo $movie['mname'];
                       }
                     ?>

                     </td>
                     <td><?php echo $schedule['datetime'];?></td>
                     <td><?php echo $schedule['datetime_out'];?></td>
                     <td><?php echo $schedule['seats'];?></td>
                     <td >
                     <?php
                        $id=$schedule['hallid'];
                        $halls=mysqli_query($conn, "select * from hall where id='$id'");
                        while($hall=mysqli_fetch_array($halls)){
                            echo $hall['Name'];
                        }
                     ?>
                     </td>
                     <td><?php echo $schedule['dateadded'];?></td>
                     <td style="display:flex;"><a href="viewschedule.php?id=<?php echo $schedule['id'];?>" ><img src="icons/view.png" alt="" class="operation"></a><a href="editschedule.php?id=<?php echo $schedule['id'];?>" ><img src="icons/edit.png" alt="" class="operation"></a><a href="seats.php?id=<?php echo $schedule['Un_id'];?>" ><img src="icons/seat_2.png" alt="" class="operation"></a><form action="transaction.php" method="post" style="width:30px;"><button style="background:none; border:none;outline:none;width:20px; " name="delete_schedule" type="submit" ><input type="hidden" name="id" value="<?php echo $schedule['id'];?>"><img src="icons/trash.png" alt="" class="operation"></button></form></td>
                 </tr>
                 <?php $count++;}?>
                 
             </table>
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>