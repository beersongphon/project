<?php
include('./head_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
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
          <li class="sidebar-item active">
            <a href="./product.php" class='sidebar-link'>
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ย้อนกลับ</span>
            </a>
          </li>
        </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>เพิ่มข้อมูลสินค้า</h3>
            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="./product.php">ข้อมูลสินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลสินค้า</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <!-- Hoverable rows start -->
      <section class="section">
        <div class="row" id="table-hover-row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
            <h4 class="card-title">ข้อมูลสินค้า</h4>
          </div> -->
              <div class="card-content">
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row p-5">
                      <table id="image_list" class="table"></table>
                    </div>
                    <div class="row">
                      <div class="input-group mb-3">
                        <input id='files' name="files[]" type="file" class="form-control" required multiple>
                        <!-- <input id="file" name="file" type="file" class="form-control" required> -->
                        <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                          อัปโหลดรูปภาพ
                        </button>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="product_name" class=" form-control-label">ชื่อสินค้า</label>
                      <input type="text" id="product_name" name="product_name" placeholder="ชื่อสินค้า" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="brand_id" class=" form-control-label">ยี่ห้อ</label>
                      <select class="form-select" id="brand_id" name="brand_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_brand";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row["brand_id"]; ?>">
                            <?php echo $row["brand_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="category_id" class=" form-control-label">ประเภท</label>
                      <select class="form-select" id="category_id" name="category_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_category";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row["category_id"]; ?>">
                            <?php echo $row["category_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_price" class=" form-control-label">ราคา</label>
                      <input type="text" id="product_price" name="product_price" placeholder="ราคา" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="product_qty" class=" form-control-label">จำนวน</label>
                      <input type="text" id="product_qty" name="product_qty" placeholder="จำนวน" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="product_description" class=" form-control-label">รายละเอียด</label>
                      <input type="text" id="product_description" name="product_description" placeholder="รายละเอียด" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="createProduct()">
                      ยืนยัน
                    </button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Hoverable rows end -->
    </div>

    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
      var listImage = new Array();
      var image_list = $("#image_list");
      var upload = $("#btn_upload");

      $(document).ready(function() {
        let product_id = $('#product_id').val();
        $.ajax({
          url: 'query/get_all_image_product.php',
          type: 'post',
          data: {
            'product_id': product_id
          },
          dataType: 'json',
          success: function(result) {
            result.forEach((data) => {
              listImage.push(data.img_product);
              image_list.append(`
              <tr>
                <td>
                  <img src="upload/${data.img_product}" style="width: 150px;"> 
                </td>    
                <td>
                  <button class="btn btn-danger" style="background-color: #dc3545;" onclick="deleteImage('${data.img_product}')">
                    ลบ 
                  </button>
                </td>
              </tr>
              `);
            });
          }
        });
      });

      async function uploadImage() {

        var form_data = new FormData();

        // Read selected files
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) {
          form_data.append("files[]", document.getElementById('files').files[index]);
        }

        // AJAX request
        $.ajax({
          url: 'upload_multiple_image.php',
          type: 'post',
          data: form_data,
          dataType: 'json',
          contentType: false,
          processData: false,
          success: function(response) {
            
            //image_list.empty();
            for (var index = 0; index < response.length; index++) {
              var src = response[index];
              listImage.push(src);
              console.log(src);
              // Add img element in <div id='preview'>
              image_list.append(`
              <tr id="${src}" name="${src}">
                <td>
                <img src="./upload/${src}" style="width: 150px;">
                </td>
                <td>
                <button class="btn btn-danger" style="background-color: #dc3545;" onclick="deleteImage('${src}')">ลบ</button>
                </td>
              </tr>
              `);
            }

          }
        });
      };

      function deleteImage(data) {
        listImage = listImage.filter((value) => value != data);
        image_list.empty();
        listImage.forEach((response) => {
          console.log(response);
          image_list.append(`
          <tr id="${response}" name="${response}">
            <td>
              <img src="upload/${response}" style="width: 150px;">
            </td>
            <td>
              <button class="btn btn-danger" style="background-color: #dc3545;" onclick="deleteImage('${response}')">ลบ</button>
            </td>
          </tr>
          `);
        });
      }

      function createProduct() {
        let product_name = $('#product_name').val();
        let brand_id = $('#brand_id').val();
        let category_id = $('#category_id').val();
        let product_price = $('#product_price').val();
        let product_qty = $('#product_qty').val();
        let product_description = $('#product_description').val();
        $.ajax({
          url: 'query/add_product.php',
          type: 'post',
          data: {
            'product_name': product_name,
            'brand_id': brand_id,
            'category_id': category_id,
            'product_price': product_price,
            'product_qty': product_qty,
            'product_description': product_description
          },
          success: function(response) {
            console.log(response);
            let product_id = response;
            listImage.forEach((image) => {
              $.ajax({
                url: 'query/add_image_product.php',
                type: 'post',
                data: {
                  'img_product': image,
                  'product_id': product_id
                },
                success: function(response) {
                  console.log(response);
                }
              });
            });
            setTimeout(function() {
              window.location.replace('product.php');
              //console.log(product_name, product_price, product_qty, product_description, response);
            }, 300);
          }
        });
      }
    </script>

    <?php include("./footer_back-end.php"); ?>