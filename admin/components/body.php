<?php 
error_reporting(0);
include("./transaction.php");
session_start();
if(isset($_SESSION['type']) && $_SESSION['type']==1) {
  header('location:../index.php');
           }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Arena</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="alert.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="pop.css">
    <style>
     *{
      
       -moz-user-select:none;
       -ms-user-select:none;
       -webkit-touch-callout:none;
     }
     
        .nav .wrapper{
    position: absolute;
    margin-top: 350px;
    display: flex;
    width: 300px;
    background:rgb(119,115,128);
    border-radius: 5px;
    display: none;
    transition: .5s ease-in-out;
  }
  
  .nav .drop-btn{
    width: 300px;
    /* background: #242526; */
    color:#b0b3b8;
    line-height: 50px;
    padding: 0 20px;
    font-size: 20px;
    font-weight: 500;
    border-radius: 5px;
  
  }
  .nav .drop-btn .p_cont {
    display: flex;
    position: relative;
  
  }
  .nav .drop-btn .p_cont .picon{
    width: 40px;
    height: 40px;
    border-radius: 30px;
    background: white;
    margin:10px;
  }
  
  .nav .drop-btn .p_cont span{
    position: absolute;
  
    right: 0px;
    top:10px;
    line-height: 50px;
    font-size: 20px;
    cursor: pointer;
  }
  .nav .drop-btn .p_cont  img{
      position: absolute;
      right:0;
      top:5px;
      border: 2px solid burlywood;
    width: 30px;
    height: 30px;
    border-radius:50%;
    cursor: pointer;
    align-items: center;
    border: 2px solid wheat;
  }
  .nav .drop-btn .p_cont  img:hover{
    
    background: #ff512f;
    background: -webkit-linear-gradient(to right, #dd2476, #ff512f);
    background: linear-gradient(to right, #dd2476, #ff512f);
   
  }
  .nav .wrapper .menu-bar{
    
    transition: backgroung-color 0.3s ease-in;
  }
  .nav .wrapper .setting-drop{
    
    transition: backgroung-color 0.3s ease-in;
  }
  
  .nav .wrapper ul{
    list-style: none;
    width: 300px;
    padding: 10px;
  }
  .nav .wrapper ul li{
    line-height: 55px;
  }
  .nav .wrapper ul li a{
    position: relative;
    text-decoration: none;
    color:#b0b3b8;
    display: flex;
    font-size: 18px;
    font-weight: 500;
    padding: 0 10px;
    align-items: center;
    border-radius: 8px;
  }
  .nav .wrapper ul li:hover a{
    background: #3A3B3C;
  }
  .wrapper ul li a .icon{
    height: 40px;
    width: 40px;
    margin-right: 13px;
    background: #ffffff1a;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    align-items: center;
    border-radius: 50%;
  }
  .wrapper ul li a .icon span{
    margin-top:20px;
  }
  
  .wrapper ul li a i{
  position: absolute;
  right: 10px;
  top:5px;
  font-size: 25px;
  pointer-events: none;
  font-weight: 700;
  }
  .wrapper .setting-drop .arrow{
  position: relative;
  padding-left: 10px;
  font-size: 20px;
  color:#b0b3b8;
  cursor: pointer;
  
  
  }
  .wrapper .setting-drop .arrow img{
    position: absolute;
    border: 2px solid white;
    top:10px;
    border-radius: 50%;
    cursor: pointer;
    
    
    }
    .wrapper .setting-drop .arrow span{
      margin-left: 50px;
      cursor: pointer;
      
      
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
    a:is(:link , :active , :visited){
      color:white;
      text-decoration:none;
    }
    a:is(:link , :active , :visited).active{
    background:rgb(119,115,128);
    color: white;
    margin-left: 10px;
/* padding: 0px 40px; */
    border-radius: 25px 0 0 25px;
}

    </style>
</head>
<body>

    <div class="side-menu">
        <div class="brand-name">
        <img src="icons/link.png" alt=""><h1 style="color:rgb(7,117,188);">Links</h1>
        </div>
        <ul>
        <li><a href="./index.php"><img src="icons/dashboard.png" alt="">&nbsp;<span> Dashboard</span></a></li>
        <li><a href="./users.php"><img src="icons/user.png" alt=""> &nbsp;<span> Users</span></a></li>
        <li><a href="./movie.php"><img src="icons/movies.png" alt="">&nbsp;<span> Movies</span></a></li>
        <li><a href="./hall.php"><img src="icons/hall.png" alt="">&nbsp;<span> Halls</span></a></li>
        <li><a href="./schedule.php"><img src="icons/schedule.png" alt="">&nbsp;<span> Schedule</span></a></li>
        <li><a href="./reports.php"><img src="icons/report.png" alt="">&nbsp;<span> Reports</span></a></li>
        <li><a href="./settings.php"><img src="icons/settings.png" alt="">&nbsp;<span> Settings</span></a></li>
        
        </ul>
    </div>
    <div class="container">
      <div class="header">
     
        <div class="nav">
            <div class="nav_show" id="toggle">
            <img src="icons/menu.png" alt="">
            </div>
            <div class="search">
                <!-- <input type="text" placeholder="Search....">
                <button type="submit"><img src="icons/search.png" alt=""></button> -->
                <h2>
                    Movie Arena Admin System
                </h2>
            </div>
            <div class="user">
                <!-- <a href="" class="btn">AddNew User </a>
                <img src="icons/not.png" alt=""> -->
                <!-- <p style="color:rgb(7,117,188);font-weight:700;">Admin Panel Profile</p>
                <div class="img-case">
                    <img src="icons/muser.png" alt="" class="img"><img src="icons/down.png" alt="" class="arrow">
                </div> -->
                <div class="nav">
       <div class="drop-btn" >
           <div class="p_cont">
           <div class="img-case">
                    <img src="icons/muser.png" alt="" class="img">
                </div>
           <p style="color:rgb(7,117,188);font-weight:700;">Admins Panel</p> 
            <img  id="drop" src="icons/down.png" alt="" class="pointer">
           </div>
    
          
       </div>
       <div class="wrapper">
           <ul class="menu-bar" >
               <li>
                   <a href="#">
                       <div class="icon"><span><img src="../icon/home.png" ></span></div>
                       Home
                   </a>
               </li>
               <li>
                   <a id="settings">
                       <div class="icon"><span><img src="../icon/settings.png" ></span></div>
                       Settings <i ><img src="../icon/right.png" ></i>
                   </a>
               </li>
               
               <li>
                   <a id="myBtn1">
                       <div class="icon"><span><img src="../icon/about.png" ></span></div>
                       About Us
                   </a>
               </li>
               <li>
                   <a id="myBtn">
                       <div class="icon"><span><img src="../icon/contact.png" ></span></div>
                       Contacts
                   </a>
               </li>
           </ul>
           <!-- setting & privacy -->
           <ul class="setting-drop" >
               <li class="arrow help_hide" ><img src="../icon/back.png" > <span class="span"> Settings & Privacy</span></li>
               <li>
                   <a id="per_btn">
                       <div class="icon"><span><img src="../icon/person.png" ></span></div>
                       personal information
                   </a>
               </li>
               <li>
                   <a id="pass_btn">
                       <div class="icon"><span><img src="../icon/lock.png" ></span></div>
                       password 
                   </a>
               </li>
              
               
               <li>
                   <a id="edit_btn">
                       <div class="icon"><span><img src="../icon/edit.png" ></span></div>
                       Edit User Profile
                   </a>
               </li>
               <li>
                   <a href="../logout.php">
                       <div class="icon"><span><img src="../icon/logout.png" ></span></div>
                       logout 
                   </a>
               </li>
           </ul>

            
       </div>
</div>
            </div>
        </div>
    </div>
    