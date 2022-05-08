<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./head_back-end.php");
include("./header_back-end.php");

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
        <h3>ข้อมูลยี่ห้อ</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ข้อมูลยี่ห้อ</li>
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
            <h4 class="card-title">ข้อมูลยี่ห้อ</h4>
          </div> -->
          <div class="card-content">
            <div class="card-body">
              <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input type="search" name="txtSearch" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="button-addon2" value="<?php echo $strKeyword; ?>">
                  <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
                  <a class="btn btn-primary" style="float: right;" href="brand_add.php">
                    <i class="fa fa-plus-circle"></i>
                    เพิ่มยี่ห้อ
                  </a>
                </div>
              </form>
              <!-- table hover -->
              <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th>ชื่อยี่ห้อ</th>
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

                    $total_records_per_page = 10;
                    $offset = ($page_no - 1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_brand`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $i = 1;

                    $sql = "SELECT * FROM tb_brand WHERE brand_id LIKE '%$strKeyword%' OR brand_name LIKE '%$strKeyword%'
                    LIMIT $offset, $total_records_per_page
                      ";
                    $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
                    if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                      # output data of each row
                      # วนลูปแสดงข้อมูล
                      while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $i; ?></td>
                      <td class="text-bold-500"><?php echo $row["brand_name"]; ?></td>
                      <td>
                        <a class="btn btn-warning" href="./brand_edit.php?brand_id=<?php echo $row["brand_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" onclick="deleteBrand(<?php echo $row['brand_id']; ?>)">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    <?php
                        $i++;
                      } //while condition closing bracket
                    }  //if condition closing bracket
                    else{
                    ?>
                    <tr>
                      <td colspan = "3"><center>ไม่มีข้อมูล</center></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <hr>
                <!-- <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                  <strong>Page <?php //echo $page_no . " of " . $total_no_of_pages; ?></strong>
                </div> -->

                <nav aria-label="Page navigation example">
                  <ul class="pagination pagination-primary  justify-content-center">
                    <?php // if($page_no > 1){ echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>"; } 
                    ?>

                    <li <?php if ($page_no <= 1) {
                      echo "class='page-item disabled'";
                      } ?>>
                      <a class="page-link" <?php if ($page_no > 1) {
                        echo "href='?page_no=$previous_page'";
                      } ?>>Previous</a>
                    </li>
                    <?php
                  if ($total_no_of_pages <= 10) {
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                      }
                    }
                  } elseif ($total_no_of_pages > 10) {

                    if ($page_no <= 4) {
                      for ($counter = 1; $counter < 8; $counter++) {
                        if ($counter == $page_no) {
                          echo "<li class='page-item active'><a>$counter</a></li>";
                        } else {
                          echo "<li class='page-item><a href='?page_no=$counter'>$counter</a></li>";
                        }
                      }
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                      echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                        if ($counter == $page_no) {
                          echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                        } else {
                          echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                        }
                      }
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";

                      for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                          echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                        } else {
                          echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                        }
                      }
                    }
                  }
                  ?>

                  <li <?php if ($page_no >= $total_no_of_pages) {
                        echo "class='page-item disabled'";
                      } ?>>
                    <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                          echo "href='?page_no=$next_page'";
                        } ?>>Next</a>
                  </li>
                  <?php if ($page_no < $total_no_of_pages) {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                  } ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<?php include("./footer_back-end.php"); ?>