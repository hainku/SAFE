<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
        include_once'../Class/Session.php';
        $s=new Session('admin','Clerk/clerk_homepage.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QRCode</title>
    <?php include_once '../Res/includes.php'; ?>
</head>
<body>
    <?php
    include_once'../Class/Product.php';
        $p=new Product();
        $pid=$_GET['pid'];
        $quantity=$_GET['quantity'];
        

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Product ID</th>
                        <th>Product Code</th>
                    </thead>
                    <tbody>
                        <?php
                        function randomCode($length = 5) {
                            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) {
                                $randomString .= $characters[rand(0, strlen($characters) - 1)];
                            }
                            return $randomString;
                        }
                            $qrcode=[];
                            for($c=1;$c<=$quantity;$c++){
                                $code=$pid.date("ymdhis").$c.randomCode();
                                $qrcode[]=$code;
                                echo'
                                    <tr>
                                        <td>'.$c.'</td>
                                        <td>'.$pid.'</td>
                                        <td>'.$code.'</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-primary form-control" name="btnsave" id="btnsave">SAVE</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success form-control" name="btnprint" id="btnprint">PRINT</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        document.getElementById("btnsave").addEventListener("click",function(){
            const qrcode=<?=json_encode($qrcode);?>;
            const pid="<?=$pid;?>";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    Swal.fire({
                    title: "Success",
                    text: this.responseText,
                    icon: "success"
                    });
                }
            };
            xhttp.open("GET", "../Request/saveqrcode.php?pid="+pid+"&qrcode="+JSON.stringify(qrcode), true);
            xhttp.send();
        });
        document.getElementById("btnprint").addEventListener("click",function(){
            window.open("../Report/printqr.php","_new");
        });
    });
</script>