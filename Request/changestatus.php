<?php
require_once'../Class/User.php';
$u=new User();
$userid=$_GET['userid'];
$status=$_GET['status'];
echo $u->changestatus($userid,$status);
//echo $status;
//echo $userid;
?>