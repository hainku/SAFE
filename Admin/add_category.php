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
    include_once'../Class/Product.php'; 
    $p=new Product(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clerk Homepage</title>
        <?php include_once '../Res/includes.php'; ?>
        <?php include_once '../Res/navbar_clerk.php'; ?>
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="row mb-4 align-items-center justify-content-between">
                <div class="col-md-3 mb-2 mb-md-0">
                    <form class="d-flex">
                        <input class="form-control me-2" id="searchcategory" type="search" placeholder="Search category..." aria-label="Search">
                    </form>
                </div>
                
                <div class="col-md-6 text-md-end text-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategory">
                        <i class="bi bi-plus-circle"></i> Add Category
                    </button>
                </div>
            </div>
            <div class="row g-4 mt-5" id="productlist">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead >
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Category Name</th>
                                <th style="width: 20%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="categorydetails">
                            <?php
                                $data=$p->displaycategories();
                                $counter = 1; 
                                while($row = $data->fetch_assoc()){
                                    echo '
                                        <tr>
                                            <td>'.$counter.'</td>
                                            <td>'.$row['CategoryName'].'</td>
                                            <td class="text-center text-nowrap">
                                                <button class="btn btn-sm btn-primary" onclick="editCategory(' . $row['id'] . ', \'' . htmlspecialchars($row['CategoryName'], ENT_QUOTES) . '\')">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="deleteCategory(' . $row['id'] . ')">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </td>
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
        <?php
            include_once'../Res/footer_clerk.php';
        ?>
    </body>
</html>

<!-- ✅ Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addCategoryLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" id="categoryName" name="categoryName" class="form-control" placeholder="Enter category name">
                    </div>
                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-success" id="btnaddcategory">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editCategoryId">
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="editCategoryName">
                </div>
                <div class="d-grid mt-4">
                    <button class="btn btn-primary" onclick="updateCategory()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>  
    document.addEventListener("DOMContentLoaded", function () {
        const btnAddCategory = document.getElementById("btnaddcategory");

        btnAddCategory.addEventListener("click", function (e) {
            e.preventDefault(); // prevent form submit

            const categoryName = document.getElementById("categoryName").value.trim();
            if (categoryName === "") {
                Swal.fire({
                    title: "SAFE",
                    text: "Please enter a category name.",
                    icon: "warning"
                });
                return;
            }

            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    Swal.fire({
                        title: "SAFE",
                        text: this.responseText,
                        icon: "success"
                    }).then(() => {
                        // ✅ Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById("addCategoryModal"));
                        if (modal) modal.hide();

                        // ✅ Reload page (same as in updateCategory)
                        location.reload();
                    });
                }
            };
            xhttp.open("POST", "../Request/add_category.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("categoryName=" + encodeURIComponent(categoryName));
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchcategory"); // your search input ID

        searchInput.addEventListener("input", function() {
            const query = searchInput.value.trim();

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("categorydetails").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../Request/searchcategory.php?categoryName=" + encodeURIComponent(query), true);
            xhttp.send();
        });
    });

    // ✅ Edit Category
    function editCategory(id, name) {
        document.getElementById("editCategoryId").value = id;
        document.getElementById("editCategoryName").value = name;
        new bootstrap.Modal(document.getElementById("editCategoryModal")).show();
    }

    function updateCategory() {
        const id = document.getElementById("editCategoryId").value;
        const name = document.getElementById("editCategoryName").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                Swal.fire({
                    title: "SAFE",
                    text: this.responseText,
                    icon: "success"
                }).then(() => location.reload());
            }
        };
        xhttp.open("POST", "../Request/update_category.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id + "&name=" + encodeURIComponent(name));
    }

    // ✅ Delete Category
    function deleteCategory(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "This will delete the category permanently.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: this.responseText,
                            icon: "success"
                        }).then(() => location.reload());
                    }
                };
                xhttp.open("GET", "../Request/delete_category.php?id=" + id, true);
                xhttp.send();
            }
        });
    }
</script>