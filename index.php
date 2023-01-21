<?php
include 'assets/db.php';
include('recoment.php');

session_start();

                 if(isset($_SESSION['type']) && $_SESSION['type']==0){
                  header('location:admin/index.php');
           }

function trancate($text, $max=50, $append='...'){

  if(strlen($text)<=$max) return $text;
  $return =substr($text, 0, $max);
  if(strpos($text,' ')===false) return $return . $append;
  return preg_replace('/\W+$/', '',$return).$append;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movies Arena</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="admin/styles.css" />
    <link rel="stylesheet" href="slider.css" />
    <link rel="stylesheet" href="button.css" />
    <link rel="stylesheet" href="3d.css" />
    <link rel="stylesheet" href="user-profile.css" />
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="alert.css">

    <style>
      .modal .modal-content.post input:-webkit-autofill,
.modal .modal-content.post input:-webkit-autofill:hover
.modal .modal-content.post input:-webkit-autofill:focus
.modal .modal-content.post input:-webkit-autofill:active{
transition: background-color 5000s ease-in-out 0s;
-webkit-text-fill-color:slategrey;
}
.modal .modal-content .post input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    color: slategrey;
    border:none;
    background: none;
    outline: none;

}
.modal .modal-content .post label{
    position: absolute;
    top: 50%;
    left:5px;
    color:#adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
}

