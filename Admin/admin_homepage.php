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

DASHBOARD <br>
1. Total Scans<br>
2. Authentic Product Scans Percentage<br>
3. Fake Product Scans Percentage<br><br>

Bar Graph of authentic vs fake scans<br>
Tabled Real Time Data History of Scans (Paginated)<br>
Filter Data History<br>

