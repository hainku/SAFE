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

    <style>
        .dev-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .dev-card:hover img {
            transform: scale(1.05);
        }
        .dev-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .dev-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        
        <!-- System Info Section -->
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="fw-bold"><i class="fas fa-shield-alt text-primary"></i> About SAFE</h2>
                <p class="lead mt-3">
                    <strong>SAFE (Secure Access for Facility & Employees)</strong> is a web-based system designed to streamline 
                    product management, user handling, and reporting. It helps businesses keep their operations secure, 
                    organized, and efficient.
                </p>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row g-4 text-center mb-5">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-box fa-2x text-primary mb-3"></i>
                        <h5 class="fw-bold">Product Management</h5>
                        <p class="text-muted">Add, update, and search products easily by name or category.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-users-cog fa-2x text-success mb-3"></i>
                        <h5 class="fw-bold">User Management</h5>
                        <p class="text-muted">Secure user registration, editing, and role-based access control.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-2x text-warning mb-3"></i>
                        <h5 class="fw-bold">Reports & QR</h5>
                        <p class="text-muted">Generate detailed reports with QR codes for faster tracking.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-search fa-2x text-danger mb-3"></i>
                        <h5 class="fw-bold">Search & Filter</h5>
                        <p class="text-muted">Quick product lookup with category-based filters and keywords.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Developers Section -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2 class="fw-bold"><i class="fas fa-code text-primary"></i> SAFE Developers</h2>
                <p class="text-muted">Meet the passionate team behind the SAFE System.</p>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <?php
                $img=['campos','estrella','fanoga','malabag','selverio','telar'];
                $name=['Rennielle T. Campos','Jane R. Estrella','Charles Francis R. Fanoga','Neil Lenard L. Malabag','Kenneth D. Selverio','Reyvin M. Telar'];
                $email=['rennielletambaoan@gmail.com','janeestrella018@gmail.com','charlesfanoga5@gmail.com','nlmalabag.mi@gmail.com','selveriokenneth@gmail.com','reyvinmoren.telar@gmail.com'];

                for($c=0;$c<6;$c++){
                    echo'
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0 dev-card">
                                <img src="../Res/images/developers/'.$img[$c].'.jpg" class="card-img-top rounded-top" alt="'.$name[$c].'">
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-bold" style="font-size: 20px;">'.$name[$c].'</h5>
                                    <p class="text-primary small"><i class="fas fa-envelope"></i> '.$email[$c].'</p>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>  
        </div>
    </div>
    <?php
        include_once'../Res/footer_admin.php';
    ?>
</body>
</html>
