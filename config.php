<?php
$conn = mysqli_connect('localhost','root','','croprecommendation');
if(!$conn){
    die('Connection failed: '.mysqli_connect_error());
}
?>