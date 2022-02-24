<?php
include('./head_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
require_once __DIR__ . '/vendor/autoload.php';
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="d-flex justify-content-between">
          <div class="logo">
            <a href="./home.php" style="font-family: 'Finger Paint', cursive; font-size: 20px;">Luxury by Fon</a>
            <!-- <a href="index.html"><img src="./assets/back-end/mazer/dist/assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
          </div>
          <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-item active">
            <a href="./product.php" class='sidebar-link'>
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ย้อนกลับ</span>
            </a>
          </li>
        </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
  <div id="main">
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
  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" align="center">รายงานสินค้าคงเหลือ</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
            </div>
            <!-- table hover -->
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center" width="100" >รหัสสินค้า</th>
                    <th width="200" align="left">ชื่อสินค้า</th>
                    <th>ชื่อแบรนด์</th>
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
                    <td class="text-center" align="center"><?php echo $row['product_id']; ?></td>
                    <td class="text-bold-500"><?php echo $row['product_name']; ?></td>
                    <td class="text-bold-500"><?php echo $row['brand_name']; ?></td>
                    <td class="text-bold-500" align="left"><?php echo $row['category_name']; ?></td>
                    <td class="text-center" align="center"><?php echo $row['product_qty'];?></td>
                  </tr>
                  <?php
                  $i++;
                    } //while condition closing bracket
                  }  //if condition closing bracket
                  ?>
                </tbody>
              </table>
              <!-- <button onclick="window.print()">Print </button>  -->
              <hr>
            </div>
          </div>
          <?php
          $html=ob_get_contents();
          $mpdf = new \Mpdf\Mpdf();
          $mpdf->WriteHTML($head);
          $mpdf->WriteHTML($html);
          $mpdf->Output("report.pdf");
          ?>
          <a href="report.pdf" class="btn btn-primary">ออกรายงาน</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<script src="./assets/js/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/back-end/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="./assets/back-end/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>

<?php include("./footer_back-end.php"); ?>