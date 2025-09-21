<?php
require_once'Database.php';
Class Product extends Database{
    public function addproducts($productID,$productname,$description,$price,$ingredients,$nutritionfacts){
		$date=date('Y-m-d');
		$time=date('H:i:s');
        $sql="insert into tblproducts values(NULL,'$productID','$productname','$description','$price','$ingredients','$nutritionfacts','$date')";
		if($this->conn->query($sql)){
			return 'Product Added';
		}else{
			return $this->conn->error;
		}
	}
    public function displayproducts(){
		$sql="select * from tblproducts";
		$data=$this->conn->query($sql);
		return $data;
	}
    public function displayproductbyid($pid){
        $sql="select * from tblproducts where ProductID='$pid'";
		$data=$this->conn->query($sql);
		return $data;
    }
    public function displayproductbypcode($pcode){
        $sql="select p.* from tblproducts p inner join tblqrcode q on p.ProductID=q.ProductID where q.ProductCode='$pcode'";
		$data=$this->conn->query($sql);
		return $data;
    }
    public function saveqrcode($pid,$qrcode){
        $val="";
        $date=date('Y-m-d H:i:s');
        foreach($qrcode as $qr){
            $val.="('$pid','$qr','$date'),";
        }
        $val=substr($val,0,-1);
        $sql="insert into tblqrcode (ProductID,ProductCode,DateGenerated) values $val";
        if($this->conn->query($sql)){
            return 'QRCode Saved!';
        }else{
            return $this->conn->error;
        }
    }
    public function authenticate($qrcode){
        $sql="select * from tblqrcode where  ProductCode='$qrcode'";
        $data=$this->conn->query($sql);
        return $data;
    }
}
?>