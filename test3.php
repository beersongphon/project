<?php
session_start();
require_once("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ใบสั่งซื้อสินค้า</title>
<style type="text/css">
.order-container {
	font-family:Tahoma, Geneva, sans-serif;
	margin:0px auto;
	width:950px;
	font-size:14px;
}
.order-head {
	margin:50px 0 10px 0;
}
.order-title {
	text-align:center;
	font-size:24px;
	font-weight:bold;
}
.order-head .order-customer {
	float:left;
	margin:10px 0 10px 0;
	padding:5px;
	border:1px solid #000;
}
.order-head .order-date {
	text-align:right;
	margin:10px 0 10px 0;
	float:right;
	padding:5px;
	border:1px solid #000;
}
.order-underline {
	border-bottom:#000 1px dashed;
}
.clear {
	clear:both;
}
</style>
</head>
<body>
<div class="order-container">
  <div class="order-title">ใบสั่งซื้อ</div>
  <?php
  if (isset($_POST["place_order"])) {
    $id = $_POST['user_id'];
    $order_address = $_POST['order_address'];
    $order_tel = $_POST['order_tel'];
    $order_email = $_POST['order_email'];
    $order_total = $_POST['order_total'];

    $insert_order = "
                    INSERT INTO tb_order(user_id, order_address, order_tel, order_email, order_date, order_total, status_id)  
                    VALUES('$id', '$order_address', '$order_tel', '$order_email', '" . date('Y-m-d') . "', '$order_total', '1')  
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
        $have =  $row['product_qty'];
        
        $stc = $have - $values["product_quantity"];
        
        $sql2 = "UPDATE tb_product SET  
        product_qty = $stc
        WHERE product_id = $values[product_id]";
        $query2 = mysqli_query($conn, $sql2);  
      }

      $order_details .= "
                        INSERT INTO tb_order_detail(order_id, product_id, order_price, order_quantity)  
                        VALUES('$order_id', '$values[product_id]', '$values[product_price]', '$values[product_quantity]');  
                        ";
    }
    if (mysqli_multi_query($conn, $order_details)) {
      unset($_SESSION["shopping_cart"]);
      echo '<script>alert("You have successfully place an order...Thank you")</script>';
      echo '<script>window.location.href="cart.php"</script>';
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
                              <span class='order-underline'>" . $row["user_firstname"] ." ". $row["user_lastname"] . "</span><br />
                              <b>ที่อยู่</b> 
                              <span class='order-underline'>" . $row['order_address'] ." </span><br />
                              <b>เบอร์โทรศัพท์</b> 
                              <span class='order-underline'>" . $row['order_tel'] ." </span>
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
                            <td>" . $row["product_id"] . "</td>  
                            <td>" . $row["product_name"] . "</td>  
                            <td>" . $row["order_quantity"] . "</td>  
                            <td>" . $row["order_price"] . "</td>  
                            <td>" . number_format($row["order_quantity"] * $row["order_price"], 2) . "</td>  
                          </tr>  
                        ";
      $total = $total + ($row["order_quantity"] * $row["order_price"]);
    }
  ?>

  <?php echo $customer_details ?>

  <div class="clear"></div>
  <div class="order-content">
    <table width="100%" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td><strong>รหัสสินค้า</strong></td>
        <td><strong>รายการ</strong></td>
        <td><strong>จำนวน</strong></td>
        <td><strong>ราคา/หน่วย</strong></td>
        <td><strong>ราคารวม</strong></td>
      </tr>
      <?php echo $order_details ?>
      <tr>
        <td colspan="4" align="right"><strong>รวมเงินทั้งสิ้น</strong></td>
        <td><?=$total?></td>
      </tr>
    </table>
  </div>
  <?php
      }
    ?>
</div>
</body>
</html>
<? $conn->Close();//ปิดการเชื่อมต่อกับฐานข้อมูล?>