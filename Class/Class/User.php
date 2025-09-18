<?php
require_once'Database.php';
Class User extends Database{
    public function login($un,$pw){
        $sql="select * from tbluser where Username='$un' and Password='$pw'";
        $data=$this->conn->query($sql);
        return $data;
    }
}
?>