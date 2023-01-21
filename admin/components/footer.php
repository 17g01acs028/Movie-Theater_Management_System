<br><br><br><br>
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
  <form action="../register.php" method="post" id="form">
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
<div class="footer" >
        <div class="nav">
            <div class="search" style="">
            Copyright © 2022  <span style="color:rgb(7,117,188);">&nbsp; Movie Arena</span> . All rights reserved.
            </div>
            <div class="user" style="">
                Movie Arena
            </div>
        </div>
    </div>
    <script src="reload.js"></script>
    <script type="text/javascript">
      
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
	 
      console.log(screen.width);
      const activepage=window.location;
      console.log(activepage);
    const drop=document.querySelector("#drop");

    


    const navlink=document.querySelectorAll(".side-menu ul li a");

    navlink.forEach(link => {
      if(link.href.includes(`${activepage}`)){
        link.classList.add('active');
      }
    });
       var counter=1;
       const toggle =document.querySelector("#toggle");
       const side_menu =document.querySelector(".side-menu");
       
       const settings=document.querySelector("#settings");
       const help=document.querySelector("#help");
       var help_hide=document.querySelector(".help_hide");
       const item=document.querySelector(".wrapper");
       const sett=document.querySelector(".setting-drop");
       
       const org=document.querySelector(".menu-bar");
       var close=document.querySelector(".close");
       const whole=document.querySelector(".nav");
       drop.addEventListener("click", ()=>{
           
    
          
          
      });
      toggle.addEventListener("click", ()=>{
       side_menu.style.display= `inline-block`;
      });
     
      // help_hide.addEventListener("click", ()=>{
      //   sett.style.display= `none`;
      //   org.style.display= `inline-block`;
        
        
      // });
      // close.addEventListener("click", ()=>{
      //   sett.style.display= `none`;
      //   org.style.display= `inline-block`;
        
        
       
      // });
      document.addEventListener("click", (event)=>{
       const bool=drop.contains(event.target);
       const bool2=toggle.contains(event.target);
       
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
       var screen_size=screen.width;
       if(screen_size<500){
       if(bool2){
        side_menu.style.display= `inline-block`;
      }else{
      
       side_menu.style.display= `none`;
            
      }}
      });
        //SUbmit change password
        const password_change=document.querySelector("#change_password");
        const old_password=document.querySelector("#old_password");
        const new_password=document.querySelector("#new_password");
        const confirm_password=document.querySelector("#confirm_password");
        const errorDiv_val_1=document.querySelector("#error ul");
        const errorDiv_1=document.querySelector("#error");
       
        password_change.addEventListener("submit", (error)=>{
   
   console.log("here");
    	
   var form_data = new FormData();
     form_data.append('old_pass',old_password.value);	
     form_data.append('new_pass',new_password.value);	
     form_data.append('c_pass',confirm_password.value);	
    
     // document.getElementById('submit').disabled = true;  	
       var ajax_request = new XMLHttpRequest();  	
       ajax_request.open('POST', '../reset_pass.php');  	
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
                    errorDiv_val_1.innerHTML=msg;
                    errorDiv_1.style.display='inline-block';
                       }  			 		
           } 	
   }
});
      </script>
</body>
</html>