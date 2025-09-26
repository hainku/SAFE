<?php
Class Session{
    public function __construct($role,$path){
        if($_SESSION['Role']!=$role){
            header('location:../'.$path);
            exit();
        }
    }
}
?>