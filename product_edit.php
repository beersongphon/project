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
        <h3>แก้ไขข้อมูลสินค้า</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="./product.php">ข้อมูลสินค้า</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลสินค้า</li>
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
              <?php
              if ($_GET) {
                $product_id = $_GET['product_id'];

                $sql = "SELECT * FROM tb_product WHERE product_id = '$product_id'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
              ?>
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row p-5">
                      <table id="image_list" class="table"></table>
                    </div>
                    <div class="row">
                      <input type="text" id="product_id" name="product_id" class="form-control" hidden value="<?php echo $product_id; ?>" />
                      <div class="input-group mb-3">
                        <input id="file" name="file" type="file" class="form-control" required>
                        <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                          อัปโหลดรูปภาพ
                        </button>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="product_name" class=" form-control-label">name</label>
                      <input type="text" id="product_name" name="product_name" placeholder="Enter your company name" class="form-control" value="<?php echo $row["product_name"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="brand_id" class=" form-control-label">brand_id</label>
                      <select class="form-select" id="brand_id" name="brand_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_brand";
                        $result = $conn->query($sql);
                        while ($brand = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $brand["brand_id"]; ?>" <?php if ($row["brand_id"] == $brand["brand_id"]) echo 'selected'; ?>>
                            <?php echo $brand["brand_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="category_id" class=" form-control-label">category_id</label>
                      <select class="form-select" id="category_id" name="category_id" required>
                        <?php
                        $sql = "SELECT * FROM tb_category";
                        $result = $conn->query($sql);
                        while ($category = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $category["category_id"]; ?>" <?php if ($row["category_id"] == $category["category_id"]) echo 'selected'; ?>>
                            <?php echo $category["category_name"]; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_price" class=" form-control-label">price</label>
                      <input type="text" id="product_price" name="product_price" placeholder="DE1234567890" class="form-control" value="<?php echo $row["product_price"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="product_qty" class=" form-control-label">qty</label>
                      <input type="text" id="product_qty" name="product_qty" placeholder="product_qty" class="form-control" value="<?php echo $row["product_qty"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="product_description" class=" form-control-label">description</label>
                      <input type="text" id="product_description" name="product_description" placeholder="Enter street name" class="form-control" value="<?php echo $row["product_description"]; ?>">
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="editProduct()">
                      บันทึก
                    </button>
                  </form>
              <?php
                }
              }
              ?>
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

  $('document').ready(function() {
    //
    var brand_id = $('#brand_id').val();
    $.ajax({
      url: 'query/get_model.php',
      data: {
        'brand_id': brand_id
      },
      method: 'post',
      dataType: 'json',
      success: function(result) {
        result.forEach((data) => {
          if (parseInt(data.model_id) == parseInt($('#model_history').val())) {
            $('#model_id').append(`<option value="${data.model_id}" selected>${data.model_name}</option>`);
          } else {
            $('#model_id').append(`<option value="${data.model_id}">${data.model_name}</option>`);
          }
        });
      }
    });

    $('#brand_id').on('change', function() {
      brandChange();
    });
  });

  function brandChange() {
    $('#model_id').empty();
    var brand_id = $('#brand_id').val();
    $.ajax({
      url: 'query/get_model.php',
      data: {
        'brand_id': brand_id
      },
      method: 'post',
      dataType: 'json',
      success: function(result) {
        result.forEach((data) => {
          $('#model_id').append(`<option value="${data.model_id}">${data.model_name}</option>`);
        });
      }
    });
  }

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
                                <button class="btn btn-danger" onclick="deleteImage('${data.img_product}')">
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
    var fd = new FormData();
    var files = $('#file')[0].files;
    if (files.length > 0) {
      fd.append('file', files[0]);
      $.ajax({
        url: 'upload_image.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);
          image_list.empty();
          listImage.push(response);
          listImage.forEach((response) => {
            image_list.append(`
            <tr id="${response}" name="${response}">
              <td>
                <img src="upload/${response}" style="width: 150px;">
              </td>
              <td>
                <button class="btn btn-danger" onclick="deleteImage('${response}')">ลบ</button>
              </td>
            </tr>`);
          });
        }
      });
    }
  }

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
            <button class="btn btn-danger" onclick="deleteImage('${response}')">ลบ</button>
          </td>
        </tr>`);
    });
  }

  function editProduct() {
    let product_id = $('#product_id').val();
    let product_name = $('#product_name').val();
    let brand_id = $('#brand_id').val();
    let category_id = $('#category_id').val();
    let product_price = $('#product_price').val();
    let product_qty = $('#product_qty').val();
    let product_description = $('#product_description').val();
    $.ajax({
      url: 'query/edit_product.php',
      type: 'post',
      data: {
        'product_id': product_id,
        'product_name': product_name,
        'brand_id': brand_id,
        'category_id': category_id,
        'product_price': product_price,
        'product_qty': product_qty,
        'product_description': product_description
      },
      success: function(response) {
        console.log(response);
        if (response) {
          $.ajax({
            url: 'query/delete_image_product.php',
            type: 'post',
            data: {
              'product_id': product_id
            },
            success: function(response) {
              if (response) {
                listImage.forEach((image) => {
                  addImage(image, product_id);
                });
                setTimeout(function() {
                  window.location.replace('product.php');
                  //console.log(product_id, image2, product_name, product_price, product_description, response);
                }, 300);
              }
            }
          })
        }
      }
    });
  }

  async function addImage(image, product_id) {
    await $.ajax({
      url: 'query/add_image_product.php',
      type: 'post',
      data: {
        'img_product': image,
        'product_id': product_id
      },
      success: function(response) {}
    });
  }

  function createProduct() {
    let product_id = $('#product_id').val();
    let product_name = $('#product_name').val();
    let product_price = $('#product_price').val();
    let product_description = $('#product_description').val();
    $.ajax({
      url: 'query/add_product.php',
      type: 'post',
      data: {
        'product_id': product_id,
        'product_name': product_name,
        'product_price': product_price,
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
          // console.log(product_name, product_price, product_description, response);
        }, 300);
      }
    });
  }
</script>

<?php include("./footer_back-end.php"); ?>