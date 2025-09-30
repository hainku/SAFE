<?php
include_once '../Class/User.php';
$u = new User();

$name = isset($_GET['name']) ? $_GET['name'] : '';

$data = $u->searchuser($name); 

$counter = 1; 

while($row = $data->fetch_assoc()){
    $dt=strtotime($row['DateAdded']);
    echo '
        <tr>
            <td>'.$counter.'</td>
            <td>'.$row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname'].'</td>
            <td>'.$row['Email'].'</td>
            <td>'.$row['Contact'].'</td>
            <td>'.$row['Birthdate'].'</td>
            <td>'.$row['Address'].'</td>
            <td>'.date("M. d, Y - h:i:s A",$dt).'</td>
            <td><button type="submit" class="btn btn-success btn-sm" name="viewuser" data-bs-toggle="modal" data-bs-target="#updateUserModal" onclick="userinfo(&quot;'.$row['UserID'].'&quot;,&quot;'.$row['Firstname'].'&quot;,&quot;'.$row['Lastname'].'&quot;,&quot;'.$row['Middlename'].'&quot;,&quot;'.$row['Email'].'&quot;,&quot;'.$row['Birthdate'].'&quot;,&quot;'.$row['Address'].'&quot;,&quot;'.$row['Contact'].'&quot;)">Edit</button></td>
        </tr>
    ';
    $counter++;
}
?>
