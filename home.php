<?php
include("./head_back-end.php");
include("./header_back-end.php");
?>

<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-heading">
  <h3>หน้าแรก</h3>
</div>
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-9">
      <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon blue">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <?php
                $sql = "SELECT COUNT(user_id) AS user_id FROM tb_user WHERE permission_id = '3'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">ข้อมูลลูกค้า</h6>
                  <h6 class="font-extrabold mb-0"><?php echo $row["user_id"]; ?></h6>
                </div>
                <?php
                  } //while condition closing bracket
                }  //if condition closing bracket
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon purple">
                    <i class="iconly-boldShow"></i>
                  </div>
                </div>
                <?php
                $sql = "SELECT COUNT(product_id) AS product_id FROM tb_product";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">ข้อมูลสินค้า</h6>
                  <h6 class="font-extrabold mb-0"><?php echo $row["product_id"]; ?></h6>
                </div>
                <?php
                  } //while condition closing bracket
                }  //if condition closing bracket
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon green">
                    <i class="iconly-boldAdd-User"></i>
                  </div>
                </div>
                <?php
                $sql = "SELECT COUNT(brand_id) AS brand_id FROM tb_brand";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">ข้อมูลยี่ห้อ</h6>
                  <h6 class="font-extrabold mb-0"><?php echo $row["brand_id"]; ?></h6>
                </div>
                <?php
                  } //while condition closing bracket
                }  //if condition closing bracket
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon red">
                    <i class="iconly-boldBookmark"></i>
                  </div>
                </div>
                <?php
                $sql = "SELECT COUNT(category_id) AS category_id FROM tb_category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">ข้อมูลประเภท</h6>
                  <h6 class="font-extrabold mb-0"><?php echo $row["category_id"]; ?></h6>
                </div>
                <?php
                  } //while condition closing bracket
                }  //if condition closing bracket
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Profile Visit</h4>
            </div>
            <div class="card-body">
              <div id="chart-profile-visit"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-4">
          <div class="card">
            <div class="card-header">
              <h4>Profile Visit</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <div class="d-flex align-items-center">
                    <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                      <use xlink:href="./assets/back-end/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                    </svg>
                    <h5 class="mb-0 ms-3">Europe</h5>
                  </div>
                </div>
                <div class="col-6">
                  <h5 class="mb-0">862</h5>
                </div>
                <div class="col-12">
                  <div id="chart-europe"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="d-flex align-items-center">
                    <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                      <use xlink:href="./assets/back-end/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                    </svg>
                    <h5 class="mb-0 ms-3">America</h5>
                  </div>
                </div>
                <div class="col-6">
                  <h5 class="mb-0">375</h5>
                </div>
                <div class="col-12">
                  <div id="chart-america"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="d-flex align-items-center">
                    <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                      <use xlink:href="./assets/back-end/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                    </svg>
                    <h5 class="mb-0 ms-3">Indonesia</h5>
                  </div>
                </div>
                <div class="col-6">
                  <h5 class="mb-0">1025</h5>
                </div>
                <div class="col-12">
                  <div id="chart-indonesia"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-8">
          <div class="card">
            <div class="card-header">
              <h4>Latest Comments</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-lg">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="col-3">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-md">
                            <img src="./assets/back-end/mazer/dist/assets/images/faces/5.jpg">
                          </div>
                          <p class="font-bold ms-3 mb-0">Si Cantik</p>
                        </div>
                      </td>
                      <td class="col-auto">
                        <p class=" mb-0">Congratulations on your graduation!</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="col-3">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-md">
                            <img src="./assets/back-end/mazer/dist/assets/images/faces/2.jpg">
                          </div>
                          <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                        </div>
                      </td>
                      <td class="col-auto">
                        <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                          this design?</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <div class="col-12 col-lg-3">
      <div class="card">
        <div class="card-body py-4 px-5">
          <div class="d-flex align-items-center">
            <div class="avatar avatar-xl">
              <img src="./assets/back-end/mazer/dist/assets/images/faces/1.jpg" alt="Face 1">
            </div>
            <?php
            $sql = "SELECT user_id, 
            CONCAT(user_firstname ,' ' , user_lastname) as user_name, 
            user_username 
            FROM tb_user WHERE user_id = $_SESSION[user_id]";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
            ?>
            <div class="ms-3 name">
              <h5 class="font-bold"><?php echo $row["user_name"] ?></h5>
              <h6 class="text-muted mb-0"><?php echo $row["user_username"] ?></h6>
            </div>
            <?php
              } //while condition closing bracket
            }  //if condition closing bracket
            ?>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>ข้อความล่าสุด</h4>
        </div>
        <div class="card-content pb-4">
          <?php
          $sql = "SELECT * FROM tb_contact WHERE user_id = '$_SESSION[user_id]' LIMIT 3";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
          ?>
          <div class="recent-message d-flex px-4 py-3">
            <div class="avatar avatar-lg">
              <img src="./assets/back-end/mazer/dist/assets/images/faces/4.jpg">
            </div>
            <div class="name ms-4">
              <h5 class="mb-1"><?php echo $row["contact_member"] ?></h5>
              <!-- <h6 class="text-muted mb-0"><?php //echo $row["contact_email"] ?></h6> -->
            </div>
          </div>
          <?php
            } //while condition closing bracket
          }  //if condition closing bracket
          ?>
          <!-- <div class="recent-message d-flex px-4 py-3">
            <div class="avatar avatar-lg">
              <img src="./assets/back-end/mazer/dist/assets/images/faces/5.jpg">
            </div>
            <div class="name ms-4">
              <h5 class="mb-1">Dean Winchester</h5>
              <h6 class="text-muted mb-0">@imdean</h6>
            </div>
          </div>
          <div class="recent-message d-flex px-4 py-3">
            <div class="avatar avatar-lg">
              <img src="./assets/back-end/mazer/dist/assets/images/faces/1.jpg">
            </div>
            <div class="name ms-4">
              <h5 class="mb-1">John Dodol</h5>
              <h6 class="text-muted mb-0">@dodoljohn</h6>
            </div>
          </div> -->
          <div class="px-4">
            <a href="./feedback.php" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>ดูข้อมูล Feedback</a>
          </div>
        </div>
      </div>
      <!-- <div class="card">
        <div class="card-header">
          <h4>Visitors Profile</h4>
        </div>
        <div class="card-body">
          <div id="chart-visitors-profile"></div>
        </div>
      </div> -->
    </div>
  </section>
</div>

<!-- <script src="./assets/back-end/mazer/dist/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="./assets/back-end/mazer/dist/assets/js/pages/dashboard.js"></script> -->

<?php include("./footer_back-end.php"); ?>