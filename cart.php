<?php
include("./head_front-end.php");
include("./header_front-end.php");
?>
<br />
<div class="container" style="width:800px;">
  <?php
  if (isset($_POST["place_order"])) {
    $id = $_POST['user_id'];
    $order_address = $_POST['order_address'];
    $order_tel = $_POST['order_tel'];
    $order_email = $_POST['order_email'];
    $order_total = $_POST['order_total'];

    $insert_order = "  
                         INSERT INTO tb_order(user_id, order_address, order_tel, order_email, creation_date, order_status, order_total)  
                         VALUES('$id', '$order_address', '$order_tel', '$order_email', '" . date('Y-m-d') . "', 'pending', '$order_total')  
                         ";
    $order_id = "";
    if (mysqli_query($conn, $insert_order)) {
      $order_id = mysqli_insert_id($conn);
    }
    $_SESSION["order_id"] = $order_id;
    $order_details = "";
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      $order_details .= "  
                              INSERT INTO tb_order_detail(order_id, product_id, product_name, order_price, order_quantity)  
                              VALUES('$order_id', '$values[product_id]', '$values[product_name]', '$values[product_price]', '$values[product_quantity]');  
                              ";
    }
    if (mysqli_multi_query($conn, $order_details)) {
      unset($_SESSION["shopping_cart"]);
      echo '<script>alert("You have successfully place an order...Thank you")</script>';
      echo '<script>window.location.href="cart.php"</script>';
    }
  }

  if (isset($_SESSION["order_id"])) {
    $customer_details = '';
    $order_details = '';
    $total = 0;
    $query = '  
                     SELECT * FROM tb_order 
                     INNER JOIN tb_order_detail 
                     ON tb_order_detail.order_id = tb_order.order_id 
                     INNER JOIN tb_product
                     ON tb_product.product_id = tb_order_detail.product_id 
                     INNER JOIN tb_user 
                     ON tb_user.user_id = tb_order.user_id 
                     WHERE tb_order.order_id = "' . $_SESSION["order_id"] . '"  
                     ';
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      $customer_details = '  
                          <label>' . $row["user_name"] . '</label>  
                          <p>' . $row["order_address"] . '</p>  
                          <p>' . $row["order_tel"] . ', ' . $row["order_email"] . '</p>  
                          <p>' . $row["order_address"] . '</p>  
                          ';
      $order_details .= "  
                               <tr>  
                                    <td>" . $row["product_name"] . "</td>  
                                    <td>" . $row["order_quantity"] . "</td>  
                                    <td>" . $row["order_price"] . "</td>  
                                    <td>" . number_format($row["order_quantity"] * $row["order_price"], 2) . "</td>  
                               </tr>  
                          ";
      $total = $total + ($row["order_quantity"] * $row["order_price"]);
    }
  ?>
    <h3 align="center">Order Summary for Order No. <?php echo $_SESSION["order_id"]; ?></h3>
    <div class="table-responsive">
      <table class="table">
        <tr>
          <td><label>Customer Details</label></td>
        </tr>
        <tr>
          <td><?php echo $customer_details ?></td>
        </tr>
        <tr>
          <td><label>Order Details</label></td>
        </tr>
        <tr>
          <td>
            <table class="table table-bordered">
              <tr>
                <th width="50%">Product Name</th>
                <th width="15%">Quantity</th>
                <th width="15%">Price</th>
                <th width="20%">Total</th>
              </tr>
              <?php echo $order_details ?>
              <tr>
                <td colspan="3" align="right"><label>Total</label></td>
                <td><?php echo number_format($total, 2) ?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  <?php
  }
  ?>
</div>
<?php include("./footer_front-end.php"); ?>