<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./head_back-end.php');
include('./header_back-end.php');

require_once __DIR__ . '/vendor/autoload.php';
?>

<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>รายงานสินค้าคงเหลือ</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">รายงานสินค้าคงเหลือ</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <?php
          $header = '
          <div class="card-header">
            <h2 class="card-title" align="center">รายงานสินค้าคงเหลือ</h2>
          </div>'
          ?>
          <div class="card-content">
            <div class="card-body">
              <?php
              $date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
              $query = "SELECT product_id, 
              product_name, 
              SUM(product_quantity) AS total_quantity, 
              product_date
              -- DATE_FORMAT(DATE_ADD(product_date, INTERVAL 543 YEAR), '%d-%m-%Y') AS product_date
              FROM tb_product 
              -- WHERE product_quantity NOT IN ('0')
              GROUP BY DATE_FORMAT(product_date, '%d%')
              ORDER BY DATE_FORMAT(product_date, '%Y-%m-%d') DESC";
              $result = $conn->query($query); # query ข้อมูลในฐานข้อมูลมาแสดง
              $resultchart = $conn->query($query); # query ข้อมูลในฐานข้อมูลมาแสดง
              //for chart
              $datesave = array();
              $total = array();
              while ($rs = $resultchart->fetch_array()) { # ส่งค่ากลับมาแบบ array key เป็นชื่อ field
                $date_sets = date_create($rs["product_date"]);
                $days = date_format($date_sets, "d");
                $months = $date_th[date_format($date_sets, "n")];
                $years = date_format($date_sets, "Y") + 543;
                $datesave[] = "\"" .$days. " " .$months. " " .$years. "\"";
                $total[] = "\"" . $rs['total_quantity'] . "\"";
              }
              $datesave = implode(",", $datesave);
              $total = implode(",", $total);
              ?>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
              <hr>
              <p align="center">
                <!--devbanban.com-->
                <canvas id="myChart" width="800px" height="300px"></canvas>
                <script>
                  var ctx = document.getElementById("myChart").getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: [<?php echo $datesave; ?>

                      ],
                      datasets: [{
                        label: 'รายงานจำนวนสินค้าคงเหลือ แยกตามวัน',
                        data: [<?php echo $total; ?>],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }]
                      }
                    }
                  });
                </script>
              </p>
              <?php
              ob_start();
              $head = '
                              <style type="text/css">
                              body{
                                font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
                              }
                              .order-container {
                                font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
                                margin:0px auto;
                                width:950px;
                                font-size:14px;
                              }
                              .order-head {
                                margin:50px 0 10px 0;
                              }
                              .order-title {
                                text-align:center;
                                font-size:24px;
                                font-weight:bold;
                              }
                              .order-head .order-customer {
                                float:left;
                                margin:10px 0 10px 0;
                                padding:5px;
                              }
                              .order-head .order-date {
                                text-align:right;
                                margin:10px 0 10px 0;
                                float:right;
                                padding:5px;
                              }
                              .order-underline {
                                border-bottom:#000 1px dashed;
                              }
                              .clear {
                                clear:both;
                              }
                              </style>';
              ?>
              <!-- table hover -->
              <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" width="40">ลำดับ</th>
                      <th class="text-center" width="90">รหัสสินค้า</th>
                      <th class="text-left" align="left" width="130">วันที่</th>
                      <th width="200" align="left">ชื่อสินค้า</th>
                      <th align="left" width="50">ยี่ห้อ</th>
                      <th align="left" width="60">ประเภท</th>
                      <th class="text-center">เหลือ (ชิ้น)</th>
                      <!-- <th>ACTION</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM tb_product 
                    LEFT JOIN
                    tb_brand
                    ON
                    tb_product.brand_id = tb_brand.brand_id
                    LEFT JOIN
                    tb_category
                    ON
                    tb_product.category_id = tb_category.category_id
                    -- WHERE product_quantity NOT IN ('0')
                    ORDER BY product_date ASC
                    ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                        $date_set = date_create($row["product_date"]);
                        $day = date_format($date_set, "d");
                        $month = $date_th[date_format($date_set, "n")];
                        $year = date_format($date_set, "Y") + 543;
                    ?>
                        <tr>
                          <td class="text-center" align="center"><?php echo $i; ?></td>
                          <td class="text-center" align="center"><?php echo $row["product_id"]; ?></td>
                          <td class="text-left"><?php echo $day . " " . $month . " " . $year; ?></td>
                          <td class="text-bold-500"><?php echo $row["product_name"]; ?></td>
                          <td class="text-bold-500"><?php echo $row["brand_name"]; ?></td>
                          <td class="text-bold-500" align="left"><?php echo $row["category_name"]; ?></td>
                          <td class="text-center" align="center"><?php echo $row["product_quantity"]; ?></td>
                        </tr>
                      <?php
                        $i++;
                        @$product_quantity += $row['product_quantity'];
                      } //while condition closing bracket
                      ?>
                      <tr>
                        <td class="text-right" align="right" colspan="6"><strong>จำนวนทั้งหมด</strong></td>
                        <td class="text-center" align="center"><?php echo $product_quantity; ?></td>
                      </tr>
                    <?php
                    }  //if condition closing bracket
                    ?>
                  </tbody>
                </table>
                <!-- <button onclick="window.print()">Print </button>  -->
              </div>
              <br>
              <?php
              $html = ob_get_contents();
              $mpdf = new \Mpdf\Mpdf();
              $mpdf->WriteHTML($head);
              $mpdf->WriteHTML($header);
              $mpdf->WriteHTML($html);
              $mpdf->Output("report_product.pdf");
              ?>
              <a href="report_product.pdf" class="btn btn-primary btn-block">ออกรายงาน</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<?php include("./footer_back-end.php"); ?>