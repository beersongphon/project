<?php
include("./head_front-end.php");
include("./header_front-end.php");
?>
<br />
<div class="order-container">
  <div class="order-title">ใบสั่งซื้อ</div>
  <?php
  if (isset($_POST["place_order"])) {
    $id = $_POST['user_id'];
    $order_name = $_POST['order_name'];
    $order_address = $_POST['order_address'];
    $order_tel = $_POST['order_tel'];
    $order_email = $_POST['order_email'];
    $order_date = date('Y-m-d');
    $order_total = $_POST['order_total'];

    $insert_order = "
                    INSERT INTO tb_order(user_id, order_name, order_address, order_tel, order_email, order_date, order_total, status_id)  
                    VALUES('$id', '$order_name', '$order_address', '$order_tel', '$order_email', '$order_date', '$order_total', '1')  
                    ";
    $order_id = "";
    if (mysqli_query($conn, $insert_order)) {
      $order_id = mysqli_insert_id($conn);
    }

    $_SESSION["order_id"] = $order_id;
    $order_details = "";
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      
      $sql	= "SELECT * FROM tb_product WHERE product_id = $values[product_id]";
      $result	= mysqli_query($conn, $sql);
      $row	= mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
      for($i=0; $i<$count; $i++){
        $have =  $row['product_quantity'];
        
        $stc = $have - $values["order_quantity"];
        
        $sql2 = "UPDATE tb_product SET  
        product_quantity = $stc
        WHERE product_id = $values[product_id]";
        $query2 = mysqli_query($conn, $sql2);  
      }

      $order_details .= "
                        INSERT INTO tb_order_detail(order_id, product_id, order_price, order_quantity)  
                        VALUES('$order_id', '$values[product_id]', '$values[product_price]', '$values[order_quantity]');  
                        ";
    }
    if (mysqli_multi_query($conn, $order_details)) {
      unset($_SESSION["shopping_cart"]);
      echo '<script>alert("You have successfully place an order...Thank you")</script>';
      echo '<script>window.location.href="payment.php"</script>';
    }
  }

  if (isset($_SESSION["order_id"])) {
    $customer_details = "";
    $order_details = "";
    $total = 0;
    $query = "SELECT * FROM tb_order 
              INNER JOIN tb_order_detail 
              ON tb_order_detail.order_id = tb_order.order_id 
              INNER JOIN tb_product
              ON tb_product.product_id = tb_order_detail.product_id 
              INNER JOIN tb_user 
              ON tb_user.user_id = tb_order.user_id 
              WHERE tb_order.order_id = '$_SESSION[order_id]'  
              ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      $customer_details = "  
                          <div class='order-head'>
                            <div class='order-customer'> <b>ชื่อ-สกุล</b> 
                              <span class='order-underline'>" . $row["order_name"] ."</span><br />
                              <b>ที่อยู่</b> 
                              <span class='order-underline'>" . $row['order_address'] ." </span><br />
                              <b>เบอร์โทรศัพท์</b> 
                              <span class='order-underline'>" . $row['order_tel'] ." </span><br />
                              <b>อีเมล</b> 
                              <span class='order-underline'>" . $row['order_email'] ." </span>
                            </div>
                            <div class='order-date'> 
                              <b>เลขที่ใบสั่งซื้อ</b>
                              <span class='order-underline'>" . $_SESSION["order_id"] ." </span><br />
                              <b>วันที่สั่งซื้อ</b>
                              <span class='order-underline'>" . $row['order_date'] ." </span>
                            </div>
                          </div>
                          ";
 
      $order_details .= "  
                          <tr>  
                            <td>" . $row["product_name"] . "</td>  
                            <td align='center'>" . $row["order_price"] . "</td>  
                            <td align='center'>" . $row["order_quantity"] . "</td>  
                            <td align='right'>" . number_format($row["order_quantity"] * $row["order_price"], 2) . "</td>  
                          </tr>  
                        ";
      $total = number_format($total + $row["order_quantity"] * $row["order_price"], 2);
    }
  ?>

  <?php echo $customer_details ?>

  <div class="clear"></div>
  <div class="order-content">
    <table width="100%" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td><strong>สินค้า</strong></td>
        <td align="center"><strong>ราคา</strong></td>
        <td align="center"><strong>จำนวน</strong></td>
        <td align="right"><strong>ราคารวม</strong></td>
      </tr>
      <?php echo $order_details ?>
      <tr>
        <td colspan="3" align="right"><strong>รวมเงินทั้งสิ้น</strong></td>
        <td align="right"><?=$total?></td>
      </tr>
    </table>
  </div>
  <?php
  }
  ?>
</div>

<br>
<?php include("./footer_front-end.php"); ?>