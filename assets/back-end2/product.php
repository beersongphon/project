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
        <h3>ข้อมูลสินค้า</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">ข้อมูลสินค้า</li>
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
              <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input type="search" name="txtSearch" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="button-addon2" value="<?php echo $strKeyword; ?>">
                  <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
                  <a class="btn btn-primary" style="float: right;" href="product_add.php">
                    <i class="fa fa-plus-circle"></i>
                    เพิ่มลูกค้า
                  </a>
                </div>
              </form>
            </div>
            <!-- table hover -->
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center">ลำดับ</th>
                    <th>รูปสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th class="text-center">ราคา</th>
                    <th class="text-left">รายละเอียดสินค้า</th>
                    <th class="text-right"></th>
                    <!-- <th>ACTION</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                  $page_no = $_GET['page_no'];
                } else {
                  $page_no = 1;
                }

                $total_records_per_page = 6;
                $offset = ($page_no - 1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2";

                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_product`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1

                $sql = "SELECT * FROM tb_product WHERE product_id LIKE '%" . $strKeyword . "%' OR product_name LIKE '%" . $strKeyword . "%'
                  LIMIT $offset, $total_records_per_page
                  ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $row['product_id']; ?></td>
                  <td>
                    <div class="row">
                      <img class="col-6" src="./upload/<?php echo $row['product_img']; ?>" width="40" height="70" />
                    </div>
                  </td>
                  <td class="text-bold-500"><?php echo $row['product_name']; ?></td>
                  <td class="text-center"><?php echo $row['product_price']; ?></td>
                  <td><?php echo $row['product_description']; ?></td>
                  <td>
                      <a class="btn btn-warning" href="./product_edit.php?product_id=<?php echo $row["product_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="del-btn btn btn-danger" href="./product_delete.php?product_id=<?php echo $row["product_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </a>
      
                  </td>
                </tr>
                <tr>
                  <!-- <td colspan="1"></td> -->
                  <td colspan="6">
                    <div class="row">
                      <?php
                      $sql = "SELECT * FROM tb_img_product WHERE product_id = '$row[product_id]'";
                      $image = $conn->query($sql);
                      while ($image_item = $image->fetch_assoc()) {
                      ?>
                        <img class="col-2" src="./upload/<?php echo $image_item["img_product"]; ?>" width="40" height="140" >
                      <?php
                      }
                      ?>
                      </div>
                    </td>
                  </tr>
                  <?php
                    } //while condition closing bracket
                  }  //if condition closing bracket
                  ?>
                </tbody>
              </table>
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