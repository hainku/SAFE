<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SAFE - Landing Page</title>
        <?php include_once 'Res/includes.php'; ?>
        <style>
            .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            }

            .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 1.5rem;
            }

            .feature-box {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .btn-lg {
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
            }

            .modal-content {
            border-radius: 15px;
            border: none;
            }
            .modal-header {
            border-bottom: none;
            }
            .modal-body {
            background: #f9f9f9;
            border-radius: 10px;
            }

            @media (max-width: 768px) {
                .carousel-caption h2 {
                    font-size: 1.5rem;
                }
                .carousel-caption p {
                    font-size: 1rem;
                }
            }

            @media (max-width: 576px) {
                .carousel-caption {
                    padding: 1rem;
                }
                .carousel-caption h2 {
                    font-size: 1.25rem;
                }
                .carousel-caption p {
                    font-size: 0.9rem;
                }
                .btn-lg {
                    display: block;
                    width: 100%;
                    margin-bottom: 10px;
                }
            }
        </style>
    </head>
    <body class="bg-light">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Res/images/1.png" alt="Slide 1">
                    <div class="carousel-caption">
                        <h2 class="fw-bold display-5">SAFE Authentication</h2>
                        <p class="lead">Secure Authentication and Fraud Evaluation System</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Res/images/2.webp" alt="Slide 2">
                    <div class="carousel-caption">
                        <h2 class="fw-bold display-5">Protecting Authenticity</h2>
                        <p class="lead">Scan QR codes to verify real products instantly</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Res/images/3.jpg" alt="Slide 3">
                    <div class="carousel-caption">
                        <h2 class="fw-bold display-5">For Users & Admins</h2>
                        <p class="lead">Simple scanning for users, secure management for admins</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <section class="container my-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-qrcode fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">QR Code Verification</h5>
                        <p>Scan product QR codes to verify authenticity instantly.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-lock fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold">Secure System</h5>
                        <p>Our platform ensures tamper-proof authentication for your products.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-user-shield fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold">Admin Access</h5>
                        <p>Admins can log in securely to manage and monitor authenticity reports.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="text-center my-5">
            <a href="scan.php"><button type="button" class="btn btn-success btn-lg me-3 shadow">
                <i class="fas fa-qrcode"></i> Scan Product
            </button></a>
            <button type="button" class="btn btn-primary btn-lg shadow" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
                <i class="fas fa-user-shield"></i> Admin Login
            </button>
        </section>

        <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="adminLoginModalLabel">Admin Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control rounded-3" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control rounded-3" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="btnlogin" class="btn btn-primary rounded-3 fw-semibold">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
    include_once'Class/User.php'; 
    $u=new User(); 
    if(isset($_POST['btnlogin'])){ 
        $un=$_POST['username']; 
        $pw=$_POST['password']; 

        $data=$u->login($un,$pw); 

        if($row = $data->fetch_assoc()){ 
            if($row['Role']=='admin'){ 
                echo' <script> window.open("Admin/admin_homepage.php","_self"); </script> '; 
            }else if($row['Role']=='clerk'){ 
                echo' <script> window.open("Clerk/clerk_homepage.php","_self"); </script> '; 
            } 
            }else{ 
                echo' <script> alert("Invalid Username and Password"); </script> '; 
            } 
        } 
?>
