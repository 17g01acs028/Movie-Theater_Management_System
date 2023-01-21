
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>SignUp</h1>
        <form action="register.php" method="post" id="form1">
        <div class="error" id="error"><h4></h4></div>
            <div style="display:flex">
            <div class="txt_field" style="margin-left:10px;">
                <input type="text" id="name" name="name">
                <span></span>
                <label for="User_name" >UserName</label>
            </div>
            <div class="txt_field">
                <input type="text" id="email" name="email">
                <span></span>
                <label for="User_name">Email</label>
            </div></div>
            <div style="display:flex">
            <div class="txt_field" style="margin-left:10px;">
                <input type="text" id="phone" name="phone">
                <span></span>
                <label for="User_name">Phone</label>
            </div>
            <div class="txt_field">
                <input type="text" id="address" name="address">
                <span></span>
                <label for="User_name">Address</label>
            </div></div>
            <div style="display:flex">
            <div class="txt_field" style="margin-left:10px;">
                <input type="password" id="password" name="password">
                <span></span>
                <label for="User_name">Password</label>
            </div>
            <div class="txt_field">
                <input type="password" id="cpass">
                <span></span>
                <label for="User_name">Confirm Password</label>
            </div></div>
            <!-- <div class="pass">Forgotten Password</div> -->
            <input type="submit" name="submit" value="Signup">
            <div class="signup_link">
            Already  a Member? <a href="login.php">login</a>
            </div>    
            
        </form>
        
        <script type="text/javascript">
            //signup form Validation fields
const errorDiv=document.querySelector("#error");
const form1=document.querySelector("#form1");
const username=document.querySelector("#name");
const password=document.querySelector("#password");
const c_password=document.querySelector("#cpass");
const email=document.querySelector("#email");
const phone=document.querySelector("#phone");
const address=document.querySelector("#address");
        //signup validation
// function validateEmail(email) { 
// const re = /^[w.-_]{1,}@[w.-]{6,}/  
// return re.test(email); }
form1.addEventListener("submit", (error)=>{
    
    let in_error='';
if(username.value==""){
    in_error+="Username is empty" +"<br>";
    
}
if(address.value==""){
    in_error+="Address is empty" +"<br>";
    
}
if(phone.value==""){
    in_error+="Phone Number is empty" +"<br>";
    
}

if(password.value!=c_password.value){
    in_error+="Password Do Not Match" +"<br>";
    
}

if(email.value==""){
    in_error+="Email is empty" +"<br>";
    
}
// var emailx=email.value;
// alert(emailx);
// alert(validateEmail(emailx));
// if(validateEmail(emailx)){

// }else{
//     in_error+="Incorrect Email Format "+"<br>";
// }
if(password.value==""){
    in_error+="Password is empty "+"<br>";
    
}


if(in_error!==""){
   
    errorDiv.style.display="inline-block";
    errorDiv.innerHTML=in_error;
    error.preventDefault();}
});
        </script>
    </div>
</body>
</html>