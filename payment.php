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
          <span>การชำระเงิน</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <form class="payment__form" role="form" method="post" id="form_payment" name="form_payment" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-8">
          <h5>การชำระเงิน</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="payment__form__input">
                <!-- <p>ID <span>*</span></p> -->
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              </div>
            </div>
            <!-- <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment__form__input">
                <p>ชื่อ <span>*</span></p>
                <input type="text" name="name" id="name">
              </div>
            </div> -->
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment__form__input">
                <p>เบอร์โทรศัพท์ <span>*</span></p>
                <input type="text" name="pay_tel" id="pay_tel">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment__form__input">
                <p>รายการสั่งซื้อ <span>*</span></p>
                <select name="order_id" id="order_id" aria-label="Default select example">
                  <?php
                  $i = 1;
                  $sql = "SELECT DISTINCT *
                  FROM tb_order
                  LEFT JOIN
                  tb_user
                  ON
                  tb_order.user_id = tb_user.user_id
                  -- LEFT JOIN
                  -- tb_payment
                  -- ON
                  -- tb_order.order_id = tb_payment.order_id
                  WHERE tb_order.user_id = $_SESSION[user_id] AND tb_order.status_id = '1'
                  ";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $row["order_id"]; ?>">#<?php echo $row["order_id"]; ?> (รวมทั้งหมด ฿ <?php echo number_format($row["order_total"], 2); ?>)</option>
                  <?php
                      $i++;
                    } //while condition closing bracket
                  }  //if condition closing bracket
                  ?>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment__form__input">
                <p>จำนวนเงินที่โอน <span>*</span></p>
                <input type="text" name="pay_total" id="pay_total">
              </div>
            </div> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment__form__input">
                <p>หลักฐานการโอน <span>*</span></p>
              </div>
              <div class="row">
                <div class="input-group mb-3">
                  <input id="fileToUpload" name="fileToUpload" type="file" class="form-control" required>
                </div>
              </div>
              <!-- <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
              </div> -->
            </div> 
          </div>
          <button class="site-btn" type="submit" name="submit">
            บันทึก
          </button>
        </div>
        
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->
<?php include("./footer_front-end.php"); ?>