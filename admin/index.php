<?php include('components/body.php');?>
    <div class="content">
      <div class="cards">
          <div class="card">
              <div class="box">
                  <h2 style="display:block;"><?php 
                  $users=mysqli_query($conn,"select count(*) as count from users");
                  $user_count=mysqli_fetch_array($users);
                   echo $user_count['count'];

                  ?></h2>
                  <h3>Users</h3>
              </div>
              <div class="icon-case">
              <img src="icons/user3.png" alt="">
              </div>
          </div>
          <div class="card">
              <div class="box">
                  <h2>
                  <?php 
                  $movies=mysqli_query($conn,"select count(*) as count from movies");
                  $movie=mysqli_fetch_array($movies);
                   echo $movie['count'];

                  ?>
                  </h2>
                  <h3>Movies</h3>
              </div>
              <div class="icon-case">
              <img src="icons/movie2.png" alt="">
              </div>
          </div>
          <div class="card">
              <div class="box">
                  <h2>

                  <?php 
                  $movies=mysqli_query($conn,"select count(*) as count from schedule");
                  $movie=mysqli_fetch_array($movies);
                   echo $movie['count'];

                  ?>
                  </h2>
                  <h3>schedules</h3>
              </div>
              <div class="icon-case">
              <img src="icons/schedule_1.png" alt="">
              </div>
          </div>
          <div class="card">
              <div class="box">
                  <h2><?php 
                  $movies=mysqli_query($conn,"select count(*) as count from hall");
                  $movie=mysqli_fetch_array($movies);
                   echo $movie['count'];

                  ?></h2>
                  <h3>Halls</h3>
              </div>
              <div class="icon-case">
              <img src="icons/hall_1.png" alt="">
              </div>
          </div>
      </div>
      <div class="content-2">
        <div class="recent_rating">
             <div class="title">
                 <h2>Recent Booking</h2>
                 <a href="reports.php" class="btn">View All</a>
             </div>
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
                    $users=mysqli_query($conn, "SELECT * FROM `movie_info` ORDER BY `movie_info`.`dateadded` DESC limit 10");
                    while($user=mysqli_fetch_array($users)){
                        $id=$user['uniqid'];
                        $schedules=mysqli_query($conn, "SELECT * FROM schedule where Un_id='$id'");
                        $schedule=mysqli_fetch_array($schedules);

                        echo $user['uniqid '];

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
        </div>
        <div class="new_seg">
        <div class="title">
                 <h2>New Movies</h2>
                 <a href="movie.php" class="btn">View All</a>
             </div>
             <table>
                 <tr>
                     <th>Image</th>
                     <th>Name</th>
                     <th>operation</th>
                 </tr>
                
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "SELECT * FROM `movies` ORDER BY `movies`.`dateadded` DESC limit 6");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     
                     <td><div class="img"><img src="<?php echo $user['img']; ?>" width="35" height="35" style="border-radius:50%;"></div></td>
                     <td><?php echo $user['mname'];?></td>
                     <td><a href="viewmovie.php?id=<?php echo $user['id'];?>" class="btn">View</a></td>
                     </tr>
                 <?php $count++;}?>
                 
             </table>
        </div>
    </div>
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>