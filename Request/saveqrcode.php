<?php
require_once'../Class/Product.php';
$p=new Product();
$pid=$_GET['pid'];
$qrcode=json_decode($_GET['qrcode'],true);

echo $p->saveqrcode($pid,$qrcode);
?>