<?php
include 'assets/db.php';
include('recoment.php');

session_start();

                 if(isset($_SESSION['type']) && $_SESSION['type']==0){
                  header('location:admin/index.php');
           }


?>
<!-- <!DOCTYPE html>
<html>

<head>
	<title>
	fade-in effect on page load using JavaScript
	</title>
	<script type="text/javascript">
		var opacity = 0;
		var intervalID = 0;
		window.onload = fadeIn;

		function fadeIn() {
			setInterval(show, 200);
		}

		function show() {
			var body = document.getElementById("body");
			opacity = Number(window.getComputedStyle(body)
							.getPropertyValue("opacity"));
			if (opacity < 1) {
				opacity = opacity + 0.1;
				body.style.opacity = opacity
			} else {
				clearInterval(intervalID);
			}
		}
	</script>
</head>

<body id="body" style="opacity: 0;">
	<br>
	<h1 style="color: green">GeeksforGeeks</h1>
	<b>
	How to create fade-in effect
	on page load using javascript
	</b>
	<p>
	This page will fade-in after loading
	</p>
</body>
<html> -->
<!-- <html>
<head>
	<title>How to create fade-out effect
			on page load using javascript</title>
	<script type="text/javascript">
	
	var opacity=0;
	var intervalID=0;
	window.onload=fadeout;
		function fadeout(){
			setInterval(hide, 200);
		}
	function hide(){
		var body=document.getElementById("body");
		opacity =
Number(window.getComputedStyle(body).getPropertyValue("opacity"))

			if(opacity>0){
				opacity=opacity-0.1;
						body.style.opacity=opacity
			}
			else{
				clearInterval(intervalID);
			}
		}
	</script>
	
	
	
</head>

<body id="body">

<br>

	<h1 style="color: green">
		GeeksForGeeks
	</h1>

	<b>
		How to create fade-out effect
		on page load using javascript
	</b>


	<p>
		This page will fade-out
		after loading
	</p>
