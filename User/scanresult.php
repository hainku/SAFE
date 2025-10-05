<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAFE-Authenticate Result</title>
    <?php
       include_once'../Res/includes.php';
    ?>
</head>
<body>
    <?php
        $pcode=$_GET['pcode'];
        require_once'../Class/Product.php';
        $p=new Product();
        $data=$p->displayproductbypcode($pcode);
        
        if($row=$data->fetch_assoc()){
            $pname=$row['ProductName'];
            $description=$row['Description'];
            $price=number_format($row['Price'],2);
            $ingredients=$row['Ingredients'];
            $nutritionfacts=$row['NutritionFacts'];
            $status='Authentic';
            $color='text-success';
            $img=$row['Image'];
            $img=$img==''?'default-product.png':$row['Image'];

            echo'
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div>Product Code:</div>
                                        <h6 class="fw-bold">'.$pcode.'</h6>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-10 text-center">
                                        <h1 class="'.$color.'">'.$status.'</h1>
                                    </div>

                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <img src="../Res/images/'.$img.'" class="w-100" alt="Product">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <span class="fst-italic">Product Name:</span> <span class="fw-bold">'.$pname.'</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-10">
                                        <span class="fw-bold">Description:</span> <span class="fst-bold">'.$description.'</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-10">
                                        <span class="fw-bold">Price:</span> <span class="fst-bold">'.$price.'</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-10">
                                        <span class="fw-bold">Ingredients:</span> <span class="fst-bold">'.$ingredients.'</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-10">
                                        <span class="fw-bold">Nutrition Facts:</span> <span class="fst-bold">'.$nutritionfacts.'</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-md-3">
                                        <a href="../scan.php"><button class="form-control btn btn-primary"><i class="fa-solid fa-backward"></i> Back</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            ';
            
        }else{
            $status='Oopsss...';
            $color='text-danger';
            $messageTitle='Contact Us';
            $message='If you have any queries about our product, please let us know.';
            $email='test@gmail.com';
            $number='0978 675 6453';

            echo'
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div>Product Code:</div>
                                        <h6 class="fw-bold">'.$pcode.'</h6>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-10 text-center">
                                        <h1 class="'.$color.'">'.$status.'</h1>
                                    </div>

                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <img src="../Res/images/fake.jpg" class="w-100" alt="Product">
                                    </div>
                                </div>
                                <div class="row my-5">
                                    <div class="card shadow-sm border-0 p-4 text-center">
                                        <h4 class="mb-3"><i class="fas fa-headset text-primary me-2"></i>Contact Us</h4>
                                        <p class="mb-3 text-muted">
                                        If you have any queries about our product, please let us know.
                                        </p>
                                        <p class="fw-medium">
                                        <i class="fas fa-envelope text-primary me-2"></i> rennielletambaoan@gmail.com <br>
                                        <i class="fas fa-phone-alt text-primary me-2 mt-2"></i> 0978 675 6453
                                        </p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-md-3">
                                        <a href="../scan.php"><button class="form-control btn btn-primary"><i class="fa-solid fa-backward"></i> Back</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            ';
        }
        
    ?>
    
</body>
</html>