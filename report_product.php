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
            include("intro.php");
            $use = (isset($_GET["use"]) ? $_GET["use"] : '');
            if($use == "daily"){
              include("report_product_daily.php");
            }elseif($use == "monthy"){
              include("report_product_monthy.php");
            }elseif($use == "yearly"){
              include("report_product_yearly.php");
            }else{
              include("report_product_daily.php");
            }
            // if ($_GET) {
            //   switch ($_GET["use"]) {
            //     case "daily":
            //       include("report_product_daily.php");
            //       break;
            //     case "monthy":
            //       include("report_product_monthy.php");
            //       break;
            //     case "yearly":
            //       include("report_product_yearly.php");
            //       break;
            //     default:
            //       echo "none have anything to do";
            //       break;
            //   }
            // } else {
            //   include("report_product_daily.php");
            // }
            ?>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<?php include("./footer_back-end.php"); ?>