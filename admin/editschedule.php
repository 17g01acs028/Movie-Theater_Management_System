<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Edit Schedule</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Edit Schedule</h2>
                 <a href="schedule.php" class="btn">Back</a>
             </div>
             <div class="container_form">
             <?php
                    $count =1;
                    $id=$_GET['id'];
                    $schedules=mysqli_query($conn, "SELECT *,DATE(`datetime`) as date, TIME(`datetime`) as time,DATE(`datetime_out`) as date1, TIME(`datetime_out`) as time1  FROM `schedule` where id=' $id' order by dateadded");
                    while($schedule=mysqli_fetch_array($schedules)){
                        
                    ?>
             <form action="transaction.php" method="post">
               <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
               <div class="row">
               
                 <div class="col">
                   
                   <div class="input-box">
                     <span>Select Movie</span>
                     <select name="movie1" id="">
                     <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from movies");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                    <option value="<?php echo $user['id'];?>" <?php $id2=$schedule['mid']; $id=$user['id']; echo ($id2==$id) ? 'Selected' : ''?>><?php echo $user['mname'];?></option>
                     <?php $count++;}?>
                       
                     </select>
                   </div>
                   <div class="input-box">
                     <span>Enter Date</span>
                     <input type="date" placeholder="dd-mm-yyyy" name="date" value="<?php echo $schedule['date']?>">
                   </div>
                   <div class="input-box">
                     <span>Enter Date out</span>
                     <input type="date" placeholder="dd-mm-yyyy" name="date1" value="<?php echo $schedule['date1']?>">
                   </div>
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Select Hall</span>
                     <select name="hall" id="">
                     <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from hall");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                    <option value="<?php echo $user['id']; ?>" <?php $id2=$schedule['hallid']; $id=$user['id']; echo ($id2==$id) ? 'Selected' : ''?>><?php echo $user['Name'];?></option>
                     <?php $count++;}?>
                       
                     </select>
                   </div>
                 <div class="input-box">
                     <span>Enter Time</span>
                     <input type="time" placeholder="00:00:00" name="time" value="<?php echo $schedule['time']?>">
                   </div>
                   <div class="input-box">
                     <span>Enter Time out</span>
                     <input type="time" placeholder="00:00:00" name="time1" value="<?php echo $schedule['time1']?>">
                   </div>
                   
                 </div>
                 
                </div>
               
                
                <input type="submit" value="Save" class="submit-btn" name="update_schedule">
                 </form>
                 <?php }?>
               </div>
             
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>