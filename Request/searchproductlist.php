<?php
include_once '../Class/Product.php';
$p = new Product();

$productName = isset($_GET['productName']) ? $_GET['productName'] : '';

$data = $p->searchproducts($productName); 

while ($row = $data->fetch_assoc()) {
    $img=($row['Image']=='')?'default-product.png':$row['Image'];
    echo '
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
                <img id="img_edit" src="../Res/images/'.$img.'" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">'.($row['ProductName']).'</h5>
                    <p class="card-text text-muted">'.substr($row['Description'], 0, 100) . (strlen($row['Description']) > 100 ? '...' : '').'</p>
                    <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#viewProductModal" onclick="loaddetails(\''.$row['ProductID'].'\')">View</button>
                </div>
            </div>
        </div>
    ';
}
?>
