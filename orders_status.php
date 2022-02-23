<?php
include("./head_front-end.php");
include("./authguard.php");
include("./header_front-end.php");
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <span>ประวัติการสั่งซื้อ</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
  <div class="container">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><div align="center">ลำดับ</div></th>
                <th scope="col"><div align="center">เลขที่สั่งซื้อ</div></th>
                <th scope="col">วันที่</th>
                <th scope="col">สถานะ</th>
                <th scope="col"><div align="center">ราคา</div></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;

              $sql = "SELECT * FROM tb_order 
                      LEFT JOIN
                      tb_status
                      ON
                      tb_order.status_id = tb_status.status_id
                      WHERE tb_order.status_id = '2'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><div align="center"><?php echo $i; ?></div></th>
                <td><div align="center"><?php echo $row["order_id"]; ?></div></th>
                <td><?php echo $row["order_date"]; ?></td>
                <td><?php echo $row["status_name"]; ?></td>
                <td><div align="center"><?php echo number_format($row["order_total"], 2); ?></div></td>
                <td><a href="./purchase_order.php?order_id=<?php echo $row["order_id"]; ?>" class="btn btn-light">แสดงใบเสร็จ</a></td>
              </tr>
              <?php
                  $i++;
                } //while condition closing bracket
              }  //if condition closing bracket
              ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</section>
<!-- Login Section End -->

<?php include("./footer_front-end.php"); ?>