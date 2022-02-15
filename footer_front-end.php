<!-- Instagram Begin -->
<div class="instagram">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-1.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-2.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-3.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-4.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-5.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
        <div class="instagram__item set-bg" data-setbg="./assets/front-end/img/instagram/insta-6.jpg">
          <div class="instagram__text">
            <i class="fa fa-facebook"></i>
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank">Luxury by Fon</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Instagram End -->

<!-- Footer Section Begin -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-7">
        <div class="footer__about">
          <div class="footer__logo">
            <a href="./index.php" style="font-family: 'Finger Paint', cursive; font-size: 20px; color:#000000;">Luxury by Fon</a>
            <!-- <a href="./index.php"><img src="./assets/front-end/img/logo.png" alt=""></a> -->
          </div>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            cilisis.</p> -->
          <p>ชื่อบัญชี : น.ส.กรกนก ลีลาคุณารักษ์<br>ประเภทของบัญชี : ออมทรัพย์<br>ธนาคารกสิกร 052-1-3744-2</p>
          <div class="footer__payment">
            <a href="#"><img src="./assets/front-end/img/payment/payment-1.png" alt=""></a>
            <a href="#"><img src="./assets/front-end/img/payment/payment-2.png" alt=""></a>
            <a href="#"><img src="./assets/front-end/img/payment/payment-3.png" alt=""></a>
            <a href="#"><img src="./assets/front-end/img/payment/payment-4.png" alt=""></a>
            <a href="#"><img src="./assets/front-end/img/payment/payment-5.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-5">
        <div class="footer__widget">
          <h6>Quick links</h6>
          <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4">
        <div class="footer__widget">
          <h6>Account</h6>
          <ul>
          <?php
          if (!isset($_SESSION['user_username'])) {
          ?>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Orders Tracking</a></li>
            <li><a href="./login.php">Checkout</a></li>
            <!-- <li><a href="#">Wishlist</a></li> -->
          <?php
          } else {
          ?>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Orders Tracking</a></li>
            <li><a href="./checkout.php">Checkout</a></li>
            <!-- <li><a href="#">Wishlist</a></li> -->
          <?php
          }
          ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-8 col-sm-8">
        <div class="footer__newslatter">
          <h6>NEWSLETTER</h6>
          <!-- <form action="#">
            <input type="text" placeholder="Email">
            <button type="submit" class="site-btn">Subscribe</button>
          </form> -->
          <div class="footer__social">
            <a href="https://www.facebook.com/Luxury-by-Fon-106919777637043/" target="_blank"><i class="fa fa-facebook"></i></a>
            <!-- <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <div class="footer__copyright__text">
          <p>Copyright &copy; <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | <a href="./index.php" target="_blank">Luxury by Fon.</a></p>
        </div>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </div>
    </div>
  </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">+</div>
    <form class="search-model-form" method="post" action="./shop.php">
      <input type="search" name="txtSearch" id="search-input" placeholder="Search here....." value="<?php echo $strKeyword; ?>">
      <!-- <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>"> -->
    </form>
  </div>
</div>
<!-- Search End -->

<script src="./assets/js/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 $(function(){
    $(".dropdown-menu").on('click', 'li a', function(){
      $(".dropdown-toggle").text($(this).text());
   });
});
</script>

