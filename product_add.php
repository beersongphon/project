<?php
include("./head_back-end.php");
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
            <a href="./product.php" class="sidebar-link">
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
            <h3>เพิ่มข้อมูลสินค้า</h3>
            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="./product.php">ข้อมูลสินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลสินค้า</li>
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
            <h4 class="card-title">ข้อมูลสินค้า</h4>
          </div> -->
              <div class="card-content">
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row p-5">
                      <table id="image_list" class="table"></table>
                    </div>
                    <div class="row">
                      <div class="input-group mb-3">
                        <input id='files' name="files[]" type="file" class="form-control" required multiple>
                        <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                          อัปโหลดรูปภาพ
                        </button>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="product_name" class=" form-control-label">ชื่อสินค้า</label>
                      <input type="text" id="product_name" name="product_name" placeholder="ชื่อสินค้า" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="brand_id" class=" form-control-label">ยี่ห้อ</label>
                      <select class="form-select" id="brand_id" name="brand_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_brand";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row["brand_id"]; ?>">
                            <?php echo $row["brand_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="category_id" class=" form-control-label">ประเภท</label>
                      <select class="form-select" id="category_id" name="category_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_category";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row["category_id"]; ?>">
                            <?php echo $row["category_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_price" class=" form-control-label">ราคา</label>
                      <input type="text" id="product_price" name="product_price" placeholder="ราคา" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="product_quantity" class=" form-control-label">จำนวน</label>
                      <input type="text" id="product_quantity" name="product_quantity" placeholder="จำนวน" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="product_description" class=" form-control-label">รายละเอียดสินค้า</label>
                      <input type="text" id="product_description" name="product_description" placeholder="รายละเอียดสินค้า" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="createProduct()">
                      บันทึก
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

    <?php include("./footer_back-end.php"); ?>