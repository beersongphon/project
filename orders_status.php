<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
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

              $date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
              $sql = "SELECT * FROM tb_order 
                      LEFT JOIN
                      tb_status
                      ON
                      tb_order.status_id = tb_status.status_id
                      WHERE tb_order.status_id = '2'";
              $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
              if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                # output data of each row
                # วนลูปแสดงข้อมูล
                while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
                  $date_set = date_create($row["order_date"]);
                  $day = date_format($date_set, "d");
                  $month = $date_th[date_format($date_set, "n")];
                  $year = date_format($date_set, "Y") + 543;
                  $datesave = "".$day. " " .$month. " " .$year. "";
              ?>
              <tr>
                <th scope="row"><div align="center"><?php echo $i; ?></div></th>
                <td><div align="center"><?php echo $row["order_id"]; ?></div></th>
                <td><?php echo $datesave; ?></td>
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