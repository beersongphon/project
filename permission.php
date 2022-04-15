<div class="product__item">
  <div class="product__item__pic set-bg" data-setbg="./upload/<?php echo $row["img_product"]; ?>">
    <div class="<?= $tableClass; ?>"><?= $txtTitle; ?></div>
    <!-- <div class="label new">New</div> -->
    <ul class="product__hover">
      <?php
      if (!isset($_SESSION["user_username"])) {
      ?>
      <li><a href="./upload/<?php echo $row["img_product"]; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
      <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> -->
      <li><a href="./login.php" onclick="<?php echo $confirm; ?>"><span class="icon_bag_alt"></span></a></li>
      <?php
      } else {
      ?>
      <li><a href="./upload/<?php echo $row["img_product"]; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
      <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> -->
      <li><a href="./product-details.php?product_id=<?php echo $row["product_id"]; ?>" onclick="<?php echo $confirm; ?>"><span class="icon_bag_alt"></span></a></li>
      <?php
      }
      ?>
    </ul>
  </div>
  <div class="product__item__text">
    <h6><a href="#"><?php echo $row["product_name"]; ?></a></h6>
    <!-- <div class="rating">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
    </div> -->
    <div class="product__price">฿ <?php echo number_format($row["product_price"], 2); ?></div>
  </div>
</div>