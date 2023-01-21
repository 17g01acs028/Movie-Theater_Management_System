
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/modal.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 >Rate Movie</h1>
    <form action="" method="post" id="form">
            <div class="error" id="error"><h4></h4></div>
            <div class="txt_field">
                <input type="text" >
                <span></span>
                <label for="User_name">Feed Back</label>
            </div>
            <div class="txt_field">
                <input type="text"  >
                <span></span>
                <label for="User_name">Rating(* range 1 to 10)</label>
            </div>
            
            <div class="model_butt">
            <input type="submit" value="Save" name="submit">
            <button class="cancel close">Cancel</button>    
            </div>
        </form>
  </div>

</div>

<script src="assets/js/modal.js"></script>

</body>
</html>

