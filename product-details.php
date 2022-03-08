<?php
include("./head_front-end.php");
include("./header_front-end.php");

$product_id = $_GET["product_id"];
$query = "SELECT DISTINCT tb_product.product_id,
(SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
tb_product.product_name,
tb_brand.brand_name,
tb_category.category_name,
tb_product.product_price,
tb_product.product_qty,
tb_product.product_description
FROM tb_product
LEFT JOIN
tb_img_product
ON
tb_product.product_id = tb_img_product.product_id
LEFT JOIN
tb_brand
ON
tb_product.brand_id = tb_brand.brand_id
LEFT JOIN
tb_category
ON
tb_product.category_id = tb_category.category_id
WHERE tb_product.product_id = '$product_id' ORDER BY tb_product.product_id ASC";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);
?>
  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb__links">
            <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
            <a href="./shop.php">สินค้า</a>
            <span>รายละเอียดสินค้า</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Product Details Section Begin -->
  <section class="product-details spad">
    <div class="container">
      <div class="row"> 
        <div class="col-lg-6">
          <div class="product__details__pic">
            <?php
            $sql = "SELECT * FROM tb_img_product WHERE product_id = '$product_id' ORDER BY product_id ASC LIMIT 8";
            $result = $conn->query($sql);
            $setActive = 0;				
			      $sliderHtml = '';
            if ($result->num_rows > 0) {
            ?> 
            <div class="product__details__pic__left product__thumb nice-scroll">
              <?php
              // output data of each row
              while ($row1 = $result->fetch_assoc()) {
                $activeClass = "";			
                if(!$setActive) {
                  $setActive = 1;
                  $activeClass = 'active';						
                }	
              ?> 
              <a class="pt <?php echo "$activeClass"; ?>" href="#product-<?php echo $row1["img_pro_id"]; ?>">
                <img src="./upload/<?php echo $row1["img_product"]; ?>" height="35" alt="">
              </a>
              <?php  
              } //while condition closing bracket
              ?>
            </div>
            <?php  
            }  //if condition closing bracket

            $sql = "SELECT * FROM tb_img_product WHERE product_id = '$product_id' ORDER BY product_id ASC LIMIT 8";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            ?>
            <div class="product__details__slider__content">
              <div class="product__details__pic__slider owl-carousel">
                <?php
                  // output data of each row
                  while ($row1 = $result->fetch_assoc()) { 
                ?>
                <img data-hash="product-<?php echo $row1["img_pro_id"]; ?>" class="product__big__img" src="./upload/<?php echo $row1["img_product"]; ?>" alt="">
                <?php  
                  } //while condition closing bracket
                ?>
              </div>
            </div>  
            <?php  
              } //while condition closing bracket
            ?>
          </div>
        </div>
 
        <div class="col-lg-6">
          <div class="product__details__text">
            <h3><?php echo $row["product_name"]; ?> <span>ยี่ห้อ: <?php echo $row["brand_name"]; ?> </span> <span>ประเภท: <?php echo $row["category_name"]; ?></span></h3>
            <!-- <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <span>( 138 reviews )</span>
            </div> -->
            <div class="product__details__price">฿ <?php echo number_format($row["product_price"], 2); ?> <!-- <span>฿ 83.0</span> --></div>
            <p><?php echo $row["product_description"]; ?></p>
            <div class="product__details__button">
              <div class="quantity">
                <span>จำนวน:</span>
                <div class="pro-qty">
                  <input type="text" name="quantity" id="quantity<?php echo $row["product_id"]; ?>" value="1">
                </div>
              </div>  
              <input type="hidden" name="hidden_img" id="img<?php echo $row["product_id"]; ?>" value="<?php echo $row["img_product"]; ?>" />
              <input type="hidden" name="hidden_name" id="name<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_name"]; ?>" />
              <input type="hidden" name="hidden_qty" id="qty<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_qty"]; ?>" />
              <input type="hidden" name="hidden_price" id="price<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_price"]; ?>" />
              <a type="button" href="#" class="cart-btn add_to_cart" name="add_to_cart" id="<?php echo $row["product_id"]; ?>"><span class="icon_bag_alt"></span> ใส่ในรถเข็น</a>
              <!-- <ul>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">รายละเอียด</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
              </li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <h6>รายละเอียด</h6>
                <p><?php echo $row["product_description"]; ?></p>
              </div>
              <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                <h6>Specification</h6>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                  quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                  Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                  voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                  consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                  consequat massa quis enim.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                  dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                  quis, sem.</p>
              </div>
              <div class="tab-pane" id="tabs-3" role="tabpanel">
                <h6>Reviews ( 2 )</h6>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                  quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                  Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                  voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                  consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                  consequat massa quis enim.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                  dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                  quis, sem.</p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="related__title">
            <h5>สินค้าที่เกี่ยวข้อง</h5>
          </div>
        </div>
        <?php
        $sql = "SELECT DISTINCT tb_product.product_id,
        (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
        tb_product.product_name,
        tb_product.product_price,
        tb_product.product_qty,
        tb_product.product_description
        FROM tb_product
        LEFT JOIN
        tb_img_product
        ON
        tb_product.product_id = tb_img_product.product_id 
        WHERE tb_product.product_qty NOT IN ('0')
        ORDER BY product_id DESC LIMIT 4";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            include("./checkstock.php");
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <?php include("./permission.php"); ?>
        </div>
        <?php
          } //while condition closing bracket
        }  //if condition closing bracket
        ?>  
      </div>
    </div>
  </section>
  <!-- Product Details Section End -->

  <?php include("./footer_front-end.php"); ?>