<script>
  $(document).ready(function(data) {
    $('.add_to_cart').click(function() {
      var product_id = $(this).attr("id");
      var img_product = $('#img' + product_id).val();
      var product_name = $('#name' + product_id).val();
      var product_qty = $('#qty' + product_id).val();
      var product_price = $('#price' + product_id).val();
      var product_quantity = $('#quantity' + product_id).val();
      var action = "add";
      if (product_quantity > 0) {
        $.ajax({
          url: "action.php",
          method: "POST",
          dataType: "json",
          data: {
            product_id: product_id,
            img_product: img_product,
            product_name: product_name,
            product_qty: product_qty,
            product_price: product_price,
            product_quantity: product_quantity,
            action: action
          },
          success: function(data) {
            $('#order_table').html(data.order_table);
            $('.badge').text(data.cart_item);
            //alert("Product has been Added into Cart");  
            Swal.fire({
              icon: 'success',
              title: ("Product has been Added into Cart"),
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              if (result.isDismissed) {
                window.location.replace("shop-cart.php");
                //console.log(product_id,product_img,product_name,product_price,product_quantity);
              }
            });
          }
        });
      } else {
        alert("Please Enter Number of Quantity")
      }
    });
    
    $(document).on('click', '.delete', function() {
      var product_id = $(this).attr("id");
      var action = "remove";
      if (confirm("Are you sure you want to remove this product?")) {
        $.ajax({
          url: "action.php",
          method: "POST",
          dataType: "json",
          data: {
            product_id: product_id,
            action: action
          },
          success: function(data) {
            $('#order_table').html(data.order_table);
            $('.badge').text(data.cart_item);
          }
        });
      } else {
        return false;
      }
    });
    $(document).on('keyup', '.quantity', function() {
      var product_id = $(this).data("product_id");
      var quantity = $(this).val();
      var action = "quantity_change";
      if (quantity != '') {
        $.ajax({
          url: "action.php",
          method: "POST",
          dataType: "json",
          data: {
            product_id: product_id,
            quantity: quantity,
            action: action
          },
          success: function(data) {
            $('#order_table').html(data.order_table);
          }
        });
      }
    });
  });
</script>

