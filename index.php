<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SAFE</title>
        <?php include_once'Res/includes.php';?>
    </head>
    <body class="bg-white bg-gradient d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg rounded-4 p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Logo" width="70" class="mb-2">
                <h3 class="fw-bold text-dark">SAFE</h3>
                <p class="text-muted small">Secure Login Portal</p>
            </div>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary rounded-3 fw-semibold">Login</button>
                </div>
                
                <div class="text-center text-muted mb-3">or</div>

               
                <div class="d-grid">
                    <button type="button" class="btn btn-success">
                    <i class="bi bi-qr-code-scan"></i> Scan Product
                    </button>
                </div>
            </form>
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
                echo'
                    <script>
                        window.open("Admin/admin_homepage.php","_self");
                    </script>
                ';
            }
		}else{
			echo'
				<script>
					alert("Invalid Username and Password");
				</script>
			';
		}
	}
?>


