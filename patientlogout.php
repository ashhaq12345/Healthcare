<?php
session_start();
$_SESSION['username']='';
if(strcmp($_SESSION['username'],'')==0){
header("location:index.php");

}
?>