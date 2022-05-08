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
          <span>ติดต่อเรา</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="contact__content">
          <div class="contact__address">
            <h5>ข้อมูลติดต่อ</h5>
            <ul>
              <!-- <li>
                <h6><i class="fa fa-map-marker"></i> ที่อยู่</h6>
                <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
              </li> -->
              <li>
                <h6><i class="fa fa-phone"></i> เบอร์โทร</h6>
                <p><span>082 459 6429</span></p>
                <!-- <p><span>082 459 6429</span><span>125-668-886</span></p> -->
              </li>
              <li>
                <h6><i class="fa fa-headphones"></i> สนับสนุน</h6>
                <p>thanapa5050@gmail.com</p>
              </li>
            </ul>
          </div>
          <div class="contact__form">
            <h5>ส่งข้อความ</h5>
            <form action="#">
              <input type="text" id="name_contact" name="name" placeholder="ชื่อ">
              <input type="email" id="email_contact" name="email" placeholder="อีเมล">
              <!-- <input type="text" placeholder="Website"> -->
              <textarea id="comments_contact" name="comments" placeholder="แสดงความคิดเห็น"></textarea>
              <button type="button" id="btn_contact" class="site-btn">ส่งข้อความ</button>
            </form>
          </div>
        </div>
      </div>
      <!-- <div class="col-lg-6 col-md-6">
        <div class="contact__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd" height="780" style="border:0" allowfullscreen="">
          </iframe>
        </div>
      </div> -->
    </div>
  </div>
</section>
<!-- Contact Section End -->

<?php include("./footer_front-end.php"); ?>