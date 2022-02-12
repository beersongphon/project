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
          <a href="./index.php"><i class="fa fa-home"></i> Home</a>
          <span>Register</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <form role="form" class="register__form">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5>Register</h5>
          <div class="row">      
            <div class="col-md-6 col-sm-6">
              <div class="register__form__input">
                <p for="firstname_regis">Firstname <span>*</span></p>
                <input type="text" id="firstname_regis" placeholder="Enter Firstname">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="register__form__input">
                <p for="lastname_regis">Lastname <span>*</span></p>
                <input type="text" id="lastname_regis" placeholder="Enter Lastname">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="register__form__input">
                <p for="address_regis">Address <span>*</span> </p>
                <input type="text" id="address_regis" placeholder="Enter Address">
              </div>
              <div class="register__form__input">
                <p for="tel_regis">Telephone number <span>*</span></p>
                <input type="number" id="tel_regis" placeholder="Enter Telephone number">
              </div>
              <div class="register__form__input">
                <p for="email_regis">Email <span>*</span></p>
                <input type="email" id="email_regis" placeholder="Enter Email">
              </div>
              <div class="register__form__input">
                <p for="optradio">Sex <span>*</span></p>
              </div>
              <div class="form-group">
                <div class="radio">
                  <label><input type="radio" name="optradio" value="1" checked>Male</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio" value="0">Female</label>
                </div>
              </div>
              <div class="register__form__input">
                <p for="username_regis">Username <span>*</span></p>
                <input type="text" id="username_regis" placeholder="Enter Username">
              </div>
              <div class="register__form__input">
                <p for="pwd_regis">Password <span>*</span></p>
                <input type="password" id="pwd_regis" placeholder="Enter Password">
              </div>
              <div class="register__form__input">
                <p for="confirm_pwd">Confirm Password <span>*</span></p>
                <input type="password" id="confirm_pwd" placeholder="Confirm password">
              </div> 
              <button type="button" class="site-btn" id="btn_regis">Register</button>         
            </div>  
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<?php include("./footer_front-end.php"); ?>