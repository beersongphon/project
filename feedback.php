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
        <h3>ข้อมูล Feedback</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ข้อมูล Feedback</li>
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
          <!-- <div class="card-content">
            <div class="card-body">
              <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input type="search" name="txtSearch" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="button-addon2" value="<?php echo $strKeyword; ?>">
                  <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
                  <a class="btn btn-primary" style="float: right;" href="product_add.php">
                    <i class="fa fa-plus-circle"></i>
                    เพิ่มสินค้า
                  </a>
                </div>
              </form>
            </div> -->
            <!-- table hover -->
            <ul class='list-group'>
                  <?php
                  $date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
                  $sql = "SELECT * FROM tb_contact ORDER BY contact_id DESC limit 10";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $date_set = date_create($row['contact_datetime']);
                  ?>
                  <li class='list-group-item'>
                    รายละเอียด: ชื่อผู้ส่ง: <?php echo $row['contact_member']; ?>
                    <br>
                    Email: <?php echo $row['contact_email']; ?>
                    <br>
                    Feedback Detail: <?php echo $row['contact_comment']; ?>
                    <br>
                    วันที่ส่ง: <?php echo date_format($date_set, "d")."  ".$date_th[date_format($date_set, "n")]; ?>
                    <?php echo date_format($date_set, "Y")." / ".date_format($date_set, "H:i"); ?>
                  </li>
                  <?php
                    } //while condition closing bracket
                  }  //if condition closing bracket
                  else{
                  ?>
                  <li class='list-group-item'>
                    <center>ไม่มีข้อมูล</center>
                  </li>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <hr>
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

<?php include("./footer_back-end.php"); ?>