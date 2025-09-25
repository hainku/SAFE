<?php
require_once'../Class/User.php';
$u=new User();
$userid=$_GET['userid'];
$pw=$_GET['pw'];
$npw1=$_GET['npw1'];
$npw2=$_GET['npw2'];
echo $u->changepassword($userid,$pw,$npw1,$npw2);
?>