</body>
</html>	 -->
 <!-- <!DOCTYPE html>
 <html lang="en">
 <head>
	 <meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Document</title>
	 <style>
		 *{
			 margin:0;
			 padding:0;
			 box-sizing:border-box;
			 font-family:'poppins',sans-serif;
			 

		 }
		 .alert{
			background:#ffdb9b;
			padding:20px 40px;
            min-width:440px;
			position:absolute;
			right: 0;
			top:10px;
			border-radius:4px;
			border-left:4px solid #ffa502;
			display:flex;
		 }
		 .alert.show{
			 animation:show_slide 1s ease forwards;
		 }
		 @keyframes show_slide {
			 0%{
			 transform:translateX(100%);}
			 40%{
				transform:translateX(-10%);
			 }
			 80%{
				transform:translateX(0%); 
				}
				100%{
					transform:translateX(-10px);
				}
		 }
		 .alert.hide{
			 display:none;
		 }
		 .alert .ex{
			 width:30px;
			 height:30px;
			 border-radius:50px;
			 text-align:center;
			 padding:5px;
			 border:1px solid black;
		 }
		 .alert .ex{
			 width:30px;
			 height:30px;
			 border-radius:50px;
			 text-align:center;
			 padding:5px;
			 border:1px solid black;
		 }

		 .alert .close_btn{
			 position:absolute;
			 right: 0;
		     top:50%;
			 transform:translateY(-50%);
			 font-size:25px;
			 font-weight:700;
			 padding:20px 18px;
			 background:#ffd080;
			 color:#ce8500;
			 cursor:pointer;
			 
		 }
		 .alert .close_btn:hover{
			background:#ffc766;
		 }
		 .alert .msg{
			 padding:5px;
		 }
	 </style>
 </head>
 <body>
	 <button id="open">open</button>
	 <div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg">Warning: This is a warning alert</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
 </body>
 <script>
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
	 open.addEventListener('click' ,()=>{
		fadout();
	 });

	
 </script>
 </html> -->


 <!DOCTYPE html> 
 <html lang="en">     
	 <head>         
		 <meta charset="UTF-8">         
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">         
		 <meta http-equiv="X-UA-Compatible" content="ie=edge">         
		      
		 <title>Movie Arena</title>     
		 <style>
            *{     
	 font-size: 18px;     
	 font-family: 'Times New Roman'; 
	}  
	td, th, tr, table {     
		border-top: 1px solid black;     
		border-collapse: collapse; 
	}  
	td.description, th.description {     
		width: 75px;     
		max-width: 75px; 
	}  
	td.quantity, th.quantity {     
		width: 40px;     
		max-width: 40px;     
		word-break: break-all; 
	}  td.price, th.price {     
		width: 40px;     
		max-width: 40px;     
		word-break: break-all; 
	}  .centered {     
		text-align: center;     
		align-content: center; 
	}  .ticket {     
		width: 300px;     
		max-width: 300px; 
		border:1px solid black;
		padding:20px;
		position:absolute;
		top:25%;
		left:50%;
	    transform:translateY(-50%);
		transform:translateX(-50%);
	} 
  .hidden-print{
    position:absolute;
    top:10px;
    left:10px;
  } 
  .close-print{
    position:absolute;
    top:10px;
    right:10px;
  }
	img {     
		max-width: inherit;     
		width: inherit; }  
		@media print {     
			.hidden-print,     
			.hidden-print * {         display: none !important;     }
		    .close-print,     
			.close-print * {         display: none !important;     }
		  
		}
		 </style>
		</head>     
		<body>         
			<div class="ticket">             
      <button id="btnPrint" class="hidden-print">Print</button> 
      <button  class="close-print"><a href="myticket.php">Back</a></button>        
				<p class="centered">Movie Arena Receipt                
					<br>Address: 9090                
					<br>Tell: 0114567866</p>
					          
					<table>                 
						<thead>                     
							<tr>                         
								<th class="quantity">Q.</th>                         
								<th class="description">Movie</th>
								<th class="description">Hall</th>                           
								<th class="price">Ksh</th>                     
							</tr>                 
						</thead>                 
						<tbody>  
            <?php
                    $count =1;
                    $id=$_GET['id'];
                    $users=mysqli_query($conn, "SELECT *,Time(dateadded) as time , DATE(dateadded) as date FROM `movie_info` where id='$id' ORDER BY `dateadded` ASC limit 10");
                    while($user=mysqli_fetch_array($users)){
                       
                      $schedules=mysqli_query($conn,"select * from schedule where Un_id='$user[uniqid]'");
                      $schedule=mysqli_fetch_array($schedules);
                      
                    ?>                   
							<tr style="text-align:center;">                         
								<td class="quantity"><?php echo $user['payment_status']?>.00</td>    
              
                                         
								<td class="description"><?php 
                     $users1=mysqli_query($conn,"select * from movies where id=$schedule[mid]");
                     $username1=mysqli_fetch_array($users1);
                     echo $username1['mname'];
                     
                     ?></td>  
                     <td class="price"><?php
                      $users1=mysqli_query($conn,"select * from hall where id=$schedule[hallid]");
                      $username1=mysqli_fetch_array($users1);
                      echo $username1['Name'];
                     ?></td> 
                     <td class="description"> <?php echo $schedule['price']*$user['payment_status']; ?>:00</td>                        
								                    
							</tr> 
							<tr style="text-align:center;">
								<td>Totals</td>
								<td></td>
								<td></td>
								<td> <?php echo  $schedule['price']*$user['payment_status']; ?>:00</td>
							</tr>                    
							                
						</tbody>             
					</table>
				
					 <p>Date: <?php echo $user['date']; ?>
					<br>Time: <?php echo $user['time']; ?></p>   
              
					<p class="centered">Thanks for Booking!                 
						<br>MovieArena.co.ke</p>
						<p class="centered">Serial                 
						<br><?php echo $user['serial']; ?></p>          
					</div>         
					<?php }?>            
					<script >
						const $btnPrint = document.querySelector("#btnPrint"); 
						$btnPrint.addEventListener("click", () => {     window.print(); });
					</script>     
				</body> 
				</html>
