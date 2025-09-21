<?php
require_once'Database.php';
Class User extends Database{
    public function login($un,$pw){
        $sql="select * from tbluser where Username='$un' and Password='$pw'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function addproducts($productID,$productCode,$productname,$description,$price,$ingredients,$nutritionfacts){
		$date=date('Y-m-d');
		$time=date('H:i:s');
        $sql="insert into tblproducts values(NULL,'$productID','$productname','$description','$price','$ingredients','$nutritionfacts','$date');";
		$sql.="insert into tblqrcode values(NULL,'$productID','$productCode')";
		if($this->conn->multi_query($sql)){
			return 'Product Added';
		}else{
			return $this->conn->error;
		}
	}
    public function displayproducts($productID){
		$sql="select * from tblproducts where ProductID='$productID'";
		$data=$this->conn->query($sql);
		return $data;
	}
}
?>