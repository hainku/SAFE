<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
      include_once'../Class/Session.php';
      $s=new Session('clerk','Admin/admin_homepage.php');
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAFE - About Us</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_clerk.php'; ?>

</head>
<body class="bg-light">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>SAFE Developers</h3>
            </div>
        </div>

        <div class="row g-4 mt-5">
            <?php
                $img=['campos','estrella','fanoga','malabag','selverio','telar'];
                $name=['Rennielle T. Campos','Jane R. Estrella','Charles Francis R. Fanoga','Neil Lenard L. Malabag','Kenneth D. Selverio','Reyvin M. Telar'];
                $email=['rennielletambaoan@gmail.com','janeestrella018@gmail.com','charlesfanoga5@gmail.com','nlmalabag.mi@gmail.com','selveriokenneth@gmail.com','reyvinmoren.telar@gmail.com'];
                for($c=0;$c<6;$c++){
                    echo'
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="../Res/images/developers/'.$img[$c].'.jpg" class="card-img-top" alt="'.$img[$c].'">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">'.$name[$c].'</h5>
                                    <div class="text-primary">'.$email[$c].'</div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>  
        </div>

       
    </div>

</body>
</html>