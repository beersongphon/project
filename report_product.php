<?php
include('./head_back-end.php');
include('./header_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
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
            <li class="breadcrumb-item"><a href="./home.php">Dashboard</a></li>
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
          <!-- <div class="card-header">
            <h4 class="card-title">ข้อมูลสินค้า</h4>
          </div> -->
          <div class="card-content">
            <div class="card-body">
            </div>
            <!-- table hover -->
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ชื่อแบรนด์</th>
                    <th>ประเภท</th>
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
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center"><?php echo $row['product_id']; ?></td>
                    <td class="text-bold-500"><?php echo $row['product_name']; ?></td>
                    <td class="text-bold-500"><?php echo $row['brand_name']; ?></td>
                    <td class="text-bold-500"><?php echo $row['category_name']; ?></td>
                    <td class="text-center"><?php echo $row['product_qty'];?></td>
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
              
              <?php
              if (isset($_GET['m'])) { ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
              <?php } ?>
            </div>
          </div>
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

<script>
    $('.del-btn').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: 'คุณจะไม่สามารถเปลี่ยนกลับได้!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    })

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'success',
        title: 'ลบข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 2000
      }).then((result) => {
        if (result.isDismissed) {
          window.location.href = 'product.php';
        }
      })
    }
</script>

<?php include("./footer_back-end.php"); ?>