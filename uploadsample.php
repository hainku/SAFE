<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once'Class/Product.php';
        $p=new Product();
        if(isset($_POST['btnupload'])){
            $img=$_FILES['imgupload'];
            $newfilename='1001';
            $res= $p->uploadphoto($img,'Res/images/',$newfilename);
            if($res=='success'){
                echo'SAVE MO DATA';
            }else{
                echo $res;
            }
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <input type="file" name="imgupload" accept="image/*">
        </div>
        <div>
            <button type="submit" name="btnupload">UPLOAD</button>
        </div>
    </form>
</body>
</html>