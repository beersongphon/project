<?php
include("./head_front-end.php");
include("./header_front-end.php");
?>
<br />
<div class="order-container">
  <div class="order-title">ใบสั่งซื้อ</div>
  <?php
  if (isset($_GET["order_id"])) {
    $customer_details = "";
    $order_details = "";
    $total = 0;
    $query = "SELECT * FROM tb_order 
              INNER JOIN tb_order_detail 
              ON tb_order_detail.order_id = tb_order.order_id 
              INNER JOIN tb_product
              ON tb_product.product_id = tb_order_detail.product_id 
              INNER JOIN tb_brand
              ON tb_brand.brand_id = tb_product.brand_id 
              INNER JOIN tb_user 
              ON tb_user.user_id = tb_order.user_id 
              INNER JOIN tb_status 
              ON tb_status.status_id = tb_order.status_id 
              WHERE tb_order.order_id = '$_GET[order_id]'   
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
                              <span class='order-underline'>" . $_GET["order_id"] ." </span><br />
                              <b>วันที่สั่งซื้อ</b>
                              <span class='order-underline'>" . $row['order_date'] ." </span><br />
                              <b>สถานะ</b>
                              <span class='order-underline'>" . $row['status_name'] ." </span>
                            </div>
                          </div>
                          ";
 
      $order_details .= "  
                          <tr>  
                            <td>".$row["product_name"]." ยี่ห้อ : ".$row["brand_name"]."</td>  
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