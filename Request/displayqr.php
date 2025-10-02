<?php
require_once'../Class/Product.php';
$p=new Product();
$op=$_GET['op'];
if($op=='displayqrlist'){
    $data=$p->displayqrlist();
    $res=[];
    while($row=$data->fetch_assoc()){
        $res[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($res);
}else if($op==''){

}

?>