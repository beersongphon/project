<?php
include("./head_front-end.php");
include("./header_front-end.php");

$product_id = $_GET["product_id"];
$query = "SELECT * FROM tb_product WHERE product_id = '$product_id' ORDER BY product_id ASC";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);
?>
  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb__links">
            <a href="./index.php"><i class="fa fa-home"></i> Home</a>
            <a href="./shop.php">Shop</a>
            <span><?php echo $row["product_name"]; ?></span>
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
            <div class="product__details__pic__left product__thumb nice-scroll">
              <?php
              $sql = "SELECT * FROM tb_img_product WHERE product_id = '$product_id' ORDER BY product_id ASC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row1 = $result->fetch_assoc()) {
              ?> 
              <a class="pt <?php if (basename($_SERVER['PHP_SELF']) == "#product-$row1[img_pro_id]") {
                                                echo "active";
                                              } else {
                                                echo "";
                                              } ?>" href="#product-<?php echo $row1["img_pro_id"]; ?>">
                <img src="./upload/<?php echo $row1["img_product"]; ?>" alt="">
              </a>
              <?php  
                } //while condition closing bracket
              }  //if condition closing bracket
              ?>
            </div>
            <div class="product__details__slider__content">
              <div class="product__details__pic__slider owl-carousel">
                <?php
                $query = "SELECT * FROM tb_img_product WHERE product_id = '$product_id' ORDER BY product_id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row2 = mysqli_fetch_array($result)) {  
                ?>
                <img data-hash="product-<?php echo $row2["img_pro_id"]; ?>" class="product__big__img" src="./upload/<?php echo $row2["img_product"]; ?>" alt="">
                <?php  
                }
                ?>
              </div>
            </div>  
          </div>
        </div>
        <!-- <div class="col-lg-6">
          <div class="product__details__pic">
            <div class="product__details__pic__left product__thumb nice-scroll">
              <a class="pt active" href="#product-1">
                <img src="./assets/front-end/img/product/details/thumb-1.jpg" alt="">
              </a>
              <a class="pt" href="#product-2">
                <img src="./assets/front-end/img/product/details/thumb-2.jpg" alt="">
              </a>
              <a class="pt" href="#product-3">
                <img src="./assets/front-end/img/product/details/thumb-3.jpg" alt="">
              </a>
              <a class="pt" href="#product-4">
                <img src="./assets/front-end/img/product/details/thumb-4.jpg" alt="">
              </a>
            </div>
            <div class="product__details__slider__content">
              <div class="product__details__pic__slider owl-carousel">
                <img data-hash="product-1" class="product__big__img" src="./assets/front-end/img/product/details/product-1.jpg" alt="">
                <img data-hash="product-2" class="product__big__img" src="./assets/front-end/img/product/details/product-3.jpg" alt="">
                <img data-hash="product-3" class="product__big__img" src="./assets/front-end/img/product/details/product-2.jpg" alt="">
                <img data-hash="product-4" class="product__big__img" src="./assets/front-end/img/product/details/product-4.jpg" alt="">
              </div>
            </div>
          </div>
        </div> -->
        <div class="col-lg-6">
          <div class="product__details__text">
            <h3><?php echo $row["product_name"]; ?> <span>Brand: SKMEIMore Men Watches from SKMEI</span></h3>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <span>( 138 reviews )</span>
            </div>
            <div class="product__details__price">฿ <?php echo number_format($row["product_price"], 2); ?> <span>฿ 83.0</span></div>
            <p>Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur
              magni lores eos qui ratione voluptatem sequi nesciunt.</p>
            <div class="product__details__button">
              <div class="quantity">
                <span>จำนวน:</span>
                <div class="pro-qty">
                  <input type="text" name="quantity" id="quantity<?php echo $row["product_id"]; ?>" value="1">
                </div>
              </div>  
              <input type="hidden" name="hidden_img" id="img<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_img"]; ?>" />  
              <input type="hidden" name="hidden_name" id="name<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_name"]; ?>" />  
              <input type="hidden" name="hidden_price" id="price<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_price"]; ?>" />  
              <a type="button" href="#" class="cart-btn add_to_cart" name="add_to_cart" id="<?php echo $row["product_id"]; ?>"><span class="icon_bag_alt"></span> Add to cart</a>
              <ul>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
              </ul>
            </div>
            <div class="product__details__widget">
              <ul>
                <li>
                  <span>Availability:</span>
                  <div class="stock__checkbox">
                    <label for="stockin">
                      In Stock
                      <input type="checkbox" id="stockin">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </li>
                <li>
                  <span>Available color:</span>
                  <div class="color__checkbox">
                    <label for="red">
                      <input type="radio" name="color__radio" id="red" checked>
                      <span class="checkmark"></span>
                    </label>
                    <label for="black">
                      <input type="radio" name="color__radio" id="black">
                      <span class="checkmark black-bg"></span>
                    </label>
                    <label for="grey">
                      <input type="radio" name="color__radio" id="grey">
                      <span class="checkmark grey-bg"></span>
                    </label>
                  </div>
                </li>
                <li>
                  <span>Available size:</span>
                  <div class="size__btn">
                    <label for="xs-btn" class="active">
                      <input type="radio" id="xs-btn">
                      xs
                    </label>
                    <label for="s-btn">
                      <input type="radio" id="s-btn">
                      s
                    </label>
                    <label for="m-btn">
                      <input type="radio" id="m-btn">
                      m
                    </label>
                    <label for="l-btn">
                      <input type="radio" id="l-btn">
                      l
                    </label>
                  </div>
                </li>
                <li>
                  <span>Promotions:</span>
                  <p>Free shipping</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <h6>Description</h6>
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
              <div class="tab-pane" id="tabs-2" role="tabpanel">
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
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="related__title">
            <h5>RELATED PRODUCTS</h5>
          </div>
        </div>
        <?php
        $sql = "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 4";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="./upload/<?php echo $row['product_img']; ?>">
              <div class="label new">New</div>
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

        <!-- <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/product/related/rp-2.jpg">
              <ul class="product__hover">
                <li><a href="./assets/front-end/img/product/related/rp-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
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
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/product/related/rp-3.jpg">
              <div class="label stockout">out of stock</div>
              <ul class="product__hover">
                <li><a href="./assets/front-end/img/product/related/rp-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
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
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="./assets/front-end/img/product/related/rp-4.jpg">
              <ul class="product__hover">
                <li><a href="./assets/front-end/img/product/related/rp-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="#">Slim striped pocket shirt</a></h6>
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
        </div> -->
      </div>
    </div>
  </section>
  <!-- Product Details Section End -->

  <?php include("./footer_front-end.php"); ?>