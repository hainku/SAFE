<?php
include_once '../Class/Product.php';
$p = new Product();

// Get and sanitize input
$categoryName = isset($_GET['categoryName']) ? trim($_GET['categoryName']) : '';

// Run search query
$data = $p->searchcategories($categoryName);
$counter = 1;

// If there are results
if ($data && $data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo '
            <tr>
                <td>'.$counter.'</td>
                <td>'.htmlspecialchars($row['CategoryName']).'</td>
                <td class="text-center text-nowrap">
                    <button class="btn btn-sm btn-primary" onclick="editCategory('.$row['id'].', \''.htmlspecialchars($row['CategoryName'], ENT_QUOTES).'\')">
                        <i class="fa-solid fa-pen"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteCategory('.$row['id'].')">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        ';
        $counter++;
    }
} else {
    echo '
        <tr>
            <td colspan="3" class="text-center text-muted">No categories found.</td>
        </tr>
    ';
}
?>
