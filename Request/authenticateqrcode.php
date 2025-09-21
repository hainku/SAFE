<?php
require_once'../Class/Product.php';
$p=new Product();
$pcode=$_GET['pcode'];
$data=$p->authenticate($pcode);
if($row=$data->fetch_assoc()){
    $result=[
        'success'=>true,
        'productid'=>$row['ProductID']
    ];
}else{
    $result=[
        'success'=>false,
        'message'=>'Product Not Found'
    ];
}
echo json_encode($result);
?>