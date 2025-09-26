<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
        include_once'../Class/Session.php';
        $s=new Session('admin','Clerk/clerk_homepage.php');
  }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_admin.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<?php
include_once'../Res/dashboarddetails.php';
?>
</body>
</html>