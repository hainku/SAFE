<?php
include_once '../Class/Product.php';
$p = new Product();

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $productID = $data['ProductID'];
    $productName = $data['ProductName'];
    $description = $data['Description'];
    $price = $data['Price'];
    $ingredients = $data['Ingredients'];
    $nutritionFacts = $data['NutritionFacts'];

    $result = $p->updateproduct($productID,$productName,$description,$price,$ingredients,$nutritionFacts);

    if ($result) {
        echo "Product updated successfully!";
    } else {
        echo "Failed to update product.";
    }
} else {
    echo "Invalid data received.";
}
?>
