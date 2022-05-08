<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
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
          <span>สมัครสมาชิก</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Register Section Begin -->
<section class="register spad">
  <div class="container">
    <form role="form" class="register__form">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5>สมัครสมาชิก</h5>
          <div class="row">      
            <div class="col-md-6 col-sm-6">
              <div class="register__form__input">
                <p for="firstname_regis">ชื่อ <span>*</span></p>
                <input type="text" id="firstname_regis" placeholder="ชื่อ">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="register__form__input">
                <p for="lastname_regis">นามสกุล <span>*</span></p>
                <input type="text" id="lastname_regis" placeholder="นามสกุล">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="register__form__input">
                <p for="address_regis">ที่อยู่ <span>*</span> </p>
                <input type="text" id="address_regis" placeholder="ที่อยู่">
              </div>
              <div class="register__form__input">
                <p for="tel_regis">เบอร์โทรศัพท์ <span>*</span></p>
                <input type="number" id="tel_regis" placeholder="เบอร์โทรศัพท์">
              </div>
              <div class="register__form__input">
                <p for="email_regis">อีเมล <span>*</span></p>
                <input type="email" id="email_regis" placeholder="อีเมล">
              </div>
              <div class="register__form__input">
                <p for="optradio">เพศ <span>*</span></p>
              </div>
              <div class="form-group">
                <div class="radio">
                  <label><input type="radio" name="optradio" value="1" checked> ชาย</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio" value="0"> หญิง</label>
                </div>
              </div>
              <div class="register__form__input">
                <p for="username_regis">ชื่อผู้ใช้ <span>*</span></p>
                <input type="text" id="username_regis" placeholder="ชื่อผู้ใช้">
              </div>
              <div class="register__form__input">
                <p for="pwd_regis">รหัสผ่าน <span>*</span></p>
                <input type="password" id="pwd_regis" placeholder="รหัสผ่าน">
              </div>
              <div class="register__form__input">
                <p for="confirm_pwd">ยืนยันรหัสผ่าน <span>*</span></p>
                <input type="password" id="confirm_pwd" placeholder="ยืนยันรหัสผ่าน">
              </div> 
              <button type="button" class="site-btn" id="btn_regis">สมัครสมาชิก</button>         
            </div>  
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Register Section End -->

<?php include("./footer_front-end.php"); ?>