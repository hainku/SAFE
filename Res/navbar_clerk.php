<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <img src="/SAFE/Res/images/LOGO.png" alt="SAFE Logo" style="width: 45px; height: auto;" class="d-inline-block align-text-top">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="clerk_homepage.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="manage_products.php" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Products
                    </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="manage_products.php">Product Lists</a></li>
                             <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</a></li>
                            <li><a class="dropdown-item" href="#">Products Report</a></li>
                        </ul>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="../Admin/logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Change Password</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <!--label for="productImage" class="form-label">Product Image</label-->
                        <input class="form-control" type="hidden" id="productImage">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Ingredients</label>
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Nutrition Facts</label>
                        <textarea class="form-control" id="nutritionFacts" name="nutritionFacts" rows="3"></textarea>
                     </div> <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Photo</label>
                        <input type="file" class="form-control" id="productPhoto" name="productPhoto" rows="3"></input>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" name="btnaddproduct">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>