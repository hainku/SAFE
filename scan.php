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
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div id="reader" style="width:100%;"></div>
            </div>
        </div>
        <div class="row mt-1 justify-content-center">
            <div class="col-md-5 text-center">
                <h3 class="bg-primary text-white p-3"><i class="fa-solid fa-camera"></i> Scan Me</h3>
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