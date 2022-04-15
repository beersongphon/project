<?php
include("./head_front-end.php");
include("./authguard.php");
include("./header_front-end.php");
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <a href="./shop.php">สินค้า</a>
          <span>ตะกร้าสินค้า</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
  <div class="container" id="order_table">
    <div class="row">
      <div class="col-lg-12">
        <div class="shop__cart__table">
          <table>
            <thead>
              <tr>
                <th>สินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(!empty($_SESSION["shopping_cart"])) {
              $total = 0;
              foreach($_SESSION["shopping_cart"] as $keys => $values) {
              ?>
              <tr>
                <td class="cart__product__item">
                  <img src="./upload/<?php echo $values["img_product"]; ?>" alt="" width="60" height="60">
                  <div class="cart__product__item__title">
                    <h6><?php echo $values["product_name"]; ?></h6>
                    <!-- <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div> -->
                  </div>
                </td>
                <td class="cart__price">฿ <?php echo number_format($values["product_price"], 2); ?></td>
                <td class="cart__quantity">
                  <div class="pro-qty">
                    <!-- <input type="text" value="1"> -->
                    <input type="text" value="<?php echo $values["order_quantity"]; ?>" style="width: 60px;" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="quantity" min="1">
                    <!-- <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["order_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="quantity"> -->
                  </div>
                </td>
                <td class="cart__total">฿ <?php echo number_format($values["order_quantity"] * $values["product_price"], 2); ?></td>
                <td class="cart__close"><span class="icon_close delete" name="delete" id="<?php echo $values["product_id"]; ?>"></span></td>
              </tr>
              <?php
              $total = $total + ($values["order_quantity"] * $values["product_price"]);
              }
            }
            else{
              ?>
              <tr>
                <td class="cart__not" colspan = "5">
                  <div class="cart__not__item__title">
                    <center><h6>ไม่มีสินค้าในตะกร้า</h6></center>
                  </div>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="cart__btn">
          <a href="./shop.php">ช้อปปิ้งต่อ</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="cart__btn update__btn">
          <!-- <a href="#"><span class="icon_loading"></span> Update cart</a> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="discount__content">
          <!-- <h6>Discount codes</h6>
          <form action="#">
            <input type="text" placeholder="Enter your coupon code">
            <button type="submit" class="site-btn">Apply</button>
          </form> -->
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="cart__total__procced">
          <h6>ยอดรวมในตะกร้า</h6>
          <ul>
            <!-- <li>Subtotal <span>$ 750.0</span></li> -->
            <li>ราคารวม 
              <?php
              if(!empty($_SESSION["shopping_cart"])) {
              ?>
              <span>฿ <?php echo number_format($total, 2); ?></span>
              <?php
              }
              else {
                $total = 0;
              ?>
              <span>฿ <?php echo number_format($total, 2); ?></span>
              <?php
              }
              ?>
            </li>
          </ul>
          <a href="./checkout.php" class="primary-btn">ดำเนินการชำระเงิน</a>
        </div>
      </div>
    </div>
</section>
<!-- Shop Cart Section End -->

<?php include("./footer_front-end.php"); ?>