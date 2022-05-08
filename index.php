<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./head_front-end.php");
include("./header_front-end.php");
?>

<!-- Categories Section Begin -->
<section class="categories">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 p-0">
        <div class="categories__item categories__large__item set-bg" data-setbg="./assets/img/category-1.jpg">
          <div class="categories__text">
            <h1 style="font-family: Sriracha, cursive;">สินค้า</h1>
            <?php
            $sql = "SELECT COUNT(*) AS product_count 
            FROM tb_product
            WHERE product_quantity NOT IN ('0')";
            $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
            if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
              # output data of each row
              # วนลูปแสดงข้อมูล
              while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
            ?>
            <p>จำนวน <?php echo $row["product_count"]; ?></p>
            <?php
              } # while condition closing bracket
            } # if condition closing bracket
            ?>
            <a href="./shop.php">Shop now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="section-title">
          <h4>สินค้าใหม่</h4>
        </div>
      </div>
      <div class="col-lg-8 col-md-8">
        <ul class="filter__controls">
          <li class="active" data-filter="*">ทั้งหมด</li>
          <?php
          $sql = "SELECT DISTINCT 
          (SELECT DISTINCT tb_product.product_id FROM tb_product
          WHERE tb_category.category_id = tb_product.category_id LIMIT 1) AS product_id,
          tb_category.category_name
          FROM tb_product
          LEFT JOIN
          tb_category
          ON
          tb_product.category_id = tb_category.category_id
          WHERE tb_product.product_quantity NOT IN ('0')
          ORDER BY product_id DESC
          LIMIT 5";
          $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
          if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
            # output data of each row
            # วนลูปแสดงข้อมูล
            while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
          ?>
          <li data-filter=".<?php echo $row["category_name"]; ?>"><?php echo $row["category_name"]; ?></li>
          <?php 
            }
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="row property__gallery">
      <?php
      // ASC เรียงน้อยไปมาก
      // DESC เรียงมากไปน้อย
      $sql = "SELECT DISTINCT tb_product.product_id,
      (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
      tb_product.product_name,
      tb_category.category_name, 
      tb_product.product_price,
      tb_product.product_quantity,
      tb_product.product_description
      FROM tb_product
      LEFT JOIN
      tb_img_product
      ON
      tb_product.product_id = tb_img_product.product_id
      LEFT JOIN
      tb_category
      ON
      tb_product.category_id = tb_category.category_id
      WHERE tb_product.product_quantity NOT IN ('0')
      ORDER BY tb_product.product_id DESC
      LIMIT 8";
      $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
      if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
        # output data of each row
        # วนลูปแสดงข้อมูล
        while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
          include("./checkstock.php");
      ?>
      <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $row["category_name"]; ?>">
        <?php include("./permission.php"); ?>
      </div>
      <?php
        } //while condition closing bracket
      }  //if condition closing bracket
      ?>
    </div>
  </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="./assets/img/banner-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-xl-7 col-lg-8 m-auto">
        <div class="banner__slider owl-carousel">
          <?php
          $sql = "SELECT * FROM tb_category";
          $result = $conn->query($sql); # query ข้อมูลในฐานข้อมูลมาแสดง
          if ($result->num_rows > 0) { # query ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
            # output data of each row
            # วนลูปแสดงข้อมูล
            while ($row = $result->fetch_assoc()) { # ส่งค่าทั้งแบบ assoc และ row
          ?>
          <div class="banner__item">
            <div class="banner__text">
              <!-- <span>The Chloe Collection</span> -->
              <h1><?php echo $row['category_name'];?></h1>
              <!-- <a href="./shop.php">Shop now</a> -->
              <a href="./shop.php?category_id=<?= $row["category_id"]; ?>&category_name=<?= $row["category_name"]; ?>">Shop now</a>
            </div>
          </div>
          <?php
            } //while condition closing bracket
          }  //if condition closing bracket
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner Section End -->

<!-- Services Section Begin -->
<section class="services spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-support"></i>
          <!-- <h6>Online Support 24/7</h6> -->
          <h6>การสนับสนุนออนไลน์</h6>
          <p>การสนับสนุนโดยเฉพาะ</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-headphones"></i>
          <h6>การชำระเงินที่ปลอดภัย</h6>
          <p>การชำระเงินที่ปลอดภัย 100%</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services Section End -->

<?php include("./footer_front-end.php"); ?>