<?php
//เรียกไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
    $strKeyword = $_POST["txtSearch"];
}
if (isset($_GET['category_id']) & isset($_GET['category_name'])) {
    //คิวรี่ข้อมูลสินค้าตามประเภท
    $category_id = $_GET['category_id'];
    //คิวรี่ข้อมูลสินค้าทุกรายการ
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 9;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_product`");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

    $sql = "SELECT DISTINCT tb_product.product_id,
              (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
              tb_product.product_name,
              tb_product.product_price,
              tb_product.product_qty,
              tb_product.product_description
              FROM tb_product
              LEFT JOIN
              tb_img_product
              ON
              tb_product.product_id = tb_img_product.product_id 
              WHERE tb_product.category_id='$category_id'
              AND (tb_product.product_id LIKE '%" . $strKeyword . "%' OR tb_product.product_name LIKE '%" . $strKeyword . "%')
              ORDER BY tb_product.product_id DESC LIMIT $offset, $total_records_per_page";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    //คิวรี่ข้อมูลสินค้าทุกรายการ
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 9;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_product`");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

    $sql = "SELECT DISTINCT tb_product.product_id,
              (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
              tb_product.product_name,
              tb_product.product_price,
              tb_product.product_qty,
              tb_product.product_description
              FROM tb_product
              LEFT JOIN
              tb_img_product
              ON
              tb_product.product_id = tb_img_product.product_id 
              WHERE tb_product.product_id LIKE '%" . $strKeyword . "%' OR tb_product.product_name LIKE '%" . $strKeyword . "%'
              ORDER BY tb_product.product_id DESC LIMIT $offset, $total_records_per_page";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
//คิวรี่ข้อมูลประเภทสินค้า
$stmPrdType = "SELECT* FROM tb_category";
$resultPrdType = $conn->query($stmPrdType);
$rowPrdType = $resultPrdType->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Basic PHP PDO แสดงสินค้าแยกตามหมวดหมู่-ประเภท by devbanban.com 2021</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    <b> รายการสินค้า :: แสดงสินค้าแยกตามหมวดหมู่-ประเภท </b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="test4.php" class="list-group-item list-group-item-action active" aria-current="true">
                        หมวดสินค้า/ประเภทสินค้า
                    </a>
                    <?php foreach ($resultPrdType as $rowPrdType) {  ?>
                        <a href="test4.php?category_id=<?= $rowPrdType['category_id']; ?>&category_name=<?= $rowPrdType['category_name']; ?>" class="list-group-item list-group-item-action"> <?= $rowPrdType['category_name']; ?></a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-9">
                <div class="row">

                    <?php
                    //ถ้ามีการคลิกเลือกประเภทสินค้า 
                    if (isset($_GET['category_name'])) {
                        echo '<h4 style="color:red"> หมวดสินค้า ' . $_GET['category_name'] . '</h4>';
                    }
                    //loop
                    foreach ($result as $row) {  ?>

                        <div class="col-sm-3" style="margin-bottom:50px;">
                            <img src="./upload/<?= $row['img_product']; ?>" width="100%"><br>
                            <?= $row['product_name']; ?> <br>
                            QTY <?= $row['product_qty']; ?> คัน <br>
                            ราคา <?= number_format($row['product_price'], 2); ?>
                            บาท <br>

                            <?php if ($row['product_qty'] > 0) {
                                echo '<a href="#" style="width:100%" class="btn btn-success btn-sm">สั่งซื้อ</a>';
                            } else {
                                echo '<a href="#" style="width:100%" class="btn btn-danger btn-sm disabled" > สินค้าหมด !!</a>';
                            }
                            ?>
                        </div> <!-- //col -->

                    <?php } ?>
                    <br><br>
                </div>
            </div>
            <center>Basic PHP PDO แสดงสินค้าหน้าแรก by devbanban.com 2021
                <br>
                คอร์สออนไลน์...<a href="https://devbanban.com/?cat=250" title="click">click</a>
            </center>
        </div>
    </div>
</body>

</html>