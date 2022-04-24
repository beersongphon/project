<?php
include("./head_front-end.php");
include("./header_front-end.php");

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
if (isset($_GET["category_id"]) & isset($_GET["category_name"])) {
  //คิวรี่ข้อมูลสินค้าตามประเภท
  $category_id = $_GET["category_id"];
  //คิวรี่ข้อมูลสินค้าทุกรายการ
  if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
  }

  $total_records_per_page = 9;
  $offset = ($page_no - 1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2";

  $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM tb_product WHERE category_id='$category_id' AND (product_id LIKE '%$strKeyword%' OR product_name LIKE '%$strKeyword%') AND product_quantity NOT IN ('0')");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1

  $sql = "SELECT DISTINCT tb_product.product_id,
  (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
  tb_product.product_name,
  tb_product.product_price,
  tb_product.product_quantity,
  tb_product.product_description
  FROM tb_product
  LEFT JOIN
  tb_img_product
  ON
  tb_product.product_id = tb_img_product.product_id 
  WHERE tb_product.category_id='$category_id' 
  AND (tb_product.product_id LIKE '%$strKeyword%' OR tb_product.product_name LIKE '%$strKeyword%') 
  AND tb_product.product_quantity NOT IN ('0') 
  ORDER BY tb_product.product_id DESC LIMIT $offset, $total_records_per_page";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  //คิวรี่ข้อมูลประเภทสินค้า
  $sql_category = "SELECT* FROM tb_category WHERE category_id='$category_id'";
  $result_category = $conn->query($sql_category);
  $row_category = $result_category->fetch_assoc();
} else {
  //คิวรี่ข้อมูลสินค้าทุกรายการ
  if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
  }

  $total_records_per_page = 9;
  $offset = ($page_no - 1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2";

  $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM tb_product WHERE (product_id LIKE '%$strKeyword%' OR product_name LIKE '%$strKeyword%') AND product_quantity NOT IN ('0')");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1

  $sql = "SELECT DISTINCT tb_product.product_id,
  (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
  tb_product.product_name,
  tb_product.product_price,
  tb_product.product_quantity,
  tb_product.product_description
  FROM tb_product
  LEFT JOIN
  tb_img_product
  ON
  tb_product.product_id = tb_img_product.product_id 
  WHERE (tb_product.product_id LIKE '%$strKeyword%' OR tb_product.product_name LIKE '%$strKeyword%')
  AND tb_product.product_quantity NOT IN ('0')
  ORDER BY tb_product.product_id DESC LIMIT $offset, $total_records_per_page";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}
//คิวรี่ข้อมูลประเภทสินค้า
$sqlcategory = "SELECT* FROM tb_category";
$resultcategory = $conn->query($sqlcategory);
$rowcategory = $resultcategory->fetch_assoc();
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <span>สินค้า</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="shop__sidebar"> 
          <div class="sidebar__categories">
            <div class="section-title">
              <h4>ประเภทสินค้า</h4>
            </div>
            <div class="categories__accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <!-- <div class="card-heading active">
                    <a data-toggle="collapse" data-target="#collapseOne">Women</a>
                  </div> -->
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="./shop.php">ทั้งหมด</a></li>
                        <?php foreach($resultcategory as $rowcategory) {  ?>
                        <li><a href="./shop.php?category_id=<?php echo $rowcategory["category_id"]; ?>&category_name=<?php echo $rowcategory["category_name"]; ?>"><?php echo $rowcategory["category_name"]; ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9">
        <div class="row">
          <?php
          foreach($result as $row) {
            include("./checkstock.php");
          ?>
          <div class="col-lg-4 col-md-6">
            <?php include("./permission.php"); ?>
          </div>
          <?php
          }  //if condition closing bracket
          ?>

          <div class="col-lg-12 text-center">
            <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
          </div>
          <div class="col-lg-12 text-center">
            <div class="pagination__option">
              <?php 
              if (isset($_GET["category_id"]) & isset($_GET["category_name"])) {
                if ($page_no > 1) {
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=1'><i class='fa fa-angle-double-left'></i></a></li>";
                }
              ?>

              <a <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                  } ?>
                  <?php if ($page_no > 1) {
                    echo "href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$previous_page'";
                  } ?>><i class="fa fa-angle-left"></i>
              </a>

              <?php
              if ($total_no_of_pages <= 10) {
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                  if ($counter == $page_no) {
                    echo "<a class='active'>$counter</a>";
                  } else {
                    echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$counter'>$counter</a>";
                  }
                }
              } elseif ($total_no_of_pages > 10) {

                if ($page_no <= 4) {
                  for ($counter = 1; $counter < 8; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$counter'>$counter</a>";
                    }
                  }
                  echo "<a>...</a>";
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$second_last'>$second_last</a>";
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$total_no_of_pages'>$total_no_of_pages</a>";
                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=1'>1</a>";
                  echo "<a class='page-link' href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=2'>2</a>";
                  echo "<a class='page-link'>...</a>";
                  for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$counter'>$counter</a>";
                    }
                  }
                  echo "<a>...</a>";
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$second_last'>$second_last</a>";
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$total_no_of_pages'>$total_no_of_pages</a>";
                } else {
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=1'>1</a>";
                  echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=2'>2</a>";
                  echo "<a>...</a>";

                  for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$counter'>$counter</a>";
                    }
                  }
                }
              }
              ?>

              <a <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                  } ?>
                  <?php if ($page_no < $total_no_of_pages) {
                    echo "href='?category_id=$row_category[category_id]&category_name=$row_category[category_name]&page_no=$next_page'";
                  } ?>
                  ><i class="fa fa-angle-right"></i>
              </a>
              <?php if ($page_no < $total_no_of_pages) {
                echo '<a href="?category_id='.$row_category["category_id"].'&category_name='.$row_category["category_name"].'&page_no='.$total_no_of_pages.'"><i class="fa fa-angle-double-right"></i></a></li>';
                } 
              } else {
                if ($page_no > 1) {
                  echo "<a href='?page_no=1'><i class='fa fa-angle-double-left'></i></a></li>";
                }
              ?>

              <a <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                  } ?>
                  <?php if ($page_no > 1) {
                    echo "href='?page_no=$previous_page'";
                  } ?>><i class="fa fa-angle-left"></i>
              </a>

              <?php
              if ($total_no_of_pages <= 10) {
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                  if ($counter == $page_no) {
                    echo "<a class='active'>$counter</a>";
                  } else {
                    echo "<a href='?page_no=$counter'>$counter</a>";
                  }
                }
              } elseif ($total_no_of_pages > 10) {

                if ($page_no <= 4) {
                  for ($counter = 1; $counter < 8; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?page_no=$counter'>$counter</a>";
                    }
                  }
                  echo "<a>...</a>";
                  echo "<a href='?page_no=$second_last'>$second_last</a>";
                  echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                  echo "<a href='?page_no=1'>1</a>";
                  echo "<a class='page-link' href='?page_no=2'>2</a>";
                  echo "<a class='page-link'>...</a>";
                  for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?page_no=$counter'>$counter</a>";
                    }
                  }
                  echo "<a>...</a>";
                  echo "<a href='?page_no=$second_last'>$second_last</a>";
                  echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
                } else {
                  echo "<a href='?page_no=1'>1</a>";
                  echo "<a href='?page_no=2'>2</a>";
                  echo "<a>...</a>";

                  for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                      echo "<a class='active'>$counter</a>";
                    } else {
                      echo "<a href='?page_no=$counter'>$counter</a>";
                    }
                  }
                }
              }
              ?>

              <a <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                  } ?>
                  <?php if ($page_no < $total_no_of_pages) {
                    echo "href='?page_no=$next_page'";
                  } ?>
                  ><i class="fa fa-angle-right"></i>
              </a>
              <?php if ($page_no < $total_no_of_pages) {
                echo '<a href="?page_no='.$total_no_of_pages.'"><i class="fa fa-angle-double-right"></i></a></li>';
              } 
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->

<?php include("./footer_front-end.php"); ?>