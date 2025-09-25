<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
    if(!isset($_SESSION['UserID'])){
        header('Location:../index.php');
    }else{
  }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <?php include_once '../Res/includes.php'; ?>
    <?php include_once '../Res/navbar_admin.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<?php
    include_once'../Class/Product.php'; 
    $p=new Product(); 

    $authenticCount = $p->countAuthentic();
    $fakeCount = $p->countFake();
?>
<div class="container py-4">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Scans</h5>
                    <?php
                        $data = $p->displayscanhistory();
                        $total = $data->num_rows;

                        echo '
                            <p class="fs-4 fw-bold text-primary">'.$total.'</p>
                        ';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Authentic Product Scans</h5>
                    <?php
                        $authenticPercentage = $p->getAuthenticPercentage();

                        echo '
                            <p class="fs-4 fw-bold text-success">'.$authenticPercentage.'%</p>
                        ';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Fake Product Scans</h5>
                    <?php
                        $fakePercentage = $p->getFakePercentage();

                        echo '
                            <p class="fs-4 fw-bold text-danger">'.$fakePercentage.'%</p>
                        ';
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Graph -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Authentic vs Fake Scans</h5>
            <canvas id="scanChart" height="100"></canvas>
        </div>
    </div>

    <!-- Filter + Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title">Real-Time Data History</h5>
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Filter data...">
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Scan Date</th>
                        </tr>
                    </thead>
                    <tbody id="scanTable">
                        <?php
                            $data = $p->displayscanhistory();
                            $counter = 1; 

                            while($row = $data->fetch_assoc()){
                                if ($row['Status'] == 1) {
                                    $statusLabel = '<span class="badge bg-success">Authentic</span>';
                                } else {
                                    $statusLabel = '<span class="badge bg-danger">Fake</span>';
                                }

                                echo '
                                    <tr>
                                        <td>'.$counter.'</td>
                                        <td>Product</td>
                                        <td>'.$statusLabel.'</td>
                                        <td>'.$row['DateScanned'].'</td>
                                    </tr>
                                ';
                                $counter++;
                            }
                            ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Bootstrap + Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Bar Chart Example
    const ctx = document.getElementById('scanChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Authentic', 'Fake'],
            datasets: [{
                label: 'Scans',
                data: [<?= $authenticCount ?>, <?= $fakeCount ?>], 
                backgroundColor: ['#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Table Filter
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#scanTable tr');
        rows.forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>

</body>
</html>