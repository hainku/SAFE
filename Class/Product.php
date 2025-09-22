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
    public function searchproducts($productName){
        $sql="select * from tblproducts where ProductName LIKE '%$productName%'";
		$data=$this->conn->query($sql);
		return $data;
    }
    public function updateproduct($productID,$productname,$description,$price,$ingredients,$nutritionfacts){
		$sql="update tblproducts set ProductName='$productname',Description='$description',Price='$price',Ingredients='$ingredients',NutritionFacts='$nutritionfacts' where ProductID='$productID'";
		if($this->conn->query($sql)){
			return 'Product Updated!';
		}else{
			return $this->conn->error;
		}
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
    public function uploadphoto($img, $target_dir, $newfilename) {
        $uploadOk = 1;

        // Get file extension
        $imageFileType = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

        // Construct new target file with new filename + extension
        $target_file = rtrim($target_dir, "/") . "/" . $newfilename . "." . $imageFileType;

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            return "Sorry, file already exists.";
        }

        // Check file size (500KB limit)
        if ($img["size"] > 500000) {
            $uploadOk = 0;
            return "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            $uploadOk = 0;
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Final upload
        if ($uploadOk == 0) {
            return "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($img["tmp_name"], $target_file)) {
                //return "The file " . basename($target_file) . " has been uploaded.";
                return 'success';
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }

}
?>