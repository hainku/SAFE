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
    <title>Inventory Clerk Homepage</title>
    <?php include_once '../Res/includes.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php
include_once '../Res/navbar_clerk.php';
include_once'../Res/dashboarddetails.php';
?>

Llst of products
Filter Products<br>

