<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAFE - About Us</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_admin.php'; ?>

</head>
<body class="bg-light">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>SAFE Developers</h3>
            </div>
        </div>

        <?php
        $img=['campos','estrella','fanoga','malabag','selverio','telar'];
        $name=['Rennielle T. Campos','Jane R. Estrella','Charles Francis R. Fanoga','Neil Lenard L. Malabag','Kenneth D. Selverio','Reyvin M. Telar'];
        $email=['rennielletambaoan@gmail.com','janeestrella018@gmail.com','charlesfanoga5@gmail.com','nlmalabag.mi@gmail.com','selveriokenneth@gmail.com','reyvinmoren.telar@gmail.com'];
        for($c=0;$c<6;$c++){
            echo'
             <div class="row">
                <div class="col-md-12 d-flex mb-1">
                    <div> <img height="100px" src="../Res/images/developers/'.$img[$c].'.jpg" alt="'.$img[$c].'"></div>
                    <div class="flex-grow-1 ms-3">
                        <div><h5>'.$name[$c].'</h5></div>
                        <div class="text-primary">'.$email[$c].'</div>
                    </div>
                </div>
                <hr>
            </div>
            ';
        }
        ?>  

       
    </div>

</body>
</html>