<?php
    require_once'../Class/Product.php';
    $p=new Product();
    $total=$p->totalscancount();
    $scandata=$p->displayscanhistory();
    $result=[];
    while($row=$scandata->fetch_assoc()){
        $result[]=$row;
    }
    $data=[
        'authentic'=>$p->countAuthentic(),
        'fake'=>$p->countFake(),
        'fakepercentage'=>$p->getFakePercentage(),
        'authenticpercentage'=>$p->getAuthenticPercentage(),
        'total'=>$total->num_rows,
        'tabledata'=>$result
    ];
    echo json_encode($data);
?>