.modal .modal-content.post label{
    top:-5px;
    color:#2691d9; 
}
.diver{
  width:30px;
  background:red;
}
    </style>
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="#home" id="navbar__logo">Movie Arena</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="#home" class="navbar__links" id="home-page">Home</a>
          </li>
          <li class="navbar__item">
            <a href="#about" class="navbar__links" id="about-page">Movies</a>
          </li>
          
          
          <li class="navbar__item">
            <a href="#services" class="navbar__links" id="services-page"
              >Services</a
            >
          </li>
          <li class="navbar__btn">
            <?php if(!isset($_SESSION['user_id'])){ ?>
            <div class="center">
              <div class="outer button">
                  <button><a href="signup.php"  >Sign Up</a></button>
                  <span></span>
                  <span></span>
              </div>
              
          </div>
          
  
            
            <div class="center">
              <div class="outer button">
                  <button><a href="login.php"  >Login</a></button>
                  <span></span>
                  <span></span>
              </div>
              
          </div>
         <?php }else{?>
          <div class="nav">
       <div class="drop-btn" >
           <div class="p_cont">
           <div class="picon"><img src="icon/user_40.png" /></div>
           <small style="width:100px;font-size:12px;"><?php echo $_SESSION['username'];?></small> 
            <span id="drop"><img src="icon/down1.png" ></span>
           </div>
    
          
       </div>
       <div class="wrapper">
           <ul class="menu-bar" >
               <li>
                   <a href="#">
                       <div class="icon"><span><img src="icon/home.png" ></span></div>
                       Home
                   </a>
               </li>
               <li>
                   <a id="settings">
                       <div class="icon"><span><img src="icon/settings.png" ></span></div>
                       Settings <i ><img src="icon/right.png" ></i>
                   </a>
               </li>
               
               <li>
                   <a id="about_btn">
                       <div class="icon"><span><img src="icon/about.png" ></span></div>
                       About Us
                   </a>
               </li>
               <li>
                   <a id="cont_btn">
                       <div class="icon"><span><img src="icon/contact.png" ></span></div>
                       Contacts
                   </a>
               </li>
           </ul>
           <!-- setting & privacy -->
           <ul class="setting-drop" >
               <li class="arrow help_hide" ><img src="icon/back.png" > <span class="span"> Settings & Privacy</span></li>
               <li>
                   <a id="per_btn">
                       <div class="icon"><span><img src="icon/person.png" ></span></div>
                       personal information
                   </a>
               </li>
               <li>
                   <a id="pass_btn">
                       <div class="icon"><span><img src="icon/lock.png" ></span></div>
                       password 
                   </a>
               </li>
               <li>
                   <a href="myticket.php">
                       <div class="icon"><span><img src="icon/lock.png" ></span></div>
                       My Tickets
                   </a>
               </li>
               
               <li>
                   <a id="edit_btn">
                       <div class="icon"><span><img src="icon/edit.png" ></span></div>
                       Edit User Profile
                   </a>
               </li>
               <li>
                   <a href="logout.php">
                       <div class="icon"><span><img src="icon/logout.png" ></span></div>
                       logout 
                   </a>
               </li>
           </ul>

            
       </div>
</div>
<?php }?>
        </li>
        </ul>
      </div>
      <div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Data Inserted To the Database</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
      <div class="hero__container">
        <div class="slideshow-container">
         
          <?php
          
          $movies=mysqli_query($conn, "select * from movies where deleted!=1");
          while($movie=mysqli_fetch_array($movies)){
            
          ?>
          <div class="myslides fade">
              
              <img class="img" src="admin/<?php echo $movie['img'];?>" width="100%">
              
              <div class="text"> <h1 class="hero__heading">Watch <span><?php echo $movie['mname'];?></span></h1>
              <div class="button_play" style="display:flex;">
                <?php if(isset($_SESSION['user_id'])){ ?>
                  <button class="main__btn play"  onClick="play('<?php echo $movie['movie'];?>')" style="margin-right:10px;" ><a>play</a> </button>
                </div>
                
                <?php }else{?>
                  <button class="main__btn play"  onClick="play('<?php echo $movie['movie'];?>')" style="margin-right:10px;" ><a>play</a> </button>
                  <button class="main__btn" ><a href="login.php"  >Login</a></button>
                  </div>
                  <?php }?> 
                  
              <p  style=""><?php echo trancate($movie['description'],250);?></p>
               
                </div>
                  
              </div>

         
          <?php
          }
          ?>
          
          <a onclick="plusSlides(-1)" class="prev">&#10094</a>
          <a onclick="plusSlides(1)" class="next">&#10095</a>
          <div class="sliding"></div>
      </div>
      
      
       
      </div>
      
    </div>
    
    <!-- About Section -->
    <div class="main" id="about">
    <h1>Movie Schedule</h1>
      <div class="main__container">
        <div class="main__img--container">
          <div class="main__img--card">
            <div class="carousel" >

            <div class="carousel_cards" id="replace_images">

           
            <?php 
          if(isset($_SESSION['user_id'])){
              $r_counts=mysqli_query($conn, "select count(*) as count   from schedule where (DATE(datetime) >= DATE(now())  ) and seats!='0' limit 6");
              $r_count=mysqli_fetch_array($r_counts);
              $angle=0;
              $r_c=$r_count['count'];
              if($r_c>6){
                $r_c=6;
              }
              if($r_c==0){
                $r_c=1;
              }
              $diff=(360/$r_c);
              
              $movie=mysqli_query($conn,"select *,DATE(datetime) as date ,TIME(datetime) as time from schedule where (DATE(datetime) >= DATE(now())  ) and seats!='0' limit 6");
              
              
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
          $r_counts=mysqli_query($conn, "select count(*) as count   from schedule where (DATE(datetime) >= DATE(now())  ) and seats!='0' limit 6");
              $r_count=mysqli_fetch_array($r_counts);
              $angle=0;
              $r_c=$r_count['count'];
              if($r_c>6){
                $r_c=6;
              }
              if($r_c==0){
                $r_c=1;
              }
              $diff=(360/$r_c);
              
              $movie=mysqli_query($conn,"select *,DATE(datetime) as date ,TIME(datetime) as time from schedule where (DATE(datetime) >= DATE(now())  ) and seats!='0'  limit 6");
              
              
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
                
            </div>

            <div class="carousel_control" style="width:100%;margin-top:20px;display:flex;">
                    <div class="center" style="bottom:0;position:absolute;z-index:999;">
              <div class="outer circle">
              <button class="back d_but">&#10094</button>
                  <span></span>
                  <span></span>
              </div>
              </div>
              <div class="center" style="right:0;bottom:0;position:absolute;">
              <div class="outer circle">     
                    <button class="Next d_but">&#10095</button>
                    <span></span>
                  <span></span>
              </div>
              </div>      
            </div> 
        </div>
        </div>
        </div> 

        <div class="main__content">
          
           <div class="content-2" style="background:black;border:1px solid white;">
        <div class="recent_rating">
             <div class="title">
                 <h2 style="font-size:20px;">Schedule</h2>
                 <div class="input-box">
            
                 <select name="" id="schedule_select" style="width:200px;color:black;padding:5px 40px;font-size:15px;">
                <option value="">Select Date</option>
                <?php
                    $count =1;
                    $users=mysqli_query($conn, "SELECT *,DATE(datetime) as date FROM `schedule` where (DATE(datetime) >= DATE(now())  ) and seats!='0' group by DATE(datetime) ORDER BY `datetime` DESC limit 10");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                   <option value="<?php echo $user['date'] ?>"><?php echo $user['date'] ?></option>
                   <?php }?>
                 </select>
                    </div>
                 
             </div>
             <div id="schedule">
             <table style="width:100%;border: 1px solid white;">
                 <tr>
                     
                     <th>Time</th>
                     <th>Movie</th>
                     <th>Hall</th>
                     <th>Seats</th>
                     <th>Action</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "SELECT *,Time(datetime) as date FROM `schedule` where DATE(datetime) >= DATE(now()) and seats!='0' ORDER BY `datetime` ASC limit 10");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     
                     <td><?php echo $user['date']; ?></td>
                     <td><?php 
                     $users1=mysqli_query($conn,"select * from movies where id=$user[mid]");
                     $username1=mysqli_fetch_array($users1);
                     echo $username1['mname'];
                     
                     ?></td>
                     <td><?php
                      $users1=mysqli_query($conn,"select * from hall where id=$user[hallid]");
                      $username1=mysqli_fetch_array($users1);
                      echo $username1['Name'];
                     ?></td>
                     <td><?php echo $user['seats'];?></td>

                     <td>
                     <?php if(isset($_SESSION['user_id'])){ ?>
                        <button class="main__btn" style="color:white; margin-top:10px; background:blue; "><a href="booking.php?id=<?php echo $user['id']; ?>">Book</a></button>
                <?php }else{?>
                    <a href="login.php" class="btn">login</a>
                  <?php }?> 
                        
                        
                        </td>
                     </tr>
                 <?php $count++;}?>
                 
                 
             </table>
             </div> 
        </div>
        
    </div>
        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="services" id="services">
      <h1>Our Services</h1>
      <div class="services__wrapper">
        <div class="services__card">
          <h2>Movie Predictions</h2>
          <p>AI Powered technology that Predicts Movies for our Users.</p>
          <div class="services__btn"><button>Check Out</button></div>
        </div>
        <div class="services__card">
          <h2>User Movies Rating</h2>
          <p>Our system allows users to rate movies so it can reccoment them to others.</p>
          <div class="services__btn"><button>check Out</button></div>
        </div>
        <div class="services__card">
          <h2>Online 24/7 support Team</h2>
          <p>Our support team are online to Help you use Our website</p>
          <div class="services__btn"><button>Check Out</button></div>
        </div>
        <div class="services__card">
          <h2>Movies</h2>
          <p>Our system gives you Movie List for you to choose.</p>
          <div class="services__btn"><button>check out</button></div>
        </div>
      </div>
    </div>

    

    <!-- Footer Section -->
    <div class="footer__container">
      <div class="footer__links">
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <h2>About Us</h2>
            <a href="/sign__up">How it works</a> <a href="/">Testimonials</a>
             <a href="/">Terms of Service</a>
          </div>
          <div class="footer__link--items">
            <h2>Contact Us</h2>
            <a href="/">Contact</a> <a href="/">Support</a>
            
          </div>
        </div>
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <h2>Videos</h2>
            <a href="/">Submit Video</a> 
          </div>
          <div class="footer__link--items">
            <h2>Social Media</h2>
            <a href="/">Instagram</a> <a href="/">Facebook</a>
            <a href="/">Youtube</a> <a href="/">Twitter</a>
          </div>
        </div>
      </div>
      <section class="social__media">
        <div class="social__media--wrap">
          <div class="footer__logo">
            <a href="/" id="footer__logo">Movies Arena</a>
          </div>
          <p class="website__rights">© Movies Arena 2022. All rights reserved</p>
          <div class="social__icons">
            <a href="/" class="social__icon--link" target="_blank"
              ><img src="icon/facebook.png" alt=""><i class="fab fa-facebook"></i
            ></a>
            <a href="/" class="social__icon--link"
              ><img src="icon/insta.png" alt="">
            </a>
            <a href="/" class="social__icon--link"
              ><img src="icon/youtube.png" alt=""><i class="fab fa-youtube"></i
            ></a>
            <a href="/" class="social__icon--link"
              ><img src="icon/linkedin.png" alt=""><i class="fab fa-linkedin"></i
            ></a>
            <a href="/" class="social__icon--link"
              ><img src="icon/twiter.png" alt=""><i class="fab fa-twitter"></i
            ></a>
          </div>
        </div>
      </section>
    </div>
   

