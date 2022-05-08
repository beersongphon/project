<?php
# Is this the production server or not?
define("PRODUCTION", $_SERVER["SERVER_NAME"] == "web.rmutp.ac.th");
# เริ่มต้นส่วนกำหนดการเชิ่อมต่อฐานข้อมูล
# ตั้งค่าการเชื่อมต่อฐานข้อมูล
if (PRODUCTION) {
  # Production
  $servername = "localhost"; # ชื่อ Server หรือ Domain name ปกติใช้ localhost
  $username = "luxurybyfon"; # ชื่อผู้ใช้
  $password = "mj95c2gx"; # รหัสผ่าน
  $dbname = "luxurybyfon"; # ชื่อฐานข้อมูล
} else {
  # Development
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbproject";
}
# สิ้นสุุดส่วนกำหนดการเชิ่อมต่อฐานข้อมูล

# Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
# Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
# กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
mysqli_set_charset($conn, "UTF8");
?>