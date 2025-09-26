<?php
require_once'Database.php';
Class User extends Database{
    public function login($un,$pw){
        $sql="select * from tbluser where Username='$un' and Password='$pw'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function changepassword($userid,$pw,$npw1,$npw2){
        $sql="select * from tbluser where UserID='$userid' and Password='$pw'";
        $data=$this->conn->query($sql);
        if($row=$data->fetch_assoc()){
            if($npw1==$npw2){
                $sql="update tbluser set Password='$pw' where UserID='$userid'";
                if($this->conn->query($sql)){
                    return 'Password Successfully Changed';
                }else{
                    return $this->conn->error;
                }
            }else{
                return 'New Password Did Not Match!';
            }
        }else{
            return 'Password Incorrect!';
        }
    }
    public function adduser($userID,$firstname,$lastname,$middlename,$email,$bdate,$address,$contact){
		$date=date('Y-m-d');
		$time=date('H:i:s');
        $dateadded = $date.' '.$time;
        $sql="insert into tblinfo values(NULL,'$userID','$firstname','$lastname','$middlename','$email','$bdate','$address','$contact','$dateadded');";
        $sql.="insert into tbluser values(NULL,'$userID','$userID','$lastname','Clerk','1')";
		if($this->conn->multi_query($sql)){
			return 'User Added';
		}else{
			return $this->conn->error;
		}
	}
    public function displayusers(){
		$sql="select * from tblinfo";
		$data=$this->conn->query($sql);
		return $data;
	}
    public function searchuser($name){
        $sql = "select * from tblinfo where Firstname LIKE '%$name%' or Middlename LIKE '%$name%' or Lastname LIKE '%$name%'";
        $data = $this->conn->query($sql);
        return $data;
    }
}
?>