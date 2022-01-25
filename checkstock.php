<?php
//สร้างเงื่อนไขตรวจสอบจำนวนคงเหลือในสต๊อกสินค้า
if($row['product_qty'] == 0){
  //สินค้าหมด
  $confirm = "return false;";
  $tableClass = "label stockout";
  $txtTitle = "Out Of Stock";
}elseif($row['product_qty'] <= 5) {
  //สินค้ากำลังจะหมด
  $confirm = "return true;";
  $tableClass = "label stockblue";
  $txtTitle = "Running Out";
}elseif($row['product_qty'] <= 20) {
  //เหลือ > 20 ชิ้น
  $confirm = "return true;";
  $tableClass = "";
  $txtTitle = "";
}else{
  //เหลือ > 30 ชิ้น
  $confirm = "return true;";
  $tableClass = "label new";
  $txtTitle = "New";
}
?>