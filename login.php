<?php
include("./head.php");
include("./header.php");
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.php"><i class="fa fa-home"></i> Home</a>
          <span>Shop</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <form role="form" class="checkout__form">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5>Login</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="checkout__form__input">
                <p for="user_name">Username <span>*</span></p>
                <input type="text" id="user_name" placeholder="Enter username">
              </div>
              <div class="checkout__form__input">
                <p for="pwd_login">Password <span>*</span></p>
                <input type="password" id="pwd_login" placeholder="Enter password">
              </div>
            </div>  
            <button type="button" class="site-btn" id="login">login</button>
          </div>
        </div>
       
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<?php include("./footer.php"); ?>