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
                        $data2=$p->totalscancount();
                        $total = $data2->num_rows;

                        echo '
                            <p class="fs-4 fw-bold text-primary" id="total">'.$total.'</p>
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
                            <p class="fs-4 fw-bold text-success" id="authentic">'.$authenticPercentage.'%</p>
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
                            <p class="fs-4 fw-bold text-danger" id="fake">'.$fakePercentage.'%</p>
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
                            <th>Product Information</th>
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
                                $img=$row['Image']!='' ? $row['Image'] : 'default-product.png';
                                $dt=strtotime($row['DateScanned']);
                                echo '
                                    <tr>
                                        <td>'.$counter.'</td>
                                        <td>
                                            <div class="d-flex">
                                                <div>
                                                    <img height="40px" src="../Res/Images/'.$img.'">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div><span class="fw-bold">'.$row['ProductName'].'</span> <span class="fst-italic"><small>'.$row['ProductID'].'</small></span></div>
                                                    <div class="text-secondary"><small>'.substr($row['ProductCode'],0,15).'.....'.'</small></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>'.$statusLabel.'</td>
                                        <td>'.date("M. d, Y - h:i:s A",$dt).'</td>
                                    </tr>
                                ';
                                $counter++;
                            }
                            ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <!--nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav-->
        </div>
    </div>
</div>

<!-- Bootstrap + Chart.js Script -->
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script-->
<script>
let scanChart = null; // global chart variable

function initChart(authenticcount, fakecount) {
    const ctx = document.getElementById('scanChart').getContext('2d');
    scanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Authentic', 'Fake'],
            datasets: [{
                label: 'Scans',
                data: [authenticcount, fakecount],
                backgroundColor: ['#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
}

// initialize once
initChart(<?= $authenticCount ?>, <?= $fakeCount ?>);

function updatedata() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);

            // update counters always
            document.getElementById("total").innerHTML = res.total;
            document.getElementById("authentic").innerHTML = res.authenticpercentage + "%";
            document.getElementById("fake").innerHTML = res.fakepercentage + "%";

            // check if chart data actually changed
            let oldData = scanChart.data.datasets[0].data;
            if (oldData[0] !== res.authentic || oldData[1] !== res.fake) {
                scanChart.data.datasets[0].data = [res.authentic, res.fake];
                scanChart.update();
                var tbldata="";
                //console.log(JSON.stringify(res.tabledata));
                var cnt=0;
                res.tabledata.forEach(row=>{
                    cnt++;
                    var img;
                    var statlabel;
                    if(row['Image']==""){img="default-product.png";}
                    else{img=row['Image'];}
                    if(row['Status']==1){statlabel='<span class="badge bg-success">Authentic</span>';}
                    else{statlabel='<span class="badge bg-danger">Fake</span>';}
                    tbldata+=`
                        <tr>
                            <td>${cnt}</td>
                            <td>
                                <div class="d-flex">
                                    <div>
                                        <img height="40px" src="../Res/Images/default-product.png">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><span class="fw-bold">${row['ProductName']}</span> <span class="fst-italic"><small>${row['ProductID']}</small></span></div>
                                        <div class="text-secondary"><small>${row['ProductCode'].slice(0,-15)}...</small></div>
                                    </div>
                                </div>
                            </td>
                            <td>${statlabel}</td>
                            <td>${formatDate(row['DateScanned'])}</td>
                        </tr>
                    `;
                });
                document.getElementById("scanTable").innerHTML=tbldata;
            }
        }
    };
    xhttp.open("GET", "../Request/updatedata.php", true);
    xhttp.send();
}

setInterval(updatedata, 1000);


function formatDate(dateString) {
    const date = new Date(dateString);

    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    const month = months[date.getMonth()];            // "M"
    const day = String(date.getDate()).padStart(2, "0"); // "d"
    const year = date.getFullYear();                  // "Y"

    let hours = date.getHours();                      // 0–23
    const minutes = String(date.getMinutes()).padStart(2, "0");
    const seconds = String(date.getSeconds()).padStart(2, "0");

    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12; // convert to 12-hour format

    return `${month}-${day},${year} ${hours}:${minutes}:${seconds} ${ampm}`;
}

</script>
