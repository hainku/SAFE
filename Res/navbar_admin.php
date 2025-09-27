<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <img src="/SAFE/Res/images/LOGO.png" alt="SAFE Logo" style="width: 45px; height: auto;" class="d-inline-block align-text-top">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="admin_homepage.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_users.php">Manage User</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="../Admin/logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changepassword">Change Password</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include_once'changepassword.php';
?>