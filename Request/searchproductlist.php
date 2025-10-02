<?php
include_once '../Class/Product.php';
$p = new Product();

$productName = isset($_GET['productName']) ? $_GET['productName'] : '';
$category    = isset($_GET['category']) ? $_GET['category'] : '';

$data = $p->searchproducts($productName, $category); 

while ($row = $data->fetch_assoc()) {
    $img = ($row['Image'] == '') ? 'default-product.png' : $row['Image'];
    echo '
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
                <img id="img_edit2" src="../Res/images/'.$img.'" class="card-img-top h-50" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title" style="font-size:20px;">'.($row['ProductName']).'</h5>
                    <p class="text-secondary mb-1"><small>'.$row['Category'].'</small></p>
                    <p class="card-text text-muted">'.substr($row['Description'], 0, 100) . (strlen($row['Description']) > 100 ? '...' : '').'</p>
                    <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#viewProductModal" onclick="loaddetails(&quot;'.$row['ProductID'].'&quot;)">View</button>
                </div>
            </div>
        </div>
    ';
}
?>
