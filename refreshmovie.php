<?php 
include 'assets/db.php';
session_start();
$date=$_POST['date'];
?>


            <?php 
          if(isset($_SESSION['user_id'])){
              $r_counts=mysqli_query($conn, "select count(*) as count   from schedule where DATE(datetime)='$date' and seats!='0' limit 6");
              $r_count=mysqli_fetch_array($r_counts);
              $angle=0;
              $r_c=$r_count['count'];
              if($r_c>6){
                $r_c=6;
              }
              $diff=(360/$r_c);
              
              $movie=mysqli_query($conn,"select *,DATE(datetime) as date ,TIME(datetime) as time from schedule where DATE(datetime)='$date' and seats!='0' limit 6");
              
              
              while($movie_img=mysqli_fetch_array($movie)){
                $mv_imgs=mysqli_query($conn,"select *,muid from movies where id=$movie_img[mid]");
                $mv_img=mysqli_fetch_array($mv_imgs);
                
                $mv_halls=mysqli_query($conn,"select * from hall where id=$movie_img[hallid]");
                $mv_hall=mysqli_fetch_array($mv_halls);

            ?>
             
              <div class="carousel_card" style="<?php echo 'transform: rotateY('.($angle).'deg) translateZ(25rem)';?>">
                <img class="carousel_img" src="admin/<?php echo $mv_img['img'];?>" >
                <div class="wor" style="font-size:15px;position:absolute;bottom:10px;left:20px;">
                <H2 style="color:white;"><?php echo $mv_img['mname']; ?></H2>
                <p>Date: <?php echo $movie_img['date']; ?></p>
                <p>Time: <?php echo $movie_img['time']; ?></p>

                <p>Place: <?php echo $mv_hall['Name']; ?></p>
                <p>Remainng Seats: <?php echo $movie_img['seats']; ?></p>
                <?php if(isset($_SESSION['user_id'])){ ?>
                  <button class="main__btn play"  onClick="play('<?php echo  $mv_img['movie'];?>')" style="margin-right:10px;background:blue;" ><a>play</a> </button>
                <button class="main__btn" style="color:white; margin-top:10px; background:blue; "><a href="booking.php?id=<?php echo $movie_img['id']; ?>">Book</a></button>
                
                <?php }else{?>
                  <button class="main__btn play"  onClick="play('<?php echo  $mv_img['movie'];?>')" style="margin-right:10px;background:blue;" ><a>play</a> </button>
                 <button class="main__btn" style="color:white; margin-top:10px; background:blue; ">Login</button>
                
                  <?php }?> 
               
              </div>
                </div> 
          <?php
           $angle=$angle+$diff; }}else{
          ?>
          
          <?php 
          $r_counts=mysqli_query($conn, "select count(*) as count   from schedule where DATE(datetime)='$date' and seats!='0' limit 6");
              $r_count=mysqli_fetch_array($r_counts);
              $angle=0;
              $r_c=$r_count['count'];
              if($r_c>6){
                $r_c=6;
              }
              $diff=(360/$r_c);
              
              $movie=mysqli_query($conn,"select *,DATE(datetime) as date ,TIME(datetime) as time from `schedule` where DATE(datetime)='$date' and seats!='0' limit 6");
              
              
              while($movie_img=mysqli_fetch_array($movie)){
                $mv_imgs=mysqli_query($conn,"select *,muid from movies where id=$movie_img[mid]");
                $mv_img=mysqli_fetch_array($mv_imgs);
                
                $mv_halls=mysqli_query($conn,"select * from hall where id=$movie_img[hallid]");
                $mv_hall=mysqli_fetch_array($mv_halls);

            ?>
             
              <div class="carousel_card" style="<?php echo 'transform: rotateY('.($angle).'deg) translateZ(25rem)';?>">
                <img class="carousel_img" src="admin/<?php echo $mv_img['img'];?>" >
                <div class="wor" style="font-size:15px;position:absolute;bottom:10px;left:20px;">
                <H2 style="color:white;"><?php echo $mv_img['mname']; ?></H2>
                <p>Date: <?php echo $movie_img['date']; ?></p>
                <p>Time: <?php echo $movie_img['time']; ?></p>

                <p>Place: <?php echo $mv_hall['Name']; ?></p>
                <p>Remainng Seats: <?php echo $movie_img['seats']; ?></p>
                <?php if(isset($_SESSION['user_id'])){ ?>
                  <button class="main__btn play"  onClick="play('<?php echo  $mv_img['movie'];?>')" style="margin-right:10px;background:blue;" ><a>play</a> </button>
                <button class="main__btn" style="color:white; margin-top:10px; background:blue; "><a href="booking.php?id=<?php echo $movie_img['id']; ?>">Book</a></button>
                
                <?php }else{?>
                  <button class="main__btn play"  onClick="play('<?php echo  $mv_img['movie'];?>')" style="margin-right:10px;background:blue;" ><a>play</a> </button>
                 <button class="main__btn" style="color:white; margin-top:10px; background:blue; ">Login</button>
                
                  <?php }?>  
               
              </div>
                </div> 
          <?php
           $angle=$angle+$diff; }

               }?> 
                
              