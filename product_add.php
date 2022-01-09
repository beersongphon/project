<?php
include('./head_back-end.php');
include('./header_back-end.php');
?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-35">เพิ่มข้อมูลสินค้า</h3>
          <div class="row p-5">
            <table id="image_list" class="table"></table>
          </div>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Company</strong>
                  <small> Form</small>
                </div>
                <div class="card-body card-block">
                  <div class="row">
                    <div class="col-8">
                      <input id="file" name="file" type="file" class="form-control-file" required>
                    </div>
                    <div class="col-4">
                      <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                        อัปโหลดรูปภาพ
                      </button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class=" form-control-label">name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your company name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="vat" class=" form-control-label">price</label>
                    <input type="text" id="price" name="price" placeholder="DE1234567890" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="street" class=" form-control-label">description</label>
                    <input type="text" id="description" name="description" placeholder="Enter street name" class="form-control">
                  </div>
                  <button class="btn btn-primary btn-block" type="button" onclick="createProduct()">
                    ยืนยัน
                  </button>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-md-12">
              <div class="copyright">
                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
  var listImage = new Array();
  var image_list = $("#image_list");
  var upload = $("#btn_upload");
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
      image_list.append(`<tr id="${response}" name="${response}"><td><img src="upload/${response}" style="width: 150px;"></td><td><button class="btn btn-danger" onclick="deleteImage('${response}')">ลบ</button></td></tr>`);
    });
  }

  function createProduct() {
    let name = $('#name').val();
    let price = $('#price').val();
    let description = $('#description').val();
    listImage.forEach((image) => {
      $.ajax({
        url: 'query/add_product.php',
        type: 'post',
        data: {
          'img': image,
          'name': name,
          'price': price,
          'description': description
        },
        success: function(response) {
          console.log(response);
          setTimeout(function() {
            window.location.replace('product.php');
            // console.log(name, price, description, response);
          }, 300);
        }
      });
    });
  }
</script>

<?php include('./footer_back-end.php'); ?>