<!-- Video player information modal -->
<div id="modal" class="modal">
<div class="modal-content">
  <span class="close" id="close_modal1">&times;</span>
  <h1 >Video Clip</h1>
  <video width="100%" height="250" controls>
  
				</video>

</div>

</div>
<!-- Video player information modal end -->
<!-- person information modal -->
<div id="per_infor" class="modal">
<div class="modal-content">
  <span class="close" id="close_per">&times;</span>
  <h1 >User Information</h1>
  <form action="register.php" method="post" id="form">
  <?php
                    $id=$_SESSION['user_id'];
                    $users=mysqli_query($conn, "SELECT * FROM `users` where id='$id' limit 1");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
          <div class="error" id="error"><h4></h4></div>
             <input type="hidden" name="id" value="<?php echo $user['id']?>" readonly>
            <div class="txt_field" style="">
                <input type="text" id="name" name="name" value="<?php echo "UserName: ".$user['username']?>" readonly>
                <span></span>
                
            </div>
            <div class="txt_field">
                <input type="text" id="email" name="email" value="<?php echo "Email: ".$user['email']?>" readonly>
                <span></span>
                
            </div>
            
            <div class="txt_field" style="">
                <input type="text" id="Phone" name="phone" value="<?php echo "Phone: ".$user['phone']?>" readonly>
                <span></span>
                
            </div>
            <div class="txt_field">
            <input type="text" id="address" name="address" value="<?php echo "Address: ".$user['address']?>" readonly>
                <span></span>
               
            </div>
           
            <?php }?>
          
         
      </form>

