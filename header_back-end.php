<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="d-flex justify-content-between">
          <div class="logo">
            <a href="./home.php" style="font-family: 'Finger Paint', cursive; font-size: 20px;">Luxury by Fon</a>
            <!-- <a href="index.html"><img src="./assets/back-end/mazer/dist/assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
          </div>
          <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">รายการ</li>

          <li class="sidebar-item <?php if (basename($_SERVER["PHP_SELF"]) == "home.php") {
                                    echo "active";
                                  } else {
                                    echo "";
                                  } ?>">
            <a href="./home.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>หน้าแรก</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "customer.php") ? "active" : ""; ?>">
            <a href="./customer.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูลลูกค้า</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "product.php") ? "active" : ""; ?>">
            <a href="./product.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูลสินค้า</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "brand.php") ? "active" : ""; ?>">
            <a href="./brand.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูลยี่ห้อ</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "category.php") ? "active" : ""; ?>">
            <a href="./category.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูลประเภท</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "feedback.php") ? "active" : ""; ?>">
            <a href="./feedback.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูล Feedback</span>
            </a>
          </li>

          <!-- <li class="sidebar-title">รายงาน</li>
          <li class="sidebar-item <?= (basename($_SERVER["PHP_SELF"]) == "report_product.php") ? "active" : ""; ?>">
            <a href="./report_product.php" class="sidebar-link"> -->
              <!-- <i class="bi bi-file-earmark-medical-fill"></i> -->
              <!-- <span>รายงานสินค้าคงเหลือ</span>
            </a>
          </li> -->
          <li class="sidebar-item <?php if (basename($_SERVER["PHP_SELF"]) == "report_product_daily.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_product_monthy.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_product_yearly.php") {
                                    echo "active";
                                  }else {
                                    echo "";
                                  } ?> has-sub">
            <a href="#" class='sidebar-link'>
              <!-- <i class="bi bi-bar-chart-fill"></i> -->
              <span>รายงานสินค้าคงเหลือ</span>
            </a>
            <ul class="submenu <?php if (basename($_SERVER["PHP_SELF"]) == "report_product_daily.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_product_monthy.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_product_yearly.php") {
                                    echo "active";
                                  }else {
                                    echo "";
                                  } ?>">
              <li class="submenu-item  <?= (basename($_SERVER["PHP_SELF"]) == "report_product_daily.php") ? "active" : ""; ?>">
                <a href="./report_product_daily.php">รายงานสินค้าคงเหลือรายวัน</a>
              </li>
              <li class="submenu-item <?= (basename($_SERVER["PHP_SELF"]) == "report_product_monthy.php") ? "active" : ""; ?>">
                <a href="./report_product_monthy.php">รายงานสินค้าคงเหลือรายเดือน</a>
              </li>
              <li class="submenu-item <?= (basename($_SERVER["PHP_SELF"]) == "report_product_yearly.php") ? "active" : ""; ?>">
                <a href="./report_product_yearly.php">รายงานสินค้าคงเหลือรายปี</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item  <?= (basename($_SERVER["PHP_SELF"]) == "report_sale.php") ? "active" : ""; ?>">
            <a href="./report_sale.php" class="sidebar-link">
              <!-- <i class="bi bi-file-earmark-medical-fill"></i> -->
              <span>รายงานการขายสินค้า</span>
            </a>
          </li>
          <!-- <li class="sidebar-item <?php if (basename($_SERVER["PHP_SELF"]) == "report_sale_daily.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_sale_monthly.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_sale_yearly.php") {
                                    echo "active";
                                  }else {
                                    echo "";
                                  } ?> has-sub">
            <a href="#" class='sidebar-link'> -->
              <!-- <i class="bi bi-bar-chart-fill"></i> -->
              <!-- <span>รายงานการขายสินค้า</span>
            </a>
            <ul class="submenu <?php if (basename($_SERVER["PHP_SELF"]) == "report_sale_daily.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_sale_monthly.php") {
                                    echo "active";
                                  } elseif (basename($_SERVER["PHP_SELF"]) == "report_sale_yearly.php") {
                                    echo "active";
                                  }else {
                                    echo "";
                                  } ?>">
              <li class="submenu-item  <?= (basename($_SERVER["PHP_SELF"]) == "report_sale_daily.php") ? "active" : ""; ?>">
                <a href="./report_sale_daily.php">รายงานการขายสินค้ารายวัน</a>
              </li>
              <li class="submenu-item <?= (basename($_SERVER["PHP_SELF"]) == "report_sale_monthly.php") ? "active" : ""; ?>">
                <a href="./report_sale_monthly.php">รายงานการขายสินค้ารายเดือน</a>
              </li>
              <li class="submenu-item <?= (basename($_SERVER["PHP_SELF"]) == "report_sale_yearly.php") ? "active" : ""; ?>">
                <a href="./report_sale_yearly.php">รายงานการขายสินค้ารายปี</a>
              </li>
            </ul>
          </li> -->

          <li class="sidebar-title"></li>
          <li class="sidebar-item ">
            <a href="./logout.php" class="sidebar-link">
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ออกจากระบบ</span>
            </a>
          </li>

        </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
  <div id="main">