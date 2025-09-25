<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
  }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_admin.php'; ?>
</head>