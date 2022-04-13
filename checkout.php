<?php
include("./head_front-end.php");
include("./authguard.php");
include("./header_front-end.php");


$user_id = $_SESSION["user_id"];
$sql = "SELECT user_id, 
CONCAT(user_firstname ,' ' , user_lastname) as user_name, 
user_address, 
user_email, 
user_tel 
FROM tb_user WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <a href="./shop.php">สินค้า</a>
          <a href="./shop-cart.php">ตะกร้าสินค้า</a>
          <span>การสั่งซื้อ</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <!-- <div class="row">
      <div class="col-lg-12">
        <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
          here to enter your code.</h6>
      </div>
    </div> -->
    <form action="save_order.php" method="post" class="checkout__form">
      <div class="row">
        <div class="col-lg-8">
          <h5>การสั่งซื้อ</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="checkout__form__input">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="checkout__form__input">
                <p>ชื่อ - นามสกุล <span>*</span></p>
                <input type="text" name="order_name" placeholder="ชื่อ - นามสกุล" value="<?php echo $row["user_name"]; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="checkout__form__input">
                <p>ที่อยู่ <span>*</span></p>
                <input type="text" name="order_address" placeholder="ที่อยู่" value="<?php echo $row["user_address"]; ?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="checkout__form__input">
                <p>อีเมล <span>*</span></p>
                <input type="text" name="order_email" placeholder="อีเมล" value="<?php echo $row["user_email"]; ?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="checkout__form__input">
                <p>เบอร์โทร <span>*</span></p>
                <input type="text" name="order_tel" placeholder="เบอร์โทร" value="<?php echo $row["user_tel"]; ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <?php  
          $i = 1;
          if(!empty($_SESSION["shopping_cart"])) {
          ?> 
          <div class="checkout__order">
            <h5>การสั่งซื้อของคุณ</h5>
            <div class="checkout__order__product">
              <ul>
                <li>
                  <span class="top__text">สินค้า</span>
                  <span class="top__text__right">ราคารวม</span>
                </li>
                <?php  
                $total = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values) {
                ?> 
                <li><?php echo $i; ?>. <?php echo $values['product_name']; ?> <span>฿ <?php echo number_format($values["product_price"], 2); ?></span></li>
                <?php  
                $total = $total + ($values["order_quantity"] * $values["product_price"]);
                $i++;
                }
                ?> 
              </ul>
            </div>
            <div class="checkout__order__total">
              <ul>
                <!-- <li>Subtotal <span>$ 750.0</span></li> -->
                <li>ราคารวม <span>฿ <?php echo number_format($total, 2); ?></span></li>
                <input type="hidden" name="order_total" value="<?php echo $total; ?>">
              </ul>
            </div>
         
            <!-- <div class="checkout__order__widget">
              <label for="o-acc">
                Create an acount?
                <input type="checkbox" id="o-acc">
                <span class="checkmark"></span>
              </label>
              <p>Create am acount by entering the information below. If you are a returing customer
                login at the top of the page.</p>
              <label for="check-payment">
                Cheque payment
                <input type="checkbox" id="check-payment">
                <span class="checkmark"></span>
              </label>
              <label for="paypal">
                PayPal
                <input type="checkbox" id="paypal">
                <span class="checkmark"></span>
              </label>
            </div> -->
            <button type="submit" name="place_order" class="site-btn">สั่งซื้อ</button>
          </div>
          <?php  
            }
          ?> 
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<?php include("./footer_front-end.php"); ?>