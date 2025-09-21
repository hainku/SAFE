<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Res/qrcode/html5-qrcode.min.js"></script>
    <?php
        include_once'Res/includes.php';
    ?>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="text-center mt-3 mb-3">Scan your QRCode</h3>
            </div>
        </div>
        <div class="row justify-content-center"> 
            <div class="col-md-5 text-center">
                <img src="Res/images/LOGO.png" alt="SAFE Logo" style="width:30%;position:relative;z-index:1;" class="rounded-circle">
                <div id="reader" style="width:100%; margin-top:-4em;"></div>
            </div>
        </div>
        <div class="row mt-1 justify-content-center">
            <div class="col-md-5 text-center">
                <h3 class="bg-primary text-white p-3"><i class="fa-solid fa-camera"></i> Scan Me</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-end">
                <button class="btn btn-success form-control"><i class="fa-solid fa-rotate-left"></i> Back</button>
            </div>
        </div>
    </div>
      
</body>
</html>

<script>
  const html5QrCode = new Html5Qrcode("reader");
  html5QrCode.start(
    { facingMode: "environment" }, // back camera
    { fps: 10, qrbox: 250 },
    (decodedText, decodedResult) => {
      console.log("QR Code:", decodedText);
      alert("Scanned: " + decodedText);
    }
  ).catch(err => console.error(err));
</script>