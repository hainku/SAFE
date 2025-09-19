<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - QR Authentication System</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white bg-gradient d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow-lg rounded-4 p-4" style="max-width: 400px; width: 100%;">
    <div class="text-center mb-4">
      <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Logo" width="70" class="mb-2">
      <h3 class="fw-bold text-dark">QR Auth System</h3>
      <p class="text-muted small">Secure Login Portal</p>
    </div>

    <form>
      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control rounded-3" id="username" placeholder="Enter username" required>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control rounded-3" id="password" placeholder="Enter password" required>
      </div>

      <!-- Login Button -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary rounded-3 fw-semibold">Login</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
