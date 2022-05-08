      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>
              Copyright &copy; 
              <script>
                document.write(new Date().getFullYear());
              </script> 
              All rights reserved | 
              <a href="./index.php" target="_blank">Luxury by Fon.</a>
            </p>
          </div>
          <!-- <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
          </div> -->
        </div>
      </footer>
    </div>
  </div>
  <!-- <script src="./assets/js/jquery-3.5.1.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./assets/back-end/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="./assets/back-end/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="./assets/back-end/mazer/dist/assets/js/bootstrap.min.js"></script>
    
  <script src="./assets/back-end/mazer/dist/assets/js/mazer.js"></script>

  <!-- <script src="./assets/back-end/mazer/dist/assets/vendors/fontawesome/all.min.js"></script> -->
  <script>
    var listImage = new Array();
    var image_list = $("#image_list");
    var upload = $("#btn_upload");

    // รับค่ารูปภาพทั้งหมดของแต่ละสินค้านั้นๆ
    $(document).ready(function() {
      let product_id = $("#product_id").val();
      $.ajax({
        url: "query/get_all_image_product.php",
        type: "post",
        data: {
          "product_id" : product_id
        },
        dataType: "json",
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

    // อัปโหลดรูปภาพ
    async function uploadImage() {

      var fd = new FormData();

      // Read selected files
      var totalfiles = document.getElementById("files").files.length;
      for (var index = 0; index < totalfiles; index++) {
        fd.append("files[]", document.getElementById("files").files[index]);
      }

      // AJAX request
      $.ajax({
        url: "upload_multiple_image.php",
        type: "post",
        data: fd,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) { 
          //image_list.empty();
          for (var index = 0; index < response.length; index++) {
            var img_product = response[index];
            listImage.push(img_product);
            console.log(img_product);
            // Add img element in <div id='preview'>
            image_list.append(`
            <tr id="${img_product}" name="${img_product}">
              <td>
              <img src="./upload/${img_product}" style="width: 150px;">
              </td>
              <td>
              <button class="btn btn-danger" style="background-color: #dc3545;" onclick="deleteImage('${img_product}')">ลบ</button>
              </td>
            </tr>
            `);
          }
        }
      });
    };

    // ลบรูปภาพ
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

    // เพิ่มสินค้า
    function createProduct() {
      let product_name = $("#product_name").val();
      let brand_id = $("#brand_id").val();
      let category_id = $("#category_id").val();
      let product_price = $("#product_price").val();
      let product_quantity = $("#product_quantity").val();
      let product_description = $("#product_description").val();
      $.ajax({
        url: "query/add_product.php",
        type: "post",
        data: {
          "product_name" : product_name,
          "brand_id" : brand_id,
          "category_id" : category_id,
          "product_price" : product_price,
          "product_quantity" : product_quantity,
          "product_description" : product_description
        },
        success: function(response) {
          console.log(response);
          let product_id = response;
          listImage.forEach((image) => {
            $.ajax({
              url: "query/add_image_product.php",
              type: "post",
              data: {
                "img_product" : image,
                "product_id" : product_id
              },
              success: function(response) {
                console.log(response);
              }
            });
          });
          setTimeout(function() {
            window.location.replace("product.php");
            //console.log(product_name, product_price, product_quantity, product_description, response);
          }, 300);
        }
      });
    }

    // แก้ไขสินค้า
    function editProduct() {
      let product_id = $("#product_id").val();
      let product_name = $("#product_name").val();
      let brand_id = $("#brand_id").val();
      let category_id = $("#category_id").val();
      let product_price = $("#product_price").val();
      let product_quantity = $("#product_quantity").val();
      let product_description = $("#product_description").val();
      $.ajax({
        url: "query/edit_product.php",
        type: "post",
        data: {
          "product_id" : product_id,
          "product_name" : product_name,
          "brand_id" : brand_id,
          "category_id" : category_id,
          "product_price" : product_price,
          "product_quantity" : product_quantity,
          "product_description" : product_description
        },
        success: function(response) {
          console.log(response);
          if (response) {
            $.ajax({
              url: "query/delete_image_product.php",
              type: "post",
              data: {
                "product_id" : product_id
              },
              success: function(response) {
                if (response) {
                  listImage.forEach((image) => {
                    addImage(image, product_id);
                  });
                  setTimeout(function() {
                    window.location.replace("product.php");
                    //console.log(product_id, image2, product_name, product_price, product_description, response);
                  }, 300);
                }
              }
            })
          }
        }
      });
    }

    // เพิ่มรูปภาพ
    async function addImage(image, product_id) {
      await $.ajax({
        url: "query/add_image_product.php",
        type: "post",
        data: {
          "img_product" : image,
          "product_id" : product_id
        },
        success: function(response) {}
      });
    }

    // ลบสินค้า
    function deleteProduct(id) {
      Swal.fire({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณจะไม่สามารถเปลี่ยนกลับได้!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
      }).then((result) => {
        if (result.value) {
          //let category_name = $('#category_name').val();
          $.ajax({
            url: "query/product_delete.php",
            type: "post",
            data: {
              delete_id : id
            },
            success: function(response) {
              // console.log(response);
              if (response == "success") {
                Swal.fire({
                  icon: "success",
                  title: "ลบข้อมูลสำเร็จ",
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    //$('#delete'+id).hide('slow');
                    window.location.replace("product.php");
                  }
                })
              } else {
                console.log(response);
                //alert("เกิดขึ้นผิดพลาด: " + response);
                Swal.fire({
                  icon: "error",
                  title: "เกิดขึ้นผิดพลาด: " + response,
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    window.history.back;
                  }
                })
              }
            }
          });
        }
      })
    }

    // เพิ่มยี่ห้อ
    function createBrand() {
      let brand_name = $("#brand_name").val();
      $.ajax({
        url: "query/add_brand.php",
        type: "post",
        data: {
          "brand_name" : brand_name
        },
        success: function(response) {
          if (response == "success") {
            alert("ดำเนินการเสร็จสิ้น");
            console.log(response);
            setTimeout(function() {
              window.location.replace("brand.php");
              //console.log(product_name, product_price, product_quantity, product_description, response);
            }, 300);
          } else if (response == "error") {
            alert("เกิดปัญหาการ insert db ผิดพลาด");
            console.log("data: " + response);
          } else if (response == "already") {
            alert("มีชื่อยี่ห้อนี้อยู่ในระบบแล้ว");
            $("#brand_name").val("");
          } else {
            console.log("data: " + response);
            alert("ERROR: " + response);
          }
        }
      });
    }
  
    // แก้ไขยี่ห้อ
    function editBrand() {
      let brand_id = $("#brand_id").val();
      let brand_name = $("#brand_name").val();
      $.ajax({
        url: "query/edit_brand.php",
        type: "post",
        data: {
          "brand_id" : brand_id,
          "brand_name" : brand_name
        },
        success: function(response) {
          console.log(response);
          setTimeout(function() {
            window.location.replace("brand.php");
            //console.log(product_id, image2, product_name, product_price, product_description, response);
          }, 300);
        }
      });
    }

    // ลบยี่ห้อ
    function deleteBrand(id) {
      Swal.fire({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณจะไม่สามารถเปลี่ยนกลับได้!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
      }).then((result) => {
        if (result.value) {
          //let category_name = $('#category_name').val();
          $.ajax({
            url: "query/brand_delete.php",
            type: "post",
            data: {
              delete_id : id
            },
            success: function(response) {
              // console.log(response);
              if (response == "success") {
                Swal.fire({
                  icon: "success",
                  title: "ลบข้อมูลสำเร็จ",
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    //$('#delete'+id).hide();
                    window.location.replace("brand.php");
                  }
                })
              } else {
                console.log(response);
                //alert("เกิดขึ้นผิดพลาด: " + response);
                Swal.fire({
                  icon: "error",
                  title: "เกิดขึ้นผิดพลาด: " + response,
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    window.history.back;
                  }
                })
              }
            }
          });
        }
      })
    }

    // เพิ่มประเภท
    function createCategory() {
      let category_name = $("#category_name").val();
      $.ajax({
        url: "query/add_category.php",
        type: "post",
        data: {
          "category_name" : category_name
        },
        success: function(response) {
          if (response == "success") {
            alert("ดำเนินการเสร็จสิ้น");
            console.log(response);
            setTimeout(function() {
              window.location.replace("category.php");
              //console.log(product_name, product_price, product_quantity, product_description, response);
            }, 300);
          } else if (response == "error") {
            alert("เกิดปัญหาการ insert db ผิดพลาด");
            console.log("data: " + response);
          } else if (response == "already") {
            alert("มีชื่อประเภทนี้อยู่ในระบบแล้ว");
            $("#category_name").val("");
          } else {
            console.log("data: " + response);
            alert("ERROR: " + response);
          }
        }
      });
    }

    // แก้ไขประเภท
    function editCategory() {
      let category_id = $("#category_id").val();
      let category_name = $("#category_name").val();
      $.ajax({
        url: "query/edit_category.php",
        type: "post",
        data: {
          "category_id" : category_id,
          "category_name" : category_name
        },
        success: function(response) {
          console.log(response);
          setTimeout(function() {
            window.location.replace("category.php");
            //console.log(product_id, image2, product_name, product_price, product_description, response);
          }, 300);
        }
      });
    }

    // ลบประเภท
    function deleteCategory(id) {
      Swal.fire({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณจะไม่สามารถเปลี่ยนกลับได้!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
      }).then((result) => {
        if (result.value) {
          //let category_name = $('#category_name').val();
          $.ajax({
            url: "query/category_delete.php",
            type: "post",
            data: {
              delete_id : id
            },
            success: function(response) {
              // console.log(response);
              if (response == "success") {
                Swal.fire({
                  icon: "success",
                  title: "ลบข้อมูลสำเร็จ",
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    //$('#delete'+id).hide();
                    window.location.replace("category.php");
                  }
                })
              } else {
                console.log(response);
                //alert("เกิดขึ้นผิดพลาด: " + response);
                Swal.fire({
                  icon: "error",
                  title: "เกิดขึ้นผิดพลาด: " + response,
                  showConfirmButton: false,
                  timer: 2000
                }).then((result) => {
                  if (result.isDismissed) {
                    window.history.back;
                  }
                })
              }
            }
          });
        }
      })
    }
  </script>
</body>
</html>