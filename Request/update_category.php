<?php
    include_once '../Class/Product.php';
    $p = new Product();

    $id = $_POST['id'];
    $name = $_POST['name'];

    echo $p->updatecategory($id, $name);
?>
