<?php
header('Content-Type: application/json');
require_once'../Class/Product.php';
$p=new Product();
$pid=$_GET['pid'];
$data=$p->displayproductbyid($pid);
$result=[];
while($row=$data->fetch_assoc()){
    $result[]=$row;
}
echo json_encode($result);
?>