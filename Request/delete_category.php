<?php
    include_once '../Class/Product.php';
    $p = new Product();

    $id = $_GET['id'];
    echo $p->deletecategory($id);
?>
