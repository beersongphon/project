<?php  
 //action.php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "dbproject");  
 if(isset($_POST["product_id"]))  
 {  
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shopping_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {  
                     if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                     {  
                          $is_available++;  
                          $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'product_id'               =>     $_POST["product_id"],  
                          'product_name'               =>     $_POST["product_name"],  
                          'product_price'               =>     $_POST["product_price"],  
                          'product_quantity'          =>     $_POST["product_quantity"]  
                     );  
                     $_SESSION["shopping_cart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'product_id'               =>     $_POST["product_id"],  
                     'product_name'               =>     $_POST["product_name"],  
                     'product_price'               =>     $_POST["product_price"],  
                     'product_quantity'          =>     $_POST["product_quantity"]  
                );  
                $_SESSION["shopping_cart"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["product_id"] == $_POST["product_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     $message = '<label class="text-success">Product Removed</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                {  
                     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];  
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
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th></th>
               </tr>
               </thead>
               <tbody>
           ';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= ' 
                <tr>
                <td class="cart__product__item">
                  <img src="./assets/front-end/img/shop-cart/cp-1.jpg" alt="">
                  <div class="cart__product__item__title">
                    <h6>'.$values["product_name"].'</h6>
                    <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                </td>
                <td class="cart__price">฿ '.$values["product_price"].'</td>
                <td class="cart__quantity">
                  <div class="pro-qty">
                    <input type="text" value="'.$values["product_quantity"].'" style="width: 60px;" name="quantity[]" id="quantity'.$values["product_id"].'" data-product_id="'.$values["product_id"].'" class="form-control quantity">
                    <!-- <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="quantity"> -->
                  </div>
                </td>
                <td class="cart__total">฿ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
                <td class="cart__close"> <span class="icon_close delete" name="delete" id="'.$values["product_id"].'"></span></td>
              </tr> 
                ';  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
           }  
           $order_table .= '  
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
            <li>Total <span>$ '.number_format($total, 2).'</span></li>
          </ul>
          <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>
        </div>
      </div>
    </div>
    <script src="./assets/front-end/js/main.js"></script>';  
      }   
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }  
 ?>
