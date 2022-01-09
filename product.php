<?php
include('./head_back-end.php');
include('./header_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-35">ข้อมูลสินค้า</h3>
          <div class="table-data__tool">
            <!-- <div class="table-data__tool-left">
              <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property">
                  <option selected="selected">All Properties</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
              </div>
              <div class="rs-select2--light rs-select2--sm">
                <select class="js-select2" name="time">
                  <option selected="selected">Today</option>
                  <option value="">3 Days</option>
                  <option value="">1 Week</option>
                </select>
                <div class="dropDownSelect2"></div>
              </div>
              <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters
              </button>
            </div> -->
            <!-- <div class="table-data__tool-right">
              
              <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>add item</button>
              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                  <option selected="selected">Export</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
              </div>
            </div> -->
            <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
              <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
              <div class="input-group-append">
                <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
                <a class="btn au-btn au-btn-icon au-btn--green au-btn--small" style="float: right;" href="product_add.php">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  เพิ่มลูกค้า
                </a>
                <br style="clear:both;" />
              </div>
            </form>
          </div>


          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>สินค้า
                  <th>ลำดับ</th>
                  <th>รูปสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th class="text-center">ราคา</th>
                  <th class="text-left">รายละเอียดสินค้า</th>
                  <th class="text-right"></th>
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

                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `product`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1

                $sql = "SELECT * FROM product WHERE product_id LIKE '%" . $strKeyword . "%' OR name LIKE '%" . $strKeyword . "%'
                  LIMIT $offset, $total_records_per_page
                  ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['product_id']; ?></td>
                  <td>
                    <div class="row">
                      <img class="col" src="./upload/<?php echo $row['img']; ?>" width="290" height="228" />
                    </div>
                  </td>
                  <td><?php echo $row['name']; ?></td>
                  <td class="text-center"><?php echo $row['price']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td>
                    <div class="table-data-feature">
                      <a class="item" href="./product_edit.php?product_id=<?php echo $row["product_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="zmdi zmdi-edit"></i>
                      </a>
                      <a class="del-btn item" href="./product_delete.php?product_id=<?php echo $row["product_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="6">
                    <div class="row">
                      <?php
                      $sql = "SELECT * FROM img_product WHERE product_id = '$row[product_id]'";
                      $image = $conn->query($sql);
                      while ($image_item = $image->fetch_assoc()) {
                      ?>
                        <img class="col-2" src="./upload/<?php echo $image_item["Img"]; ?>" style="width: 290; height: 228;">
                      <?php
                      }
                      ?>
                      </div>
                    </td>
                  </tr>
                  <!-- <tr>
                    <td>2018-09-29 05:57</td>
                    <td>Accesories</td>
                    <td>Smartwatch 4.0 LTE Wifi</td>
                    <td class="denied">Denied</td>
                    <td>$199.00</td>
                  </tr>
                  <tr>
                    <td>2018-09-24 19:10</td>
                    <td>Camera</td>
                    <td>Camera C430W 4k</td>
                    <td class="process">Processed</td>
                    <td>$699.00</td>
                  </tr> -->
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

          <!-- END DATA TABLE -->
          <div class="pagination justify-content-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
          </div>

          <ul class="pagination justify-content-center">
            <?php if ($page_no > 1) {
              echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>";
            }
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
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                  } else {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
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
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

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

<?php include('./footer_back-end.php'); ?>