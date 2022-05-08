<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./head_back-end.php');
include('./header_back-end.php');

require_once __DIR__ . '/vendor/autoload.php';
$date1 = null;
$date2 = null;

if(ISSET($_POST['search'])){
  $date1 = date("Y-m-d", strtotime($_POST['date1']));
  $date2 = date("Y-m-d", strtotime($_POST['date2']));
}
$date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
$date_set1 = date_create($date1);
$day1 = date_format($date_set1, "d");
$month1 = $date_th[date_format($date_set1, "n")];
$year1 = date_format($date_set1, "Y") + 543;
$datesave1 = "".$day1. " " .$month1. " " .$year1. "";
$date_set2 = date_create($date2);
$day2 = date_format($date_set2, "d");
$month2 = $date_th[date_format($date_set2, "n")];
$year2 = date_format($date_set2, "Y") + 543;
$datesave2 = "".$day2. " " .$month2. " " .$year2. "";
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
        <h3>รายงานการขายสินค้า</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">รายงานการขายสินค้า</li>
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
            <h2 class="card-title" align="center">รายงานการขายสินค้า</h2>
          </div>';
          $date = '
          <div class="input-group mb-3" align="center">
            <label class="input-group-text" align="center">วันที่</label>
            <label type="date" class="form-control" placeholder="Start">'.$datesave1.'</label>
            <label class="input-group-text">ถึง</label>
            <label type="date" class="form-control" placeholder="End">'.$datesave2.'</label>
          </div>
          <br>
          ';
          ?>
          <div class="card-content">
            <div class="card-body">
            <?php
              $date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
              $query = "SELECT 
              tb_order.order_id, 
              tb_order.order_date, 
              SUM(tb_order.order_total) AS total_order, 
              tb_order.order_name, 
              tb_order.order_tel, 
              tb_order.order_total
              FROM tb_order 
              LEFT JOIN
              tb_status
              ON
              tb_order.status_id = tb_status.status_id 
              WHERE tb_order.status_id = '2'
              AND tb_order.order_date BETWEEN '$date1' AND '$date2'
              GROUP BY DATE_FORMAT(tb_order.order_date, '%d%')
              ORDER BY DATE_FORMAT(tb_order.order_date, '%Y-%m-%d') DESC";
              $result = mysqli_query($conn, $query);
              $resultchart = mysqli_query($conn, $query);
              //for chart
              $datesave = array();
              $total = array();
              while ($rs = mysqli_fetch_array($resultchart)) {
                $date_sets = date_create($rs["order_date"]);
                $days = date_format($date_sets, "d");
                $months = $date_th[date_format($date_sets, "n")];
                $years = date_format($date_sets, "Y") + 543;
                $datesave[] = "\"" .$days. " " .$months. " " .$years. "\"";
                $total[] = "\"" . $rs['total_order'] . "\"";
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
                        label: 'รายงานการขายสินค้า',
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
              <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">
                <div class="input-group mb-3">
                  <label class="input-group-text">วันที่</label>
                  <input type="date" class="form-control" placeholder="Start" name="date1"/>
                  <label class="input-group-text">ถึง</label>
                  <input type="date" class="form-control" placeholder="End"  name="date2"/>
                  <button class="btn-primary input-group-text" name="search"><i class="bi bi-search"></i></button>
                  <a href="./report_sale.php" type="button" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                </div>
              </form>
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
                        <th class="text-center" align="center" width="20">ลำดับ</th>
                        <th class="text-center" align="center" width="130">เลขที่สั่งซื้อ</th>
                        <th class="text-left" align="left" width="130">วันที่</th>
                        <th align="left">ชื่อ - นามสกุล</th>
                        <th class="text-center" width="120" align="center">เบอร์โทรศัพท์</th>
                        <th class="text-right" width="80" align="right">ราคารวม</th>
                        <!-- <th>ACTION</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $total = 0;
                      $sql = "SELECT 
                      tb_order.order_id, 
                      tb_order.order_date, 
                      tb_order.order_name, 
                      tb_order.order_tel, 
                      tb_status.status_name,
                      tb_order.order_total
                      FROM tb_order 
                      LEFT JOIN
                      tb_user
                      ON
                      tb_order.user_id = tb_user.user_id 
                      LEFT JOIN
                      tb_status
                      ON
                      tb_order.status_id = tb_status.status_id 
                      WHERE tb_order.status_id = '2'
                      AND tb_order.order_date BETWEEN '$date1' AND '$date2'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                          $date_set = date_create($row["order_date"]);
                          $day = date_format($date_set, "d");
                          $month = $date_th[date_format($date_set, "n")];
                          $year = date_format($date_set, "Y")+543;
                      ?>
                      <tr>
                        <td class="text-center" align="center"><?php echo $i; ?></td>
                        <td class="text-center" align="center"><?php echo $row["order_id"]; ?></td>
                        <td class="text-left"><?php echo $day." ".$month." ".$year; ?></td>
                        <td class="text-bold-500"><?php echo $row["order_name"]; ?></td>
                        <td class="text-center" align="center"><?php echo $row["order_tel"]; ?></td>
                        <td class="text-right" align="right"><?php echo number_format($row["order_total"], 2); ?></td>
                      </tr>
                      <?php
                      $total += $row["order_total"];
                      $i++;
                        } //while condition closing bracket
                      }  //if condition closing bracket
                      else {
                      ?>
                      <tr>
                        <td class="text-center" align="center" colspan="6" >ไม่มีข้อมูล</td>
                      <tr>
                      <?php
                      }
                      ?>
                      <tr>
                        <td colspan="5" align="right"><strong>รวมเงินทั้งสิ้น</strong></td>
                        <td align="right"><?php echo number_format($total, 2); ?></td>
                      </tr>
                    </tbody>
                  </table>
                <!-- <button onclick="window.print()">Print </button>  -->
              </div>
              <br>
              <?php
              $html=ob_get_contents();
              $mpdf = new \Mpdf\Mpdf();
              $mpdf->WriteHTML($head);
              $mpdf->WriteHTML($header);
              $mpdf->WriteHTML($date);
              $mpdf->WriteHTML($html);
              $mpdf->Output("report_sale.pdf");
              ?>
              <a href="report_sale.pdf" class="btn btn-primary btn-block">ออกรายงาน</a>
            </div>  
          </div>       
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<?php include("./footer_back-end.php"); ?>