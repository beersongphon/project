<?php
include('./head_back-end.php');
include('./header_back-end.php');

$date1 = null;
$date2 = null;

if(ISSET($_POST['search'])){
  $date1 = date("Y-m-d", strtotime($_POST['date1']));
  $date2 = date("Y-m-d", strtotime($_POST['date2']));
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
        <h3>รายงานการขายสินค้า</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">รายงานการขายสินค้า</li>
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
                  <label class="input-group-text">Date:</label>
                  <input type="date" class="form-control" placeholder="Start"  name="date1"/>
                  <label class="input-group-text">To</label>
                  <input type="date" class="form-control" placeholder="End"  name="date2"/>
                  <button class="btn-primary input-group-text" name="search"><i class="bi bi-search"></i></button>
                  <a href="./report_sale.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                </div>
              </form>
              
            </div>
            <!-- table hover -->
            <div id="order_table"> 
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">วันที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>อีเมล</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">ราคารวม</th>
                    <!-- <th>ACTION</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $sql = "SELECT * FROM tb_order 
                  LEFT JOIN
                  tb_user
                  ON
                  tb_order.user_id = tb_user.user_id WHERE tb_order.order_date BETWEEN '$date1' AND '$date2'";
                  $result = mysqli_query($conn, $sql);

                  if(!empty($result))	 { 
                    while($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center"><?php echo $row['order_date']; ?></td>
                    <td class="text-bold-500"><?php echo $row['user_firstname']; ?> <?php echo $row['user_lastname']; ?></td>
                    <td class="text-bold-500"><?php echo $row['order_address']; ?></td>
                    <td class="text-bold-500"><?php echo $row['order_tel']; ?></td>
                    <td class="text-bold-500"><?php echo $row['order_email']; ?></td>
                    <td class="text-center"><?php echo $row['permission_id'];?></td>
                    <td class="text-center"><?php echo $row['order_total'];?></td>
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
              <!-- <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php //echo $page_no . " of " . $total_no_of_pages; ?></strong>
              </div> -->


              <?php
              if (isset($_GET['m'])) { ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
              <?php } ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

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