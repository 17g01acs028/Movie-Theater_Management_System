<?php

try{
$db=new PDO("mysql:host=localhost;dbname=mysql;charset=utf8mb4", "root", "");
$query = "
create database movies
";
$statement = $db->prepare($query);
$statement->execute();
//$connect = new PDO("mysql:host=localhost;dbname=movies;charset=utf8mb4", "root", "");

if($db){
$db-> query('use movies');

$sql=file_get_contents('movies.sql');
$qr=$db -> exec($sql);
if($qr){
echo "saved";
}else{

}}else{echo "failed";}
}catch(PDOException $e){
    echo $e-> getMessage();
}
?>