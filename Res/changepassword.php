
<!-- The Modal -->
<div class="modal" id="changepassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="../Res/images/LOGO.png" alt="Logo" height="40px";>SAFE - Change Password</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container p-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <label for="pw">Enter Password</label>
                    <input type="password" class="form-control text-center" id="pw">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-10">
                    <label for="pw">Enter New Password</label>
                    <input type="password" class="form-control text-center" id="npw1">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-10">
                    <label for="pw">Re-Enter New Password</label>
                    <input type="password" class="form-control text-center" id="npw2">
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnchange">Change Password</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded",function(){
        document.getElementById("btnchange").addEventListener("click",function(){
            const userid="<?=$_SESSION['UserID']?>";
            const pw=document.getElementById("pw").value;
            const npw1=document.getElementById("npw1").value;
            const npw2=document.getElementById("npw2").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    Swal.fire({
                        title: "SAFE",
                        text: this.responseText,
                        icon: "success"
                    });
                }
            };
            xhttp.open("GET", "../Request/changepassword.php?userid="+userid+"&pw="+pw+"&npw1="+npw1+"&npw2="+npw2, true);
            xhttp.send();
        });
    });
</script>