<?php
include("./head_front-end.php");
include("./header_front-end.php");

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tb_user WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> หน้าแรก</a>
          <span>ข้อมูลส่วนตัว</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="profile spad">
  <div class="container">
    <form role="form" class="profile__form">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5>ข้อมูลส่วนตัว</h5>
          <div class="row">   
          <input type="hidden" id="user_id_profile" value="<?php echo $_SESSION['user_id']; ?>" placeholder="ID">   
            <div class="col-md-6 col-sm-6">
              <div class="profile__form__input">
                <p for="firstname_prfile">ชื่อ <span>*</span></p>
                <input type="text" id="firstname_profile" value="<?php echo $row['user_firstname']; ?>" placeholder="ชื่อ">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="profile__form__input">
                <p for="lastname_profile">นามสกุล <span>*</span></p>
                <input type="text" id="lastname_profile" value="<?php echo $row['user_lastname']; ?>" placeholder="นามสกุล">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="profile__form__input">
                <p for="address_profile">ที่อยู่ <span>*</span> </p>
                <input type="text" id="address_profile" value="<?php echo $row['user_address']; ?>" placeholder="ที่อยู่">
              </div>
              <div class="profile__form__input">
                <p for="tel_profile">เบอร์โทรศัพท์ <span>*</span></p>
                <input type="number" id="tel_profile" value="<?php echo $row['user_tel']; ?>" placeholder="เบอร์โทรศัพท์">
              </div>
              <div class="profile__form__input">
                <p for="email_profile">อีเมล <span>*</span></p>
                <input type="email" id="email_profile" value="<?php echo $row['user_email']; ?>" placeholder="อีเมล">
              </div>
              <div class="profile__form__input">
                <p for="optradio">เพศ <span>*</span></p>
              </div>
              <div class="form-group">
                <div class="radio">
                  <label><input type="radio" name="optradio" value="1" <?php if($row['user_sex']=="1"){ echo "checked";}?>> ชาย</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio" value="0" <?php if($row['user_sex']=="0"){ echo "checked";}?>> หญิง</label>
                </div>
              </div>
              <div class="profile__form__input">
                <p for="username_profile">ชื่อผู้ใช้ <span>*</span></p>
                <input type="text" id="username_profile" value="<?php echo $row['user_username']; ?>" placeholder="ชื่อผู้ใช้">
              </div>
              <div class="profile__form__input">
                <p for="pwd_profile">รหัสผ่าน <span>*</span></p>
                <input type="password" id="pwd_profile" placeholder="รหัสผ่าน">
              </div>
              <div class="profile__form__input">
                <p for="confirm_pwd">ยืนยันรหัสผ่าน <span>*</span></p>
                <input type="password" id="confirm_pwd" placeholder="ยืนยันรหัสผ่าน">
              </div> 
              <button type="button" class="site-btn" id="btn_profile">แก้ไขข้อมูล</button>         
            </div>  
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<?php include("./footer_front-end.php"); ?>