<?php
include('./head_back-end.php');
include('./header_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
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
        <p class="text-subtitle text-muted">For user to check they list</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
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
                  <table id="image_list1" class="table"></table>
                </div>
                <div class="row">
                  <div class="col-8">
                    <input id="file1" name="file1" type="file" class="form-control-file" required>
                  </div>
                  <div class="col-4">
                    <button onclick="uploadImage1()" class="btn btn-primary" id="btn_upload1" name="btn_upload1" type="button">
                      อัปโหลดรูปภาพ
                    </button>
                  </div>
                </div>
                <hr>
                <div class="row p-5">
                  <table id="image_list2" class="table"></table>
                </div>
                <div class="row">
                  <div class="col-8">
                  <label for="file2" class=" form-control-label">image</label>
                    <input id="file2" name="file2" type="file" class="form-control-file" required>
                  </div>
                  <div class="col-4">
                    <button onclick="uploadImage2()" class="btn btn-primary" id="btn_upload2" name="btn_upload2" type="button">
                      อัปโหลดรูปภาพ
                    </button>
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_name" class=" form-control-label">name</label>
                  <input type="text" id="product_name" name="product_name" placeholder="Enter your company name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="product_price" class=" form-control-label">price</label>
                  <input type="text" id="product_price" name="product_price" placeholder="DE1234567890" class="form-control">
                </div>
                <div class="form-group">
                  <label for="product_description" class=" form-control-label">description</label>
                  <input type="text" id="product_description" name="product_description" placeholder="Enter street name" class="form-control">
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
  var listImage1 = new Array();
  var listImage2 = new Array();
  var image_list1 = $("#image_list1");
  var image_list2 = $("#image_list2");
  var upload1 = $("#btn_upload1");
  var upload2 = $("#btn_upload2");
  var model_list = $("#model_id");

  $('document').ready(function() {
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

  async function uploadImage1() {
    var fd = new FormData();
    var files = $('#file1')[0].files;
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
          image_list1.empty();
          listImage1.push(response);
          listImage1.forEach((response) => {
            image_list1.append(`
            <tr id="${response}" name="${response}">
              <td>
                <img src="upload/${response}" style="width: 150px;">
              </td>
              <td>
                <button class="btn btn-danger" onclick="deleteImage1('${response}')">ลบ</button>
              </td>
            </tr>`);
          });
        }
      });
    }
  }

  function deleteImage1(data) {
    listImage1 = listImage1.filter((value) => value != data);
    image_list1.empty();
    listImage1.forEach((response) => {
      image_list1.append(`
        <tr id="${response}" name="${response}">
          <td>
            <img src="upload/${response}" style="width: 150px;">
          </td>
          <td>
            <button class="btn btn-danger" onclick="deleteImage1('${response}')">ลบ</button>
          </td>
        </tr>`
      );
    });
  }

  async function uploadImage2() {
    var fd = new FormData();
    var files = $('#file2')[0].files;
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
          image_list2.empty();
          listImage2.push(response);
          listImage2.forEach((response) => {
            image_list2.append(`
            <tr id="${response}" name="${response}">
              <td>
                <img src="upload/${response}" style="width: 150px;">
              </td>
              <td>
                <button class="btn btn-danger" onclick="deleteImage2('${response}')">ลบ</button>
              </td>
            </tr>`);
          });
        }
      });
    }
  }

  function deleteImage2(data) {
    listImage2 = listImage2.filter((value) => value != data);
    image_list2.empty();
    listImage2.forEach((response) => {
      image_list2.append(`
        <tr id="${response}" name="${response}">
          <td>
            <img src="upload/${response}" style="width: 150px;">
          </td>
          <td>
            <button class="btn btn-danger" onclick="deleteImage2('${response}')">ลบ</button>
          </td>
        </tr>`
      );
    });
  }


 

  function createProduct() {
    let product_name = $('#product_name').val();
    let product_price = $('#product_price').val();
    let product_description = $('#product_description').val();
    listImage1.forEach((image1) => {
      $.ajax({
        url: 'query/add_product.php',
        type: 'post',
        data: {
          'product_img': image1,
          'product_name': product_name,
          'product_price': product_price,
          'product_description': product_description
        },
        success: function(response) {
          console.log(response);
          let product_id = response;
          listImage2.forEach((image2) => {
            $.ajax({
              url: 'query/add_image_product.php',
              type: 'post',
              data: {
                'img_product': image2,
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
    });
  }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.del-btn').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: 'คุณจะไม่สามารถเปลี่ยนกลับได้!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    })

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'success',
        title: 'ลบข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 2000
      }).then((result) => {
        if (result.isDismissed) {
          window.location.href = 'product.php';
        }
      })
    }
</script>

<?php include("./footer_back-end.php"); ?>