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
          <a href="./index.html"><i class="fa fa-home"></i> Home</a>
          <span>Shopping cart</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
  <?php  
  if(!empty($_SESSION["shopping_cart"])) {
  ?>  
  <div class="container" id="order_table">
    <div class="row">
      <div class="col-lg-12">
        <div class="shop__cart__table">
          <table>
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
              $total = 0;  
              foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {
            ?>  
              <tr>
                <td class="cart__product__item">
                  <img src="./assets/front-end/img/shop-cart/cp-1.jpg" alt="">
                  <div class="cart__product__item__title">
                    <h6><?php echo $values["product_name"]; ?></h6>
                    <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                </td>
                <td class="cart__price">฿ <?php echo number_format($values["product_price"], 2); ?></td>
                <td class="cart__quantity">
                  <div class="pro-qty">
                    <!-- <input type="text" value="1"> -->
                    <input type="text" value="<?php echo $values["product_quantity"]; ?>" style="width: 60px;" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" min="1">
                    <!-- <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="quantity"> -->
                  </div>
                </td>
                <td class="cart__total">฿ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
                <td class="cart__close"><span class="icon_close delete" name="delete" id="<?php echo $values["product_id"]; ?>"></span></td>
                
              </tr>
              <?php  
              $total = $total + ($values["product_quantity"] * $values["product_price"]);  
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
          <a href="#">Continue Shopping</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="cart__btn update__btn">
          <a href="#"><span class="icon_loading"></span> Update cart</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="discount__content">
          <h6>Discount codes</h6>
          <form action="#">
            <input type="text" placeholder="Enter your coupon code">
            <button type="submit" class="site-btn">Apply</button>
          </form>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="cart__total__procced">
          <h6>Cart total</h6>
          <ul>
            <!-- <li>Subtotal <span>$ 750.0</span></li> -->
            <li>Total <span>฿ <?php echo number_format($total, 2); ?></span></li>
          </ul>
          <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>
        </div>
      </div>
    </div>
    <?php  
    }  
    ?>  
  </div>
</section>
<!-- Shop Cart Section End -->

<?php include("./footer_front-end.php"); ?>