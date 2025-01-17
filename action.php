<?php
//action.php  
session_start();
include("./connect.php");
if (isset($_POST["product_id"])) {
  $order_table = '';
  $message = '';
  if ($_POST["action"] == "add") {
    if (isset($_SESSION["shopping_cart"])) {
      $is_available = 0;
      foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($_SESSION["shopping_cart"][$keys]["product_id"] == $_POST["product_id"]) {
          $is_available++;
          $_SESSION["shopping_cart"][$keys]["order_quantity"] = $_SESSION["shopping_cart"][$keys]["order_quantity"] + $_POST["order_quantity"];
        }
      }
      if ($is_available < 1) {
        $item_array = array(
          'product_id' => $_POST["product_id"],
          'img_product' => $_POST["img_product"],
          'product_name' => $_POST["product_name"],
          'product_quantity' => $_POST["product_quantity"],
          'product_price' => $_POST["product_price"],
          'order_quantity' => $_POST["order_quantity"]
        );
        $_SESSION["shopping_cart"][] = $item_array;
      }
    } else {
      $item_array = array(
        'product_id' => $_POST["product_id"],
        'img_product' => $_POST["img_product"],
        'product_name' => $_POST["product_name"],
        'product_quantity' => $_POST["product_quantity"],
        'product_price' => $_POST["product_price"],
        'order_quantity' => $_POST["order_quantity"]
      );
      $_SESSION["shopping_cart"][] = $item_array;
    }
  }
  if ($_POST["action"] == "remove") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["product_id"] == $_POST["product_id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        //$message = '<label class="text-success">Product Removed</label>';
      }
    }
  }
  if ($_POST["action"] == "quantity_change") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($_SESSION["shopping_cart"][$keys]["product_id"] == $_POST["product_id"]) {
        $_SESSION["shopping_cart"][$keys]["order_quantity"] = $_POST["quantity"];
      }
    }
  }
  $order_table .= '  
           '.$message.'  
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
           ';
  if (!empty($_SESSION["shopping_cart"])) {
    $total = 0;
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      $order_table .= ' 
                <tr>
                  <td class="cart__product__item">
                    <img class="col-2" src="./upload/'.$values["img_product"].'" alt="">
                    <div class="cart__product__item__title">
                      <h6>'.$values["product_name"].'</h6>
                      <!-- <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div> -->
                    </div>
                  </td>
                  <td class="cart__price">฿ '.number_format($values["product_price"], 2).'</td>
                  <td class="cart__quantity">
                    <div class="pro-qty">
                      <input type="text" value="'.$values["order_quantity"].'" style="width: 60px;" name="quantity[]" id="quantity'.$values["product_id"].'" data-product_id="'.$values["product_id"].'" class="quantity">
                      <!-- <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["order_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="quantity"> -->
                    </div>
                  </td>
                  <td class="cart__total">฿ '.number_format($values["order_quantity"] * $values["product_price"], 2).'</td>
                  <td class="cart__close"> <span class="icon_close delete" name="delete" id="'.$values["product_id"].'"></span></td>
                </tr> 
                ';
      $total = $total + ($values["order_quantity"] * $values["product_price"]);
    }
  } else {
    $order_table .= '
                <tr>
                <td class="cart__not" colspan = "5">
                  <div class="cart__not__item__title">
                    <center><h6>ไม่มีสินค้าในตะกร้า</h6></center>
                  </div>
                </td>
                </tr>
                ';
  }
  $order_table .= '
              </tbody>
            </table>
          </div>
        </div>
      </div>';
  $order_table .= '
     <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="cart__btn">
          <a href="./shop.php">เลือกสินค้าต่อ</a>
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
            <!-- <li>Subtotal <span>฿ 750.0</span></li> -->
            <li>ราคารวม ';
  if (!empty($_SESSION["shopping_cart"])) {
    $order_table .= '
              <span>฿ '.number_format($total, 2).'</span>';
  } else {
    $total = 0;
    $order_table .= '
              <span>฿ '.number_format($total, 2).'</span>';
  }
  $order_table .= '
            </li>
          </ul>
          <a href="./checkout.php" class="primary-btn">ดำเนินการชำระเงิน</a>
        </div>
      </div>
    </div>
    <script src="./assets/front-end/js/main.js"></script>';
  $output = array(
    'order_table' => $order_table,
    'cart_item' => count($_SESSION["shopping_cart"])
  );
  echo json_encode($output);
}
