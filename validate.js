//login form Validation fields
const form=document.querySelector("#form");
const errorDiv=document.querySelector("#error");
const username=document.querySelector("#name");
const password=document.querySelector("#password");



//login validation
form.addEventListener("submit", (error)=>{
    let in_error='';
if(username.value==""){
    in_error+="Username is empty" +"<br>";
    
}
if(password.value==""){
    in_error+="Password is empty "+"<br>";
    
}

if(in_error!==""){
    errorDiv.style.display="inline-block";
    errorDiv.innerHTML=in_error;
    error.preventDefault();}
});
