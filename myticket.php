<?php
error_reporting(0);
include 'assets/db.php';
include('recoment.php');

session_start();

                 if(isset($_SESSION['type']) && $_SESSION['type']==0){
                  header('location:admin/index.php');
           }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movies Arena</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- <link rel="stylesheet" href="admin/styles.css" /> -->

    <link rel="stylesheet" href="slider.css" />
    <link rel="stylesheet" href="button.css" />
    <link rel="stylesheet" href="3d.css" />
    <link rel="stylesheet" href="user-profile.css" />
    <link rel="stylesheet" href="alert.css">
    <link rel="stylesheet" href="assets/css/modal.css">

    <style>
      body{
      background:rgb(19,19,19);
      }
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

.container{
  width:80%;
  margin-left:10%;
  
}
.container_form {
        display:flex;
        
        padding:25px;
        min-height: 60vh;
        background: linear-gradient(90deg,#2ecc71 60%,#27ae60 40.1%);
    }
    .container_form form{
        padding: 20px;
        width: 100%;
        background: #fff;
        box-shadow: 0 50px 10px rgba(0, 0, 0,0.1);
    }
    .container_form form .row{
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .container_form form .row .col{
      flex:1 1 250px;
    }
    .container_form form .row .col .input-box{
      
      width:100%;
    }
    .container_form form .row .col .input-box span{
      margin-bottom:15px;
      display:block;
      margin-top:10px;
    }
    .container_form form .row .col .input-box input{
      width:100%;
      border:1px solid #ccc;
      font-size:15px;
      padding:10px 10px 10px 10px;
      
    }
    .container_form form .row .col .input-box input:focus{
      border:1px solid #000;
    }
    .container_form form .row .col .input-box select{
      width:100%;
      border:1px solid #ccc;
      font-size:15px;
      padding:10px 10px 10px 10px;
      
    }
    .container_form form .row .col .input-box select:focus{
      border:1px solid #000;
    }
    .container_form form .row .col .input-box textarea{
      width:100%;
      border:1px solid #ccc;
      font-size:15px;
      padding:10px 10px 10px 10px;
      
    }
    .container_form form .row .col .input-box textarea:focus{
      border:1px solid #000;
    }
   
    .container_form form .submit-btn{
      width:100%;
      padding:12px;
      font-size:27px;
      margin-top:20px;
      background:#27ae60;
      color:#fff;
      margin-top:5px;
      cursor:pointer;
    }
    .container_form form .submit-btn:hover{
      background:#2ecc71;
    }
    .container .content{
    position: relative;
    margin-top: 10vh;
    min-height: 90vh;

}
.container .content .cards{
padding:  20px 15px;
display: flex;
align-items: center;
justify-content: space-between;
flex-wrap: wrap;
}
.container .content .cards .card{
    width:250px;
    height: 150px;
    background: rgb(255, 255, 255);
    margin: 10px 5px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.container .content .content-2 {
    min-height: 60vh;
    display:flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}
.container .content .content-2 .recent_rating{
    min-height: 50vh;
    flex: 6;
    background: white;
    margin: 0 5px 25px 25px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    display: flex;
    flex-direction: column;
}
.container .content .content-2 .recent_rating .operation{
    width: 30px;
    height:30px;
    background: rgb(212, 228, 243);
    border-radius: 5%;
    padding: 3px;
    border: 2px solid black;   
    margin-left: 5px;
    transition: 0.5s ease-in-out;
}
.container .content .content-2 .recent_rating .operation:hover{
    
    border: 2px solid rgb(73, 201, 23);   
    background: rgb(218, 204, 212);
    
}
.container .content .content-2 .new_seg{
    flex:2;
    background: white;
    min-height: 50vh;
    margin:0 25px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.container .content .content-2 .new_seg table td:nth-child(1){
    width: 40px;
    height:40px;
   

}
.container .content .content-2 .new_seg table td:nth-child(1) .img{
    width: 40px;
    height:40px;
    background: lightslategrey;
    border-radius: 50%;
    border: 2px solid black;

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
            <a href="index.php#home" class="navbar__links" id="home-page">Home</a>
          </li>
          <li class="navbar__item">
            <a href="index.php#about" class="navbar__links" id="about-page">Movies</a>
          </li>
          
          
          <li class="navbar__item">
            <a href="index.php#services" class="navbar__links" id="services-page"
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
		 <span class="msg" id="global_msg">Password Changed</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    </nav>

    
    
    <!-- Booking Section -->
    
          <!-- bookin content -->
          <div class="container">
          <div class="content">
      
      
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2 style="margin:10px;color:brown;">My Tickets</h2>
                 <select name="" id="ticket_select" style="width:200px;color:black;padding:5px 40px;font-size:15px;position:absolute; right:50px;top:10px;">
                <option value="">Select Date</option>
                <?php
                    $count =1;
                    $userid=$_SESSION['user_id'];
                    $users=mysqli_query($conn, "SELECT *,DATE(dateadded) as date FROM `movie_info` where userid='$userid' group by DATE(dateadded) order by DATE(dateadded) DESC");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                   <option value="<?php echo $user['date'] ?>"><?php echo $user['date'] ?></option>
                   <?php }?>
                 </select>
             </div>
             <div class="container_form">
               <form id="form">
             
             <div id="ticket">
             <table style="width:100%;">
                 <tr style="background:black;border:none;color:white;padding:10px;height:50px">
                     
                     <th>Time</th>
                     <th>Movie</th>
                     <th>Hall</th>
                     <th>Action</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $id=$_SESSION['user_id'];
                    $users=mysqli_query($conn, "SELECT *,Time(dateadded) as date FROM `movie_info` where userid='$id' ORDER BY `dateadded` DESC limit 10");
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
                     

                     <td>
                     
                    <a href="myticket_print.php?id=<?php echo $user['id'];?>" class="btn">Print</a>
          
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
          <!-- bookin content end -->

           
    

    

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
//selector
 const schbody=document.querySelector("#ticket");
 const schselect=document.querySelector("#ticket_select");
 schselect.addEventListener("change", ()=>{
      
      var form_data = new FormData();
      form_data.append('date',`${event.target.value}`);	
   	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'refreshticket.php');  	
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
       }});
      counter=1;
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
    
  </body>
</html>
