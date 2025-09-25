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
                echo'New Password Did Not Match!';
            }
        }else{
            echo'Password Incorrect!';
        }
    }
}
?>