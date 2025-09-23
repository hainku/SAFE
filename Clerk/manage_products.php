<?php 
    function generateProductID($length = 5) {
        $random = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
        return "PRODUCT-" . $random; 
    }

    function generateProductCode($length = 20) {
        return substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", 5)), 0, $length);
    }

    $productID = generateProductID();
    $productCode = generateProductCode();
    
    include_once'../Class/Product.php'; 
    $p=new Product(); 
    if(isset($_POST['btnaddproduct'])){ 
        $productname=$_POST['productName']; 
        $description=$_POST['productDescription']; 
        $price=$_POST['price'];
        $ingredients=$_POST['ingredients'];
        $nutritionfacts=$_POST['nutritionFacts'];
        $img=$_FILES['prodPhoto'];
        $imageFileType = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
        $imageName = $productID.'.'.$imageFileType;

        $res= $p->uploadphoto($img,'../Res/images/',$productID);
        if($res=='success'){
            echo'
                <script>
                    alert("'.$p->addproducts($productID,$productname,$description,$price,$ingredients,$nutritionfacts,$imageName).'");
                </script>
            ';
        }else{
            echo $res;
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Homepage</title>
        <?php include_once '../Res/includes.php'; ?>
        <?php include_once '../Res/navbar_clerk.php'; ?>
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="row mb-4 align-items-center justify-content-between">
                <div class="col-md-3 mb-2 mb-md-0">
                    <form class="d-flex">
                        <input class="form-control me-2" id="searchproduct" type="search" placeholder="Search product..." aria-label="Search">
                    </form>
                </div>
                
                <div class="col-md-6 text-md-end text-center">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </button>
                </div>
            </div>
            <div class="row g-4 mt-5" id="productlist">
            <?php
                $data=$p->displayproducts();
                while($row = $data->fetch_assoc()){
                    echo'
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="../Res/images/2.webp" class="card-img-top" alt="Product 1">
                                <div class="card-body d-flex flex-column">
                                <h5 class="card-title">'.$row['ProductName'].'</h5>
                                <p class="card-text text-muted">'.substr($row['Description'], 0, 100) . (strlen($row['Description']) > 100 ? '...' : '').'</p>
                                <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#viewProductModal" onclick="loaddetails(&quot;'.$row['ProductID'].'&quot;)">View</button>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
            </div>
        </div>
    </body>
</html>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
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
                    </div>
                    </div> <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Photo</label>
                        <input type="file" class="form-control" id="prodPhoto" name="prodPhoto" accept="image/*">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" name="btnaddproduct">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Product Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="viewProductModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body overflow-auto" style="max-height: 60vh;">
                <div class="container">
                    <img src="../Res/images/2.webp" class="img-fluid rounded mb-3" alt="Product Image">
                    <h5 id="pname">Product Name</h5>
                    <input type="text" id="pname_edit" class="form-control d-none"/>
                    <span class="fst-italic" id="prodid" style="display:block; margin-top:-0.7em; display:none;"><small>Product ID</small></span>
                    <p id="pdesc">Product Description</p>
                    <p><strong>Price:</strong> <span id="pprice">Price</span></p>
                    <p><strong>Ingredients:</strong> <span id="pingredients">Ingredients</span></p>
                    <p><strong>Nutrition Facts:</strong> <span id="pnutrifacts">Nutrition Facts</span></p>
                    
                </div>
            
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-4">
                        <label for="quantity" class="text-secondary fw-bold">Quantity</label>
                        <input type="number" min="1" class="form-control border-secondary" name="quantity" id="quantity">
                    </div>
                    <div class="col-md-5">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-secondary form-control" id="btngenerate">Generate QRCode</button>
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <div class="d-flex flex-column">
                            <button class="btn btn-primary form-control mb-2" id="btnedit">Edit</button>
                            <button class="btn btn-success form-control d-none" id="btnsave">Save</button>
                        </div>
                    </div>

                    <p class="fst-italic" style="font-size: 10px;">**Put how many QR codes you want to generate</p>
                </div>
               
            </div>
        </div>
    </div>
</div>


<script>
    function loaddetails(pid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data=JSON.parse(this.responseText);
            document.getElementById("pname").innerHTML=data[0]["ProductName"];
            document.getElementById("pdesc").innerHTML=data[0]["Description"];
            document.getElementById("prodid").innerHTML=data[0]["ProductID"];
            document.getElementById("pprice").innerHTML=data[0]["Price"];
            document.getElementById("pingredients").innerHTML=data[0]["Ingredients"];
            document.getElementById("pnutrifacts").innerHTML=data[0]["NutritionFacts"];
        }
    };
    xhttp.open("GET", "../Request/searchproduct.php?pid="+pid, true);
    xhttp.send();
    }

    document.addEventListener("DOMContentLoaded",function(){
        document.getElementById("btngenerate").addEventListener("click",function(){
            const quantity=document.getElementById("quantity").value;
            const pid=document.getElementById("prodid").innerHTML;
            window.open("generateqr.php?pid="+pid+"&quantity="+quantity,"_new");
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchproduct");

        searchInput.addEventListener("keyup", function() {
            const query = searchInput.value.trim();

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("productlist").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../Request/searchproductlist.php?productName=" + encodeURIComponent(query), true);
            xhttp.send();
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const btnEdit = document.getElementById("btnedit");
        const btnSave = document.getElementById("btnsave");

        btnEdit.addEventListener("click", function() {
            // Turn text into inputs
            const pname = document.getElementById("pname");
            pname.outerHTML = `<input type="text" class="form-control mb-2" id="pname" value="${pname.innerText}">`;

            const pdesc = document.getElementById("pdesc");
            pdesc.outerHTML = `<textarea class="form-control mb-2" id="pdesc">${pdesc.innerText}</textarea>`;

            const pingredients = document.getElementById("pingredients");
            pingredients.outerHTML = `<textarea class="form-control mb-2" id="pingredients">${pingredients.innerText}</textarea>`;

            const pnutrifacts = document.getElementById("pnutrifacts");
            pnutrifacts.outerHTML = `<textarea class="form-control mb-2" id="pnutrifacts">${pnutrifacts.innerText}</textarea>`;

            const pprice = document.getElementById("pprice");
            pprice.outerHTML = `<input type="number" step="0.01" class="form-control mb-2" id="pprice" value="${pprice.innerText}">`;

            // Toggle buttons
            btnEdit.classList.add("d-none");
            btnSave.classList.remove("d-none");
        });

        btnSave.addEventListener("click", function() {
            const pid = document.getElementById("prodid").innerText;
            const updatedData = {
                ProductID: pid,
                ProductName: document.getElementById("pname").value,
                Description: document.getElementById("pdesc").value,
                Ingredients: document.getElementById("pingredients").value,
                NutritionFacts: document.getElementById("pnutrifacts").value,
                Price: document.getElementById("pprice").value
            };

            // AJAX call to update DB
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../Request/updateproduct.php", true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    Swal.fire({
                    title: "Success",
                    text: this.responseText,
                    icon: "success"
                    });

                    // Replace inputs back with text
                    document.getElementById("pname").outerHTML = `<h5 id="pname">${updatedData.ProductName}</h5>`;
                    document.getElementById("pdesc").outerHTML = `<p id="pdesc">${updatedData.Description}</p>`;
                    document.getElementById("pingredients").outerHTML = `<span id="pingredients">${updatedData.Ingredients}</span>`;
                    document.getElementById("pnutrifacts").outerHTML = `<span id="pnutrifacts">${updatedData.NutritionFacts}</span>`;
                    document.getElementById("pprice").outerHTML = `<span id="pprice">${updatedData.Price}</span>`;

                    // Toggle buttons back
                    btnEdit.classList.remove("d-none");
                    btnSave.classList.add("d-none");
                }
            };
            xhttp.send(JSON.stringify(updatedData));
        });
    });
</script>