</div>

</div>
<!-- person information modal end -->
<!-- password information modal -->
<div id="pass_infor" class="modal">

<div class="modal-content">
  
  <span class="close" id="close_pass">&times;</span>
  <h1 >Change Password</h1>
  <form onsubmit="event.preventDefault();" action="reset_pass.php" method="post" id="change_password">
  <div id="error" style="background:red;color:white;width:100%;padding:10px;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;pointer:cursor;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
            <div class="txt_field" >
                <input type="password" id="old_password" name="old_pass">
                <span></span>
                <label >Enter Old Password</label>
            </div>
            <div class="txt_field" >
                <input type="password" id="new_password" name="new_pass">
                <span></span>
                <label>Enter new Password</label>
            </div>
            <div class="txt_field">
                <input type="password" id="confirm_password">
                <span></span>
                <label>Confirm Password</label>
            </div>
            
            <input type="submit" name="submit" value="Save Changes">
            </form>
</div>

</div>
<!-- password information modal end -->
<!-- edit information modal -->
<div id="edit_infor" class="modal">
<div class="modal-content">
  <span class="close" id="close_edit">&times;</span>
  <h1 >Edit Your Information</h1>
  <form action="register.php" method="post" id="form">
  <?php
                    $id=$_SESSION['user_id'];
                    $users=mysqli_query($conn, "SELECT * FROM `users` where id='$id' limit 1");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
          <div class="error" id="error"><h4></h4></div>
             <input type="hidden" name="id" value="<?php echo $user['id']?>">
            <div class="txt_field" style="">
                <input type="text" id="name" name="name" value="<?php echo $user['username']?>">
                <span></span>
                <label for="User_name" >UserName</label>
            </div>
            <div class="txt_field">
                <input type="text" id="email" name="email" value="<?php echo $user['email']?>">
                <span></span>
                <label for="User_name">Email</label>
            </div>
            
            <div class="txt_field" style="">
                <input type="text" id="Phone" name="phone" value="<?php echo $user['phone']?>">
                <span></span>
                <label for="User_name">Phone</label>
            </div>
            <div class="txt_field">
                <input type="text" id="address" name="address" value="<?php echo $user['address']?>">
                <span></span>
                <label for="User_name">Address</label>
            </div>
           
            <?php }?>
          
          <div class="model_butt">
          <input type="submit" value="Save" name="submitz">
            
          </div>
      </form>
