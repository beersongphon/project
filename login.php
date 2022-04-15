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
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <span>เข้าสู่ระบบ</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
  <div class="container">
    <form role="form" class="login__form">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5>เข้าสู่ระบบ</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="login__form__input">
                <p for="user_name">ชื่อผู้ใช้</p>
                <input type="text" id="user_name" placeholder="ชื่อผู้ใช้">
              </div>
              <div class="login__form__input">
                <p for="pwd_login">รหัสผ่าน</p>
                <input type="password" id="pwd_login" placeholder="รหัสผ่าน">
              </div>
              <button type="button" class="site-btn" id="btn_login">เข้าสู่ระบบ</button>
            </div>    
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Login Section End -->

<?php include("./footer_front-end.php"); ?>