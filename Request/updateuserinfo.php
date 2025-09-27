<?php
require_once("../Class/User.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID     = $_POST['edituserID'] ?? '';
    $lastname   = $_POST['editlastName'] ?? '';
    $firstname  = $_POST['editfirstName'] ?? '';
    $middlename = $_POST['editmiddleName'] ?? '';
    $email      = $_POST['editemail'] ?? '';
    $bdate      = $_POST['editbDate'] ?? '';
    $address    = $_POST['editaddress'] ?? '';
    $contact    = $_POST['editcontact'] ?? '';

    if (!empty($userID)) {
        $u = new User();
        $result = $u->updateuserinfo($userID, $lastname, $firstname, $middlename, $email, $bdate, $address, $contact);

        echo $result; 
    } else {
        echo "User ID is missing.";
    }
} else {
    echo "Invalid request method.";
}
