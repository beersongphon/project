<div class="product__item">
  <div class="product__item__pic set-bg" data-setbg="./upload/<?php echo $row['img_product']; ?>">
    <div class="<?= $tableClass; ?>"><?= $txtTitle; ?></div>
    <!-- <div class="label new">New</div> -->
    <ul class="product__hover">
      <?php
      if (isset($_SESSION['user_username'])) {
        echo "<li><a href='./upload/$row[img_product]' class='image-popup'><span class='arrow_expand'></span></a></li>";
        //echo "<li><a href='#'><span class='icon_heart_alt'></span></a></li>";
        echo "<li><a href='./product-details.php?product_id=$row[product_id]' onclick='$confirm'><span class='icon_bag_alt'></span></a></li>";
      } else {
        echo "<li><a href='./upload/$row[img_product]' class='image-popup'><span class='arrow_expand'></span></a></li>";
        //echo "<li><a href='#'><span class='icon_heart_alt'></span></a></li>";
        echo "<li><a href='./login.php' onclick='$confirm'><span class='icon_bag_alt'></span></a></li>";
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