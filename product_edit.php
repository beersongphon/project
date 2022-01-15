<?php
include('./head_back-end.php');
include('./header_back-end.php');
?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
      <?php
    if ($_GET) {
      $product_id = $_GET['product_id'];

      $sql = "SELECT * FROM tb_product WHERE product_id = '$product_id'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
    ?>
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-35">แก้ไขข้อมูลสินค้า</h3>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Company</strong>
                  <small> Form</small>
                </div>
                <div class="card-body card-block">
                  <div class="row p-5">
                    <table id="image_list1" class="table"></table>
                  </div>
                  <div class="row">
                  <input type="text" id="product_id" name="product_id" class="form-control" hidden value="<?php echo $product_id; ?>" />
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
                    <input type="text" id="product_name" name="product_name" placeholder="Enter your company name" class="form-control" value="<?php echo $row["product_name"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="product_price" class=" form-control-label">price</label>
                    <input type="text" id="product_price" name="product_price" placeholder="DE1234567890" class="form-control" value="<?php echo $row["product_price"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="product_description" class=" form-control-label">description</label>
                    <input type="text" id="product_description" name="product_description" placeholder="Enter street name" class="form-control" value="<?php echo $row["product_description"]; ?>">
                  </div>
                  <button class="btn btn-primary btn-block" type="button" onclick="editProduct()">
                    บันทึก
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
        <?php
      }
    }
    ?>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
  var listImage1 = new Array();
  var listImage2 = new Array();
  var image_list1 = $("#image_list1");
  var image_list2 = $("#image_list2");
  var upload1 = $("#btn_upload1");
  var upload2 = $("#btn_upload2");

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
          listImage1.push(data.img_product);
          image_list1.append(`
                        <tr>
                            <td>
                                <img src="upload/${data.img_product}" style="width: 150px;"> 
                            </td>    
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage1('${data.img_product}')">
                                    ลบ 
                                </button>
                            </td>
                        </tr>
                    `);
        });
      }
    });
  });

  $(document).ready(function() {
    let product_id = $('#product_id').val();
    $.ajax({
      url: 'query/get_image_product.php',
      type: 'post',
      data: {
        'product_id': product_id
      },
      dataType: 'json',
      success: function(result) {
        result.forEach((data) => {
          listImage2.push(data.product_img);
          image_list2.append(`
                        <tr>
                            <td>
                                <img src="upload/${data.product_img}" style="width: 150px;"> 
                            </td>    
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage2('${data.product_img}')">
                                    ลบ 
                                </button>
                            </td>
                        </tr>
                    `);
        });
      }
    });
  });


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
      console.log(response);
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

  function editProduct() {
    let product_id = $('#product_id').val();
    let product_name = $('#product_name').val();
    let product_price = $('#product_price').val();
    let product_description = $('#product_description').val();
    listImage2.forEach((image2) => {
      $.ajax({
        url: 'query/edit_product.php',
        type: 'post',
        data: {
          'product_id': product_id,
          'product_img': image2,
          'product_name': product_name,
          'product_price': product_price,
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
                  listImage1.forEach((image1) => {
                    addImage(image1, product_id);
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
    });
  }

  async function addImage(image1, product_id) {
    await $.ajax({
      url: 'query/add_image_product.php',
      type: 'post',
      data: {
        'img_product': image1,
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
    listImage1.forEach((image1) => {
      $.ajax({
        url: 'query/add_product.php',
        type: 'post',
        data: {
          'product_id': product_id,
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

<?php include('./footer_back-end.php'); ?>