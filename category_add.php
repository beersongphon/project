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
        <h3>เพิ่มข้อมูลประเภท</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="./category.php">ข้อมูลประเภท</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลประเภท</li>
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
                <h4 class="card-title">ข้อมูลประเภท</h4>
              </div> -->
          <div class="card-content">
            <div class="card-body">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="category_name" class=" form-control-label">ชื่อประเภท</label>
                  <input type="text" id="category_name" name="category_name" placeholder="ชื่อประเภท" class="form-control">
                </div>
                <button class="btn btn-primary btn-block" type="button" onclick="createCategory()">
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