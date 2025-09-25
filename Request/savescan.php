<?php
require_once'../Class/Product.php';
$p=new Product();
$productcode=$_GET['productcode'];
$p->savescan($productcode);
?>