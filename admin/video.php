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


 <!-- <!DOCTYPE html> 
 <html lang="en">     
	 <head>         
		 <meta charset="UTF-8">         
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">         
		 <meta http-equiv="X-UA-Compatible" content="ie=edge">         
		      
		 <title>Movie Arena</title>     
		 <style>
            *{     
	 font-size: 12px;     
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
	img {     
		max-width: inherit;     
		width: inherit; }  
		@media print {     
			.hidden-print,     
			.hidden-print * {         display: none !important;     } }
		 </style>
		</head>     
		<body>         
			<div class="ticket">             
				<img src="./logo.png" alt="Logo">             
				<p class="centered">Movie Arena Receipt                
					<br>Address: 9090                
					<br>Tell: 0114567866</p>
					          
					<table>                 
						<thead>                     
							<tr>                         
								<th class="quantity">Q.</th>                         
								<th class="description">Movie</th>
								<th class="description">Hall</th>                           
								<th class="price">$$</th>                     
							</tr>                 
						</thead>                 
						<tbody>                     
							<tr>                         
								<td class="quantity">1.00</td>                         
								<td class="description">ARDUINO UNO R3</td>                         
								<td class="price">$25.00</td>                     
							</tr>                     
							                
						</tbody>             
					</table>
				
					 <p>Date: 12/12/2022 
					<br>Time: 10.01pm</p>           
					<p class="centered">Thanks for Booking!                 
						<br>MovieArena.co.ke</p>         
					</div>         
					<button id="btnPrint" class="hidden-print">Print</button>         
					<script >
						const $btnPrint = document.querySelector("#btnPrint"); 
						$btnPrint.addEventListener("click", () => {     window.print(); });
					</script>     
				</body> 
				</html> -->
				
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<p>What is 2+2?</p> 
<a href="#" class="answer wrong">5</a> 
<a href="#" id="4" class="answer correct">4</a> 
<a href="#" class="answer wrong">7</div> 
<a href="#" class="answer wrong">2</div>
</body>
<script>
                var wrongMsg = "Sorry, that's not the answer"; 
				var correctMsg = "Correct!" 
				var answers = document.getElementsByClassName("answer");  
				for (var i = answers.length; i--;) {   
					answers[i].addEventListener('click', checkMulti); 
				};  
				function checkMulti() {   
					if (this.classList.contains("correct")) {     
						console.log(this.id);
					} else {     
						console.log(wrongMsg);   
					} }
</script>
</html>
