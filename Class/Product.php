<?php
require_once'Database.php';
Class Product extends Database{
    public function addproducts($productID,$productname,$description,$category,$price,$ingredients,$nutritionfacts,$img){
		$date=date('Y-m-d');
		$time=date('H:i:s');
        $sql="insert into tblproducts values(NULL,'$productID','$productname','$description','$category','$price','$ingredients','$nutritionfacts','$img','$date')";
		if($this->conn->query($sql)){
			return 'Product Added';
		}else{
			return $this->conn->error;
		}
	}
    public function displayproducts(){
		$sql="select * from tblproducts order by ProductName";
		$data=$this->conn->query($sql);
		return $data;
	}
    public function displayproductbyid($pid){
        $sql="select * from tblproducts where ProductID='$pid'";
		$data=$this->conn->query($sql);
		return $data;
    }
    public function searchproducts($productName, $category = '') {
        $sql = "SELECT * FROM tblproducts WHERE 1=1";

        if (!empty($productName)) {
            $sql .= " AND (ProductName LIKE '%$productName%' OR Description LIKE '%$productName%')";
        }

        if (!empty($category)) {
            $sql .= " AND Category = '$category'";
        }

        $data = $this->conn->query($sql);
        return $data;
    }
    public function deleteproduct($productid){
		$sql="delete from tblproducts where ProductID='$productid'";
		if($this->conn->query($sql)){
			return 'Product Deleted!';
		}else{
			return $this->conn->error;
		}
	}
    public function updateproduct($productID,$productname,$description,$category,$price,$ingredients,$nutritionfacts){
		$sql="update tblproducts set ProductName='$productname',Description='$description',Category='$category',Price='$price',Ingredients='$ingredients',NutritionFacts='$nutritionfacts' where ProductID='$productID'";
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
    public function displayscanhistory(){
        $sql="select h.*,q.ProductID,p.ProductName,p.Image from tblscanhistory h left join tblqrcode q on h.ProductCode=q.ProductCode left join tblproducts p on q.ProductID=p.ProductID order by id DESC limit 30";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function totalscancount(){
        $sql="select * from tblscanhistory";
        $data=$this->conn->query($sql);
        return $data;
    }
    
    public function getAuthenticPercentage() {
        $sqlAuthentic = "select COUNT(*) as total_authentic from tblscanhistory where Status='1'";
        $resAuth = $this->conn->query($sqlAuthentic);
        $rowAuth = $resAuth->fetch_assoc();
        $authentic = $rowAuth['total_authentic'];

        $sqlTotal = "select COUNT(*) as total from tblscanhistory";
        $resTotal = $this->conn->query($sqlTotal);
        $rowTotal = $resTotal->fetch_assoc();
        $total = $rowTotal['total'];

        if ($total == 0) {
            return 0;
        }

        return round(($authentic / $total) * 100, 2);
    }
    public function getFakePercentage() {
        $sqlAuthentic = "select count(*) as total_authentic from tblscanhistory where Status='0'";
        $resAuth = $this->conn->query($sqlAuthentic);
        $rowAuth = $resAuth->fetch_assoc();
        $authentic = $rowAuth['total_authentic'];

        $sqlTotal = "select count(*) as total from tblscanhistory";
        $resTotal = $this->conn->query($sqlTotal);
        $rowTotal = $resTotal->fetch_assoc();
        $total = $rowTotal['total'];

        if ($total == 0) {
            return 0;
        }

        return round(($authentic / $total) * 100, 2);
    }

    public function countAuthentic() {
        $sql = "select count(*) as total from tblscanhistory where Status='1'";
        $data = $this->conn->query($sql);
        $row = $data->fetch_assoc();
        return $row['total'];
    }

    public function countFake() {
        $sql = "select count(*) as total from tblscanhistory where Status='0'";
        $data = $this->conn->query($sql);
        $row = $data->fetch_assoc();
        return $row['total'];
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
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif", "webp"])) {
            $uploadOk = 0;
            return "Sorry, only JPG, JPEG, PNG, WEBP & GIF files are allowed.";
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
    public function printqr($gendate){
        $sql="select q.ProductCode,p.ProductName from tblqrcode q inner join tblproducts p on p.ProductID=q.ProductID where q.DateGenerated='$gendate'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function savescan($productcode){
        $date=date("Y-m-d H:i:s");
        $sql="select * from tblqrcode where ProductCode='$productcode'";
        $data=$this->conn->query($sql);
        if($row=$data->fetch_assoc()){
            $stat=1;
        }else{
            $stat=0;
        }
        $sql="insert into tblscanhistory values(NULL,'$productcode','$date','$stat')";
        if($this->conn->query($sql)){
            return 'Success';
        }
        
    }
    public function displayqrlist(){
        $sql="select q.ProductID,q.DateGenerated,p.ProductName from tblqrcode q inner join tblproducts p on p.ProductID=q.ProductID group by q.DateGenerated order by q.id DESC";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function addcategory($categoryname){
        $sql="insert into tblcategory values(NULL,'$categoryname')";
		if($this->conn->query($sql)){
			return 'Category Added';
		}else{
			return $this->conn->error;
		}
	}
    public function displaycategories(){
		$sql="select * from tblcategory";
		$data=$this->conn->query($sql);
		return $data;
	}
    public function searchcategories($categoryname){
		$sql="select * from tblcategory where CategoryName LIKE '%$categoryname%'";
		$data=$this->conn->query($sql);
		return $data;
	}
    public function updatecategory($categoryID,$categoryname){
		$sql="update tblcategory set CategoryName='$categoryname' where id='$categoryID'";
		if($this->conn->query($sql)){
			return 'Category Updated!';
		}else{
			return $this->conn->error;
		}
	}
    public function deletecategory($categoryID){
		$sql="delete from tblcategory where id='$categoryID'";
		if($this->conn->query($sql)){
			return 'Category Deleted';
		}else{
			return $this->conn->error;
		}
	}
}
?>