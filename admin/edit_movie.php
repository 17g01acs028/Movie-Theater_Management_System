<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Movie record Updated</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
<?php include('components/body.php');?>

    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Edit Movie Details</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Edit Movie</h2>
                 <a href="movie.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form" enctype="multipart/form-data">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <div class="row">
                 <div class="col">
                 <?php
                    $count =1;
                    $id=$_GET['id'];
                    $movies=mysqli_query($conn, "select * from movies where id=$id");
                    while($movie=mysqli_fetch_array($movies)){
                        
                    ?>
                   <div class="input-box">
                     <span>Full Movie Name</span>
                     <input type="text" placeholder="Movie Name" id="name" name="name" value="<?php echo $movie['mname']; ?> ">
                   </div>
                   <div class="input-box">
                     <span>Director</span>
                     <input type="text" placeholder="Director" id="director" name="director" value="<?php echo $movie['director'] ?>">
                   </div>
                   
                   <div class="input-box">
                     <span>Movie Profile Upload</span>
                     <input type="file" placeholder="Profile pic" name="pic" id="pic">
                     <input type="hidden">
                     <div class="pic_preview" style="width:400px;height:200px;border:1px solid rgb(119,115,128); margin-top:10px;">
                     <img src="<?php echo $movie['img']; ?>" width="430" height="200">
                     </div>
                   </div>
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Movie Video Clip Upload</span>
                     <input type="file" placeholder="video" id="vid" name="video">
                     <div class="movie_preview" style="width:500px;height:250px;border:1px solid rgb(119,115,128); margin-top:10px;">
                     <video width="100%" height="250" controls>
					<source src="<?php echo $movie['movie']?>">
				</video>
                     </div>
                   </div>
                   <div class="input-box">
                     <span>Description</span>
                     <textarea name="description" id="description" cols="30" rows="10"><?php echo $movie['description'] ?></textarea>
                   </div>
                   
                 </div>
                 
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" value="Save" class="submit-btn" name="save_movie">
                 </form>
                 <?php }?>
               </div>
               
             </div>
        </div>
        
    </div>
    <script>
      //login form Validation fields
const form=document.querySelector("#form");
const errorDiv_val=document.querySelector("#error ul");
const errorDiv=document.querySelector("#error");
const username=document.querySelector("#name");
const email=document.querySelector("#email");
const phone=document.querySelector("#phone");
const address=document.querySelector("#address");
const error_close=document.querySelector("#error_close");
const save_user=document.querySelector("#save_user");
const msg=document.querySelector("#global_msg");
error_close.addEventListener("click", ()=>{
  errorDiv.style.display= `none`;
      });

//login validation
form.addEventListener("submit", (error)=>{
   
    console.log("here");
    var form_element = document.getElementById("form");  	
    var form_data = new FormData(form_element);
      	console.log(form_data);
      // document.getElementById('submit').disabled = true;  	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'update_movie.php');  	
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
                    window.location.href="movie.php";
                    
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
   <!-- include footer  -->
   <?php include('components/footer.php');?>