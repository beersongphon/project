<?php
include('./head_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<div id="app">
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
            <h3>เพิ่มข้อมูลแบรนด์</h3>
            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="./brand.php">ข้อมูลแบรนด์</a></li>
                <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลแบรนด์</li>
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
              <!-- <div class="card-header">
                <h4 class="card-title">ข้อมูลแบรนด์</h4>
              </div> -->
              <div class="card-content">
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="brand_name" class=" form-control-label">name</label>
                      <input type="text" id="brand_name" name="brand_name" placeholder="Enter your company name" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="createBrand()">
                      ยืนยัน
                    </button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Hoverable rows end -->
    </div>

    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
      function createBrand() {
        let brand_name = $('#brand_name').val();
        $.ajax({
          url: 'query/add_brand.php',
          type: 'post',
          data: {
            'brand_name': brand_name
          },
          success: function(response) {
            console.log(response);
            setTimeout(function() {
              window.location.replace('brand.php');
              //console.log(product_name, product_price, product_qty, product_description, response);
            }, 300);
          }
        });
      }
    </script>

    <?php include("./footer_back-end.php"); ?>