<!-- Action jQuery -->
<script>
  const price_per_hour = 150;
  // $(function() {
  //     $('#datetimepicker1').datetimepicker();
  // });

  $(document).ready(function() {
    // Footer - Initialize Tooltip - Link
    $('[data-toggle="tooltip"]').tooltip();

    // scrolling to all links in navbar + footer link [ ^ ]
    $(".navbar a, footer a[href='#page-top']").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {

        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Action เลื่อนหน้าจอ jQuery
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;

        });
      } // End if
    });

    $("#login").click(function() {
      // alert("login");
      var usr = $("#user_name").val();
      var pwd_login = $("#pwd_login").val();
      $.post("logins.php", {
        usr: usr,
        pwd_login: pwd_login
      }, function(datacallback) {
        if (datacallback == "login_success") {
          //location.reload();
          window.location.replace("index.php");
        } else {
          console.log(usr,pwd_login);
          alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ Username หรือ Password");
        }
      });
    });


    $("#btn_contact").click(function() {
      // alert("success");'
      var user_id_con = $("#user_id_con").val();
      var name_con = $("#name_contact").val();
      var email_con = $("#email_contact").val();
      var comments_con = $("#comments_contact").val();
      if (name_con == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (email_con == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (comments_con == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else {
        $.post("contacts.php", {
          user_id_con: user_id_con,
          name_con: name_con,
          email_con: email_con,
          comments_con: comments_con
        }, function(datacallback) {
          if (datacallback == "ส่งข้อมูลสำเร็จ") {
            alert(datacallback);
            location.reload();
          } else {
            alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
            // alert(datacallback);
          }
        });
      }
    });


    $("#form_payment").submit(function(e) {
    // alert("N");
    e.preventDefault();
    var formData = new FormData(this);
    // ส่งค่าไปแค่ราคา 1ชั่วโมง:170บาท  ไปที่ payment.php
    let order_id = $('#order_id').val();
    let pay_total = $('#pay_total').val();
    let fileToUpload = $("#fileToUpload").val();
    let pay_tel = $('#pay_tel').val();
      $.ajax({
        type: "POST",
        url: "payments.php",
        data: formData,
        success: function(data) {
          if (data == "imageonly") {
            alert("อนุญาติเฉพาะรูปภาพเท่านั้น");
          } else if (data == "exists") {
            alert("ชื่อไฟล์นี้มีในระบบแล้ว");
          } else if (data == "success") {
            alert("ดำเนินการเสร็จสิ้น");
            order_id
            pay_total
            fileToUpload
            pay_tel
            location.reload();
          } else if (data == "error") {
            alert("เกิดปัญหาการ insert db ผิดพลาด");
            console.log("order_id: " + order_id);
            console.log("pay_total: " + pay_total);
            console.log("pay_slip: " + fileToUpload);
            console.log("pay_tel: " + pay_tel);
            console.log("data: " + data);
          } else if (data == "movefilefail") {
            alert("เกิดปัญหาการการย้ายไฟล์ หรือตำแหน่งไดเรกทอรี่ผิดพลาด");
          } else {
            alert("ERROR: " + data);
            console.log("order_id: " + order_id);
            console.log("pay_total: " + pay_total);
            console.log("pay_slip: " + fileToUpload);
            console.log("pay_tel: " + pay_tel);
            console.log("data: " + data);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });

    $("#btn_regis").click(function() {
      var firstname_regis = $("#firstname_regis").val();
      var lastname_regis = $("#lastname_regis").val();
      var address_regis = $("#address_regis").val();
      var tel_regis = $("#tel_regis").val();
      var email_regis = $("#email_regis").val();
      var sex_regis = $("input[name=optradio]:checked").val();
      var username_regis = $("#username_regis").val();
      var pwd_regis = $("#pwd_regis").val();
      var confirm_pwd = $("#confirm_pwd").val();

      // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);
      
      if (firstname_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (lastname_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (address_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (tel_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (email_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (username_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (pwd_regis == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (confirm_pwd == "") {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      } else if (pwd_regis != confirm_pwd) {
        alert("กรุณาตรวจสอบรหัสผ่านของคุณอีกครั้ง");
        $("#pwd_regis").val("");
        $("#confirm_pwd").val("");
      } else {
        $.post("registers.php", {
          firstname_regis: firstname_regis,
          lastname_regis: lastname_regis,
          address_regis: address_regis,
          tel_regis: tel_regis,
          email_regis: email_regis,
          sex_regis: sex_regis,
          username_regis: username_regis,
          pwd_regis: pwd_regis,
          confirm_pwd: confirm_pwd
        }, function(datacallback) {
          if (datacallback == "success") {
            alert("ลงทะเบียนสำเร็จ");
            $("#firstname_regis").val("");
            $("#lastname_regis").val("");
            $("#address_regis").val("");
            $("#tel_regis").val("");
            $("#email_regis").val("");
            $("#username_regis").val("");
            $("#pwd_regis").val("");
            $("#confirm_pwd").val("");
            window.location.replace("login.php");
          } else if (datacallback == "already") {
            alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
            $("#username_regis").val("");
            $("#pwd_regis").val("");
            $("#confirm_pwd").val("");
          } else {
            alert("เกิดขึ้นผิดพลาด: " + datacallback);
          }
        });
      }
    });

    // ปุ่มจองพื้นมาสติกถูกกด
    $("#stadium_mastic").click(function() {
      var d = new Date();
      // ไม่ให้เลือกวันที่ที่เป็นอดีต https://stackoverflow.com/questions/43274559/how-do-i-restrict-past-dates-in-html5-input-type-date
      // https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_max_min
      // ค่าเดือนจะได้ค่า 0-11 : 0หมายถึงมกราคม, 11หมายถึงเดือนธันวาคม
      var month = d.getMonth();
      month = month + 1; // เพิ่ม month บวก 1 เข้าไปเพื่อให้อ่านเดือนได้แบบปกติ คือเดือน 1-12
      if (month < 10) {
        // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
        $('#date_reserve_mastic').attr('min', d.getFullYear() + "-0" + month + "-" + d.getDate());
      } else {
        // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
        $('#date_reserve_mastic').attr('min', d.getFullYear() + "-" + month + "-" + d.getDate());
      }
      $("#myModalReserveMastic").modal("show"); // สั่งให้ modal แสดง
    });

    // ปุ่มจองพื้นยางถูกกด
    $("#stadium_rubber").click(function() {
      var d = new Date();
      var month = d.getMonth();
      month = month + 1; // เพิ่ม month บวก 1 เข้าไปเพื่อให้อ่านเดือนได้แบบปกติ คือเดือน 1-12
      if (month < 10) {
        // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
        $('#date_reserve_mastic').attr('min', d.getFullYear() + "-0" + month + "-" + d.getDate());
      } else {
        // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
        $('#date_reserve_mastic').attr('min', d.getFullYear() + "-" + month + "-" + d.getDate());
      }
      $("#myModalReserveRubber").modal("show");
    });


    // ปุ่มยืมไม้แบตมินตัน
    $("#btlend_bad").click(function() {
      $("#myModalbad").modal("show"); // สั่งให้ modal แสดง
    });
    $("#bt_lend_modal_bad").click(function() {
      var lend_modal_bad = $("#lend_modal_bad").val();
      $.post("lend_racket.php", {
        lend_modal_bad: lend_modal_bad
      }, function(datacallback) {
        if (datacallback == "success") {
          alert("ยืมสำเร็จ");
          $("#myModalbad").modal("hide"); // สั่งให้ modal ปิด
        } else {
          alert("ยืมไม่สำเร็จ");
          alert(datacallback);
        }
      });
    });


    // ปุ่มยืมรองเท้า
    $("#btlend_shoes").click(function() {
      $("#myModalshoes").modal("show"); // สั่งให้ modal แสดง
    });
    $("#bt_lend_modal_shoes").click(function() {
      var lend_modal_shoes = $("#lend_modal_shoes").val();
      $.post("lend_shoes.php", {
        lend_modal_shoes: lend_modal_shoes
      }, function(datacallback) {
        if (datacallback == "success") {
          alert("ยืมสำเร็จ");
          $("#myModalshoes").modal("hide"); // สั่งให้ modal ปิด
        } else {
          alert("ยืมไม่สำเร็จ");
          alert(datacallback);
        }
      });
    });

    $("#btn_submit_stadium_mastic").click(function() {
      var date_reserve_mastic = $("#date_reserve_mastic").val();
      var time_reserve_mastic = $("#time_reserve_mastic").val();
      var stadium_reserve_mastic = $("#stadium_reserve_mastic").val();
      // Debug
      // alert(date_reserve_mastic + " " + time_reserve_mastic); // แสดงวัน/เวลาที่ได้

      // ตรวจสอบค่าว่าง
      if (date_reserve_mastic == "") {
        alert("กรุณากรอกวันที่จอง");
      } else if (time_reserve_mastic == "") {
        alert("กรุณากรอกเวลาจอง");
      } else {
        $.post("stadium_mastic.php", {
          date_reserve_mastic: date_reserve_mastic,
          time_reserve_mastic: time_reserve_mastic,
          stadium_reserve_mastic: stadium_reserve_mastic
        }, function(datacallback) {
          if (datacallback == "success") {
            alert("การจองเสร็จสิ้น");
            $("#date_reserve_mastic").val("");
            $("#time_reserve_mastic").val("13");
            $("#stadium_reserve_mastic").val("1"); // เช็ตค่าเริ่มต้นที่ <option value='1'></option>
            $("#myModalReserveMastic").modal("hide");
          } else if (datacallback == "timealready") {
            alert("กรุณาเลือกวัน/เวลาใหม่เนื่องจากสนามไม่ว่าง");
          } else if (datacallback == "timeout") {
            alert("จำนวนชั่วโมงไม่พอในการจอง");
          } else {
            alert("ERROR Please check #btn_submit_stadium_mastic.click : " + datacallback);
          }
        });
      }
    });

    $("#btn_submit_stadium_rubber").click(function() {
      var date_reserve_rubber = $("#date_reserve_rubber").val();
      var time_reserve_rubber = $("#time_reserve_rubber").val();
      var stadium_reserve_rubber = $("#stadium_reserve_rubber").val();
      // Debug
      // alert(date_reserve_rubber + " " + time_reserve_rubber); // แสดงวัน/เวลาที่ได้

      // ตรวจสอบค่าว่าง
      if (date_reserve_rubber == "") {
        alert("กรุณากรอกวันที่จอง");
      } else if (time_reserve_rubber == "") {
        alert("กรุณากรอกเวลาจอง");
      } else {
        $.post("stadium_rubber.php", {
          date_reserve_rubber: date_reserve_rubber,
          time_reserve_rubber: time_reserve_rubber,
          stadium_reserve_rubber: stadium_reserve_rubber
        }, function(datacallback) {
          if (datacallback == "success") {
            alert("การจองเสร็จสิ้น");
            $("#date_reserve_rubber").val("");
            $("#time_reserve_rubber").val("13");
            $("#stadium_reserve_rubber").val("1"); // เช็ตค่าเริ่มต้นที่ <option value='1'></option>
            $("#myModalReserveRubber").modal("hide");
          } else if (datacallback == "timealready") {
            alert("กรุณาเลือกวัน/เวลาใหม่เนื่องจากสนามไม่ว่าง");
          } else if (datacallback == "timeout") {
            alert("จำนวนชั่วโมงไม่พอในการจอง");
          } else {
            alert("ERROR Please check #btn_submit_stadium_rubber.click : " + datacallback);
          }
        });
      }
    });

    $("#time_add").change(function() {
      var hr = $("#time_add").val();
      var cost = hr * price_per_hour;
      $("#cost_add").text(cost);
      $("#addtime_cost").val(cost);
    });


    $(".btn_package").click(function() {
      var pck_time = $(this).data("package");
      var pck_cost = $(this).data("packagecost");
      // alert(pck_cost+" "+pck_time);
      $("#addtime_cost_package").val(pck_cost);
      $("#addtime_package").val(pck_time);
      $("#alertcost_add_package").text(pck_time);
      $("#myModalAddtimePackage").modal("show");
    });


    $("#form_addtime_package").submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "payment_package.php",
        data: formData,
        success: function(data) {
          if (data == "imageonly") {
            alert("อนุญาติเฉพาะรูปภาพเท่านั้น");
          } else if (data == "exists") {
            alert("ชื่อไฟล์นี้มีในระบบแล้ว");
          } else if (data == "success") {
            alert("ดำเนินการเสร็จสิ้น");
            $("#addtime_cost_package").val("");
            $("#addtime_package").val("");
            $("#fileToUploadPackage").val("");
            $("#myModalAddtimePackage").modal("hide");
          } else if (data == "error") {
            alert("เกิดปัญหาการ insert db ผิดพลาด");
          } else if (data == "movefilefail") {
            alert("เกิดปัญหาการการย้านไฟล์ หรือตำแหน่งไดเรกทอรี่ผิดพลาด");
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });

    $("#user_detail").click(function() {
      $.get("user_detail.php", function(datacallback) {
        $("#user_modal_body").html(datacallback);
      });
      $("#myModalUser").modal("show");
    });
  });
</script>

<!-- Js Plugins -->
<script src="./assets/front-end/js/jquery-3.3.1.min.js"></script>
<script src="./assets/front-end/js/bootstrap.min.js"></script>
<script src="./assets/front-end/js/jquery.magnific-popup.min.js"></script>
<script src="./assets/front-end/js/jquery-ui.min.js"></script>
<script src="./assets/front-end/js/mixitup.min.js"></script>
<script src="./assets/front-end/js/jquery.countdown.min.js"></script>
<script src="./assets/front-end/js/jquery.slicknav.js"></script>
<script src="./assets/front-end/js/owl.carousel.min.js"></script>
<script src="./assets/front-end/js/jquery.nicescroll.min.js"></script>
<script src="./assets/front-end/js/main.js"></script>
</body>
</html>