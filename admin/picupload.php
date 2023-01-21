<?php

if(isset($_FILES['img1'])){
    echo "img 1";
$location="store/" ;   
$img1_name=$_FILES['img1']['name'];
$img1_size=$_FILES['img1']['size'];
$img1_tmp=$_FILES['img1']['tmp_name'];
$upload_img1=$location.$img1_name;
$move=move_uploaded_file($img1_tmp,$upload_img1);
}

if(isset($_FILES['img2'])){
    echo "img 2";
    $location="store/" ;   
    $img1_name=$_FILES['img2']['name'];
    $img1_size=$_FILES['img2']['size'];
    $img1_tmp=$_FILES['img2']['tmp_name'];
    $upload_img1=$location.$img1_name;
    $move=move_uploaded_file($img1_tmp,$upload_img1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="">Image 1</label>
    <input type="file"  name="img1">
    <label for="">Image 1</label>
    <input type="file"  name="img2">
    <input type="submit" value="save">
    </form>

    <?php echo substr(sha1(mt_rand()),17,6);?>
</body>
</html>