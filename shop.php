<?php
include("./head_front-end.php");
include("./header_front-end.php");
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> Home</a>
          <span>Shop</span>
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
              <h4>Categories</h4>
            </div>
            <div class="categories__accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-heading active">
                    <a data-toggle="collapse" data-target="#collapseOne">Women</a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">T-shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">T-shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseThree">Kids</a>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">T-shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseFour">Accessories</a>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">T-shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseFive">Cosmetic</a>
                  </div>
                  <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <ul>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">T-shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="sidebar__filter">
            <div class="section-title">
              <h4>Shop by price</h4>
            </div>
            <div class="filter-range-wrap">
              <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="99"></div>
              <div class="range-slider">
                <div class="price-input">
                  <p>Price:</p>
                  <input type="text" id="minamount">
                  <input type="text" id="maxamount">
                </div>
              </div>
            </div>
            <a href="#">Filter</a>
          </div>
          <div class="sidebar__sizes">
            <div class="section-title">
              <h4>Shop by size</h4>
            </div>
            <div class="size__list">
              <label for="xxs">
                xxs
                <input type="checkbox" id="xxs">
                <span class="checkmark"></span>
              </label>
              <label for="xs">
                xs
                <input type="checkbox" id="xs">
                <span class="checkmark"></span>
              </label>
              <label for="xss">
                xs-s
                <input type="checkbox" id="xss">
                <span class="checkmark"></span>
              </label>
              <label for="s">
                s
                <input type="checkbox" id="s">
                <span class="checkmark"></span>
              </label>
              <label for="m">
                m
                <input type="checkbox" id="m">
                <span class="checkmark"></span>
              </label>
              <label for="ml">
                m-l
                <input type="checkbox" id="ml">
                <span class="checkmark"></span>
              </label>
              <label for="l">
                l
                <input type="checkbox" id="l">
                <span class="checkmark"></span>
              </label>
              <label for="xl">
                xl
                <input type="checkbox" id="xl">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="sidebar__color">
            <div class="section-title">
              <h4>Shop by size</h4>
            </div>
            <div class="size__list color__list">
              <label for="black">
                Blacks
                <input type="checkbox" id="black">
                <span class="checkmark"></span>
              </label>
              <label for="whites">
                Whites
                <input type="checkbox" id="whites">
                <span class="checkmark"></span>
              </label>
              <label for="reds">
                Reds
                <input type="checkbox" id="reds">
                <span class="checkmark"></span>
              </label>
              <label for="greys">
                Greys
                <input type="checkbox" id="greys">
                <span class="checkmark"></span>
              </label>
              <label for="blues">
                Blues
                <input type="checkbox" id="blues">
                <span class="checkmark"></span>
              </label>
              <label for="beige">
                Beige Tones
                <input type="checkbox" id="beige">
                <span class="checkmark"></span>
              </label>
              <label for="greens">
                Greens
                <input type="checkbox" id="greens">
                <span class="checkmark"></span>
              </label>
              <label for="yellows">
                Yellows
                <input type="checkbox" id="yellows">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9">
        <div class="row">
          <?php
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

          $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_product`");
          $total_records = mysqli_fetch_array($result_count);
          $total_records = $total_records['total_records'];
          $total_no_of_pages = ceil($total_records / $total_records_per_page);
          $second_last = $total_no_of_pages - 1; // total page minus 1

          $sql = "SELECT * FROM tb_product WHERE product_id LIKE '%" . $strKeyword . "%' OR product_name LIKE '%" . $strKeyword . "%'
          ORDER BY product_id DESC LIMIT $offset, $total_records_per_page
          ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              //สร้างเงื่อนไขตรวจสอบจำนวนคงเหลือในสต๊อกสินค้า
              if($row['product_quantity'] == 0){
                //สินค้าหมด
                $disabled = "return false;";
                $tableClass = "label stockout";
                $txtTitle = "Out Of Stock";
              }elseif($row['product_quantity'] <= 5) {
                //สินค้ากำลังจะหมด
                $disabled = "return true;";
                $tableClass = "label stockblue";
                $txtTitle = "Running Out";
              }else{
                //เหลือ > 10 ชิ้น
                $disabled = "return true;";
                $tableClass = "table-info";
                $txtTitle = "";
              }
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./upload/<?php echo $row['product_img']; ?>">
                <!-- <div class="label new">New</div> -->
                <div class="<?= $tableClass;?>"><?=$txtTitle;?></div>
                <ul class="product__hover">
                  <?php include("./permission.php"); ?>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#"><?php echo $row["product_name"]; ?></a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">฿ <?php echo number_format($row["product_price"], 2); ?></div>
              </div>
            </div>
          </div>
          <?php
            } //while condition closing bracket
          }  //if condition closing bracket
          ?>
          <!-- <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-2.jpg">
                <ul class="product__hover">
                  <li><a href="img/shop/shop-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Flowy striped skirt</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 49.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-3.jpg">
                <ul class="product__hover">
                  <li><a href="img/shop/shop-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Croc-effect bag</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-4.jpg">
                <ul class="product__hover">
                  <li><a href="img/shop/shop-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Dark wash Xavi jeans</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item sale">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-5.jpg">
                <div class="label">Sale</div>
                <ul class="product__hover">
                  <li><a href="img/shop/shop-5.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Ankle-cuff sandals</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-6.jpg">
                <ul class="product__hover">
                  <li><a href="img/shop/shop-6.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Contrasting sunglasses</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-7.jpg">
                <ul class="product__hover">
                  <li><a href="img/shop/shop-7.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Circular pendant earrings</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-8.jpg">
                <div class="label stockout stockblue">Out Of Stock</div>
                <ul class="product__hover">
                  <li><a href="img/shop/shop-8.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Cotton T-Shirt</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product__item sale">
              <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/shop/shop-9.jpg">
                <div class="label">Sale</div>
                <ul class="product__hover">
                  <li><a href="img/shop/shop-9.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Water resistant zips backpack</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
              </div>
            </div>
          </div> -->
          <!-- END DATA TABLE -->
          

          <!-- <div class="col-lg-12 text-center">
            <div class="pagination__option">
              <a href="#"><i class="fa fa-angle-left"></i></a>
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
          </div> -->

          <div class="col-lg-12 text-center">
            <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
          </div>
          <div class="col-lg-12 text-center">
            <div class="pagination__option">
              <?php if ($page_no > 1) {
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
                echo "<a href='?page_no=$total_no_of_pages'><i class='fa fa-angle-double-right'></i></a></li>";
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->

<?php include("./footer_front-end.php"); ?>