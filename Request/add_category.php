<?php
include_once '../Class/Product.php';
$p = new Product();

if (isset($_POST['categoryName'])) {
    $categoryName = trim($_POST['categoryName']);
    if ($categoryName === '') {
        echo "Category name cannot be empty.";
        exit;
    }

    $result = $p->addcategory($categoryName);
    echo $result ? "Category added successfully!" : "Failed to add category.";
}
?>
