<?php
$query = "SELECT product_id, product_name, SUM(product_quantity) AS total_quantity, DATE_FORMAT(product_date, '%Y') AS product_date
FROM tb_product 
GROUP BY DATE_FORMAT(product_date, '%Y%')
ORDER BY DATE_FORMAT(product_date, '%Y') DESC";
$result = mysqli_query($conn, $query);
$resultchart = mysqli_query($conn, $query);
//for chart
$datesave = array();
$total = array();
while ($rs = mysqli_fetch_array($resultchart)) {
  $datesave[] = "\"" . $rs['product_date'] . "\"";
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
          label: 'รายงานจำนวนสินค้าคงเหลือ แยกตามปี',
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
        <th class="text-center">ลำดับ</th>
        <th class="text-center" width="100">รหัสสินค้า</th>
        <th width="200" align="left">ชื่อสินค้า</th>
        <th align="left">ยี่ห้อ</th>
        <th align="left">ประเภท</th>
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
                    ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td class="text-center" align="center"><?php echo $i; ?></td>
            <td class="text-center" align="center"><?php echo $row["product_id"]; ?></td>
            <td class="text-bold-500"><?php echo $row["product_name"]; ?></td>
            <td class="text-bold-500"><?php echo $row["brand_name"]; ?></td>
            <td class="text-bold-500" align="left"><?php echo $row["category_name"]; ?></td>
            <td class="text-center" align="center"><?php echo $row["product_quantity"]; ?></td>
          </tr>
      <?php
          $i++;
        } //while condition closing bracket
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