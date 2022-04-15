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
        <h3>แก้ไขข้อมูลประเภท</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="./catgory.php">ข้อมูลประเภท</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลประเภท</li>
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
                $category_id = $_GET["category_id"];

                $sql = "SELECT * FROM tb_category WHERE category_id = '$category_id'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
              ?>
                  <form method="POST" action="" enctype="multipart/form-data">
                    <input type="text" id="category_id" name="category_id" class="form-control" hidden value="<?php echo $category_id; ?>" />
                    <div class="form-group">
                      <label for="brand_name" class=" form-control-label">ชื่อประเภท</label>
                      <input type="text" id="category_name" name="category_name" placeholder="ชื่อประเภท" class="form-control" value="<?php echo $row["category_name"]; ?>">
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="editCategory()">
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