</div>

</div>
<!-- edit information modal end -->



<!-- <script src="assets/js/modal.js"></script> -->
    <script type="text/javascript">
      const error_close=document.querySelector("#error_close");
error_close.addEventListener("click", ()=>{
  errorDiv.style.display= `none`;
      });

    const open=document.querySelector("#open");
	 const alert=document.querySelector(".alert");
	 var opacity=0;
	var intervalID=0;
	

	function hide(){
		
		alert.classList.remove('show');
		alert.classList.add('hide');
				
				
			
		}
		function fadout(){
			intervalID=0;
        alert.classList.remove('hide');
		alert.classList.add('show');
        alert.style.opacity=1;
		(function fade(){(alert.style.opacity-=.1)<0?hide():setTimeout(fade,500)})();
		
		}
    //Image Scroll Javascript

      const next=document.querySelector(".Next");
      const back=document.querySelector(".back");
      const crousel=document.querySelector(".carousel_cards");
      var angle=0;
      next.addEventListener("click", ()=>{
        
          var images_count=document.getElementsByClassName("carousel_card");

         
          var math=360/images_count.length;
          angle-=math;
          
          crousel.style.transform= `translateZ(-25rem) rotateY(${angle}deg)`;
      })
      back.addEventListener("click", ()=>{
        var images_count=document.getElementsByClassName("carousel_card");

        
        var math=360/images_count.length;
          
          angle+=math;
          
          crousel.style.transform= `translateZ(-25rem) rotateY(${angle}deg)`;
      })

      var counter=1;

      //refresh schedule
      const schbody=document.querySelector("#schedule");
      const schselect=document.querySelector("#schedule_select");
      const rep_img=document.querySelector("#replace_images");
      schselect.addEventListener("change", ()=>{
      angle=0;
      crousel.style.transform= `translateZ(-25rem) rotateY(${angle}deg)`;
      var form_data = new FormData();
      form_data.append('date',`${event.target.value}`);	
   	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'refreshschedule.php');  	
        ajax_request.send(form_data);  	
        ajax_request.onreadystatechange = function() 	
        
        {
            
            
            if(ajax_request.readyState == 4 && ajax_request.status == 200) 		
            {  			
                var response = ajax_request.responseText;  
                  if(response.success != '') 			{ 				
                    var target = document.getElementById("value");
                    schbody.innerHTML=response;	
                    	
                    } 
                    else { 				
                       alert('page not reloaded');			
                        }  			 		
            } 	
       }
       //replace images
       var form_data1 = new FormData();
      form_data1.append('date',`${event.target.value}`);	
   	
        var ajax_request1 = new XMLHttpRequest();  	
        ajax_request1.open('POST', 'refreshmovie.php');  	
        ajax_request1.send(form_data1);  	
        ajax_request1.onreadystatechange = function() 	
        
        {
            
            
            if(ajax_request1.readyState == 4 && ajax_request1.status == 200) 		
            {  			
                var response = ajax_request1.responseText;  
                  if(response.success != '') 			{ 				
                    
                    rep_img.innerHTML=response;	
                   angle=0;
                    } 
                    else { 				
                       alert('page not reloaded');			
                        }  			 		
            } 	
       }
       
       });
       

       //show Contact Person Infor

       const per_infor=document.querySelector("#per_infor");
       const per_btn=document.querySelector("#per_btn");
       const close_per=document.querySelector("#close_per");
       per_btn.addEventListener("click", ()=>{
        per_infor.style.display= `inline-block`;
        
       });
       //close personal information Modal
        close_per.addEventListener("click", ()=>{
        per_infor.style.display= `none`;
        
       });
        //show  Password  Infor

        const pass_infor=document.querySelector("#pass_infor");
       const pass_btn=document.querySelector("#pass_btn");
       const close_pass=document.querySelector("#close_pass");
       pass_btn.addEventListener("click", ()=>{
        pass_infor.style.display= `inline-block`;
        
       });
      //close person
       close_pass.addEventListener("click", ()=>{
        pass_infor.style.display= `none`;
        
       });
       //show Contact edit infor

       const edit_infor=document.querySelector("#edit_infor");
       const edit_btn=document.querySelector("#edit_btn");
       const close_edit=document.querySelector("#close_edit");
       edit_btn.addEventListener("click", ()=>{
       edit_infor.style.display= `inline-block`;
        
       });

       //close edit infor
       close_edit.addEventListener("click", ()=>{
       edit_infor.style.display= `none`;
        
       });

      //Movie player modal variables
       //const btnzzz=document.querySelector("#btnzzz");
       const modalzzz=document.querySelector("#modal");
       const span = document.querySelector("#close_modal1");
       const in_vid= document.querySelector("#modal .modal-content video");
       var movie_url="";
      //Show Movie player Modal
      //  btnzzz.addEventListener("click", ()=>{
      //  
      //  });

      //  //Hide movie player Modal
       span.addEventListener("click", ()=>{
        in_vid.innerHTML='<source src="">';
        modalzzz.style.display= `none`;
        in_vid.style.display="none";
        in_vid.innerHTML='<source src="">';
        in_vid.load();
        
       });
       function play(url){
         
        modalzzz.style.display= `inline-block`;
        console.log(url);
        in_vid.style.display="inline-block";
       
        in_vid.innerHTML='<source src="'+"admin/"+url+'">';
        in_vid.load();
        console.log(modalzzz);
            		    
       }
      //  const onclick=(event)=>{
      //         movie_url=event.srcElement.id;
      //         console.log(movie_url);
      //       }
      //   window.addEventListener('click',onclick) ;
      // var answers = document.getElementsByClassName("main__btn");  
			// 	for (var i = answers.length; i--;) {   
			// 		answers[i].addEventListener('click', checkplay); 
			// 	}; 
      
        
			// 	function checkplay() {   
			// 		if (this.classList.contains("play")) {     
      //       modalzzz.style.display= `inline-block`;
            
            
      //       in_vid.innerHTML='<source src="'+"admin/"+movie_url+'">';
			// 		} else {     
			// 			console.log("out");   
			// 		} }

       //Closing Modal When target is out side the modal
      

       const drop=document.querySelector("#drop");
       const settings=document.querySelector("#settings");
       const help=document.querySelector("#help");
       var help_hide=document.querySelector(".help_hide");
       const item=document.querySelector(".wrapper");
       const sett=document.querySelector(".setting-drop");
       
       const org=document.querySelector(".menu-bar");
       var close=document.querySelector(".close");
       const whole=document.querySelector(".nav");
      //  drop.addEventListener("click", ()=>{
    
      //     if(counter==1){
      //         item.style.display= `inline-block`;
      //         sett.style.display= `none`;
             
      //     counter =0;
      //     }
      //     else{
      //         org.style.display= `inline-block`;
      //         item.style.display= `none`;
      //       counter =1;
      //     }
          
      // });
      settings.addEventListener("click", ()=>{
      sett.style.display= `inline-block`;
            org.style.display= `none`;
            
        });
     
      help_hide.addEventListener("click", ()=>{
        sett.style.display= `none`;
        org.style.display= `inline-block`;
        
        
      });
      close.addEventListener("click", ()=>{
        sett.style.display= `none`;
        org.style.display= `inline-block`;
        
        
       
      });
      document.addEventListener("click", (event)=>{
       const bool=drop.contains(event.target);
       if(bool){
        if(counter==1){
              item.style.display= `inline-block`;
              sett.style.display= `inline-block`;
              org.style.display= `none`;
          counter =0;
          }
          else{
              org.style.display= `none`;
              item.style.display= `none`;
              sett.style.display= `inline-block`;
            counter =1;
          }
       }else{
        org.style.display= `none`;
              item.style.display= `none`;
              sett.style.display= `inline-block`;
            counter =1;
       }
      });
      window.onclick = function(event) {
          // if (event.target == modalzzz) {
          //   modalzzz.style.display = "none";
            
          // }
          if (event.target == per_infor) {
            per_infor.style.display = "none";
            
          }
          if (event.target == pass_infor) {
            pass_infor.style.display = "none";
            
          }
        
         
          if (event.target == edit_infor) {
            edit_infor.style.display = "none";
            
          }
          
          
         
          
        }
        //SUbmit change password
        const password_change=document.querySelector("#change_password");
        const old_password=document.querySelector("#old_password");
        const new_password=document.querySelector("#new_password");
        const confirm_password=document.querySelector("#confirm_password");
        const errorDiv_val=document.querySelector("#error ul");
        const errorDiv=document.querySelector("#error");
       
        password_change.addEventListener("submit", (error)=>{
   
   console.log("here");
    	
   var form_data = new FormData();
     form_data.append('old_pass',old_password.value);	
     form_data.append('new_pass',new_password.value);	
     form_data.append('c_pass',confirm_password.value);	
    
     // document.getElementById('submit').disabled = true;  	
       var ajax_request = new XMLHttpRequest();  	
       ajax_request.open('POST', 'reset_pass.php');  	
       ajax_request.send(form_data);  
      
       ajax_request.onreadystatechange = function() 	
       
       {
           
           
           if(ajax_request.readyState == 4 && ajax_request.status == 200) 		
           { 
                  
               //document.getElementById('submit').disabled = false;  	
               console.log(ajax_request.responseText);		
               var response = JSON.parse(ajax_request.responseText);  
                 console.log(response);
               
               if(response.success != '') 			{ 
                 
                   fadout();	
                   document.getElementById('change_password').reset();
                   
                   } 
                   else { 		
                     
                     var msg="";		
                          
                     var p=response;
                     for(var key in p){
                       if(p[key]!=""){}
                       msg+=p[key]+"<br>";
                     }
                    console.log(msg);
                    errorDiv_val.innerHTML=msg;
                    errorDiv.style.display='inline-block';
                       }  			 		
           } 	
   }
});
  </script>
  
    <script src="app.js"></script>
    <script src="script.js"></script>
  </body>
</html>
