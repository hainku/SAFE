<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
      include_once'../Class/Session.php';
      $s=new Session('admin','Clerk/clerk_homepage.php');
  }
?>

<?php 
    function generateUserID($length = 5) {
        $random = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
        return "USER-" . $random; 
    }

    $userID = generateUserID();
    
    include_once'../Class/User.php'; 
    $u=new User(); 
    if(isset($_POST['btnadduser'])){ 
        $firstname=$_POST['firstName']; 
        $lastname=$_POST['lastName']; 
        $middlename=$_POST['middleName'];
        $email=$_POST['email'];
        $bdate=$_POST['bDate'];
        $address=$_POST['address'];
        $contact=$_POST['contactNumber'];
      
        $result = $u->adduser($userID, $firstname, $lastname, $middlename, $email, $bdate, $address, $contact);

        $isSuccess = (stripos($result, 'added') !== false || stripos($result, 'success') !== false);

        $msgJs = json_encode($result);

        echo "
          <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: " . ($isSuccess ? "'Success'" : "'Error'") . ",
                    text: {$msgJs},
                    icon: " . ($isSuccess ? "'success'" : "'error'") . ",
                    confirmButtonText: 'OK'
                }).then(function() {
                    // optional: redirect on success
                    if (" . ($isSuccess ? 'true' : 'false') . ") {
                        window.location = 'manage_users.php';
                    }
                });
            });
          </script>
        ";
       
    } 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage User</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_admin.php'; ?>
    <body class="bg-light">
        <div class="container my-5">
            <div class="row mb-4 align-items-center justify-content-between">
                <div class="col-md-3 mb-2 mb-md-0">
                    <form class="d-flex">
                        <input class="form-control me-2" id="searchuser" type="search" placeholder="Search User..." aria-label="Search">
                    </form>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-circle"></i> Add New User
                    </button>
                </div>
            </div>
            <div class="row g-4 mt-5" id="userslist">
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                      <tr>
                          <th></th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact Number</th>
                          <th>Birth Date</th>
                          <th>Address</th>
                          <th>Date Added</th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody id="userdetails">
                        <?php
                            $u=new User(); 
                            $data = $u->displayusers();
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
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </body>
</head>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="addUserModalLabel">Add User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <label for="firstName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                  </div>
                  <div class="col-md-4">
                    <label for="lastName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                  </div>
                  <div class="col-md-4">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="col-md-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="contactNumber" name="contactNumber" required>
                  </div>
                  <div class="col-md-3">
                    <label for="bDate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="bDate" name="bDate" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                  </div>
                </div> 
              </div>
              <div class="modal-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-success" name="btnadduser">Add User</button>
                      </div>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>

<!-- Update User Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="updateUserModalLabel">Update User Info</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="updateUserForm">
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" id="edituserID" name="edituserID">
                  <div class="col-md-4">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="editlastName" name="editlastName" required>
                  </div>
                  <div class="col-md-4">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="editfirstName" name="editfirstName" required>
                  </div>
                  <div class="col-md-4">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="editmiddleName" name="editmiddleName" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="editemail" name="editemail" required>
                  </div>
                  <div class="col-md-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="editcontact" name="editcontact" required>
                  </div>
                  <div class="col-md-3">
                    <label for="bDate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="editbDate" name="editbDate" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="editaddress" name="editaddress" required>
                  </div>
                </div> 
              </div>
              <div class="modal-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-success" onclick="updateinfo()">Update</button>
                      </div>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchuser");

    searchInput.addEventListener("input", function() {
        const query = searchInput.value.trim();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userdetails").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../Request/searchuser.php?name=" + encodeURIComponent(query), true);
        xhttp.send();
    });
  });

  function userinfo(userID, firstname, lastname, middlename, email, birthdate, address, contact) {
    document.getElementById("edituserID").value = userID;
    document.getElementById("editfirstName").value = firstname;
    document.getElementById("editlastName").value = lastname;
    document.getElementById("editmiddleName").value = middlename;
    document.getElementById("editemail").value = email;
    document.getElementById("editbDate").value = birthdate;
    document.getElementById("editaddress").value = address;
    document.getElementById("editcontact").value = contact;
  }

  document.addEventListener("DOMContentLoaded", function () {
    const updateForm = document.getElementById("updateUserForm");

    updateForm.addEventListener("submit", function (e) {
      e.preventDefault(); 

      const formData = new FormData(updateForm);

      fetch("../Request/updateuserinfo.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          Swal.fire({
            title: "Update Successful",
            text: data,
            icon: "success"
          }).then(() => {
            
            const modal = bootstrap.Modal.getInstance(document.getElementById("updateUserModal"));
            modal.hide();

            window.location.reload();
          });
        })
        .catch(error => {
          Swal.fire({
            title: "Error",
            text: "Something went wrong: " + error,
            icon: "error"
          });
        });
    });
  });

</script>