<?php
include("./head_back-end.php");
include("./sibar_back-end.php");
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
        <h3>แก้ไขข้อมูลยี่ห้อ</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="./brand.php">ข้อมูลยี่ห้อ</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลยี่ห้อ</li>
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
              <?php
              if ($_GET) {
                $brand_id = $_GET['brand_id'];

                $sql = "SELECT * FROM tb_brand WHERE brand_id = '$brand_id'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
              ?>
                  <form method="POST" action="" enctype="multipart/form-data">
                    <input type="text" id="brand_id" name="brand_id" class="form-control" hidden value="<?php echo $brand_id; ?>" />
                    <div class="form-group">
                      <label for="brand_name" class=" form-control-label">ชื่อยี่ห้อ</label>
                      <input type="text" id="brand_name" name="brand_name" placeholder="ชื่อยี่ห้อ" class="form-control" value="<?php echo $row["brand_name"]; ?>" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="editBrand()">
                      บันทึก
                    </button>
                  </form>
              <?php
                }
              }
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