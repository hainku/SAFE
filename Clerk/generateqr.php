
    <?php
    include_once'../Class/Product.php';
        $p=new Product();
        $pid=$_GET['pid'];
        $quantity=$_GET['quantity'];
        

    ?>

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
        }
        $p=new Product();

        echo $p->saveqrcode($pid,$qrcode);
    ?>
