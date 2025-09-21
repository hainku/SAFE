<?php 

    function generateProductID($length = 5) {
        $random = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
        return "PRODUCT-" . $random; 
    }

    function generateProductCode($length = 20) {
        return substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", 5)), 0, $length);
    }

    $productID = generateProductID();
    $productCode = generateProductCode();

    include_once'../Class/User.php'; 
    $u=new User(); 
    if(isset($_POST['btnaddproduct'])){ 
        $productname=$_POST['productName']; 
        $description=$_POST['productDescription']; 
        $price=$_POST['price'];
        $ingredients=$_POST['ingredients'];
        $nutritionfacts=$_POST['nutritionFacts'];

        $data=$u->addproducts($productID,$productCode,$productname,$description,$price,$ingredients,$nutritionfacts); 

        echo'
			<script>
				alert("'.$u->addproducts($productID,$productCode,$productname,$description,$price,$ingredients,$nutritionfacts).'");
			</script>
		';
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Homepage</title>
        <?php include_once '../Res/includes.php'; ?>
        <?php include_once '../Res/navbar.php'; ?>
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search product..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
                
                <div class="col-md-6 text-md-end text-center">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </button>
                </div>
            </div>
            <?php
                $data=$u->displayproducts($productID);
                while($row = $data->fetch_assoc()){
                    echo'
                    
                    ';
                }
            ?>
            <div class="row g-4 mt-5">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="../Res/images/2.webp" class="card-img-top" alt="Product 1">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text text-muted">Category: Electronics</p>
                        <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#viewProductModal">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <!--label for="productImage" class="form-label">Product Image</label-->
                        <input class="form-control" type="hidden" id="productImage">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Ingredients</label>
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Nutrition Facts</label>
                        <textarea class="form-control" id="nutritionFacts" name="nutritionFacts" rows="3"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" name="btnaddproduct">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Product Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="viewProductModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="https://via.placeholder.com/400x250" class="img-fluid rounded mb-3" alt="Product Image">
                <h5>Product Name</h5>
                <p><strong>Category:</strong> Electronics</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>


