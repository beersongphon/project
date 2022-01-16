<?php
session_start();
include("urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("connection.php");
$date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

// (1) ข้อมูลชั่วโมง member
$sql_member_data = "SELECT member_time_progress FROM member WHERE member_id = " . $_SESSION["member_id"];
$result_member_data = mysqli_query($con, $sql_member_data);
$row_member_data = mysqli_fetch_assoc($result_member_data);
$sum_time = $row_member_data['member_time_progress'];

echo "<div>ชั่วโมงในการจอง: " . $sum_time . " ชั่วโมง</div><br>";   // (1) ข้อมูลชั่วโมง member

// (2) ข้อมูล pay
$sql_user_detail = "SELECT member.member_name, member.member_lastname, member.member_time_progress, 
        pay.pay_time, pay.pay_cost, pay.pay_datetime 
        FROM pay 
        INNER JOIN member on pay.pay_member_id = member.member_id 
        WHERE pay.pay_confirm = 0 AND pay.pay_member_id = ". $_SESSION['member_id'];
$result_user = mysqli_query($con, $sql_user_detail);

// (2) ข้อมูล pay
if (mysqli_num_rows($result_user) == 0) {
    echo "ข้อมูลการเติมเวลา";
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลรอการอนุมัติ";
    echo "</div>";
} else {
    echo "ข้อมูลการเติมเวลา";
    echo "<ul class='list-group'>";
    while ($row = mysqli_fetch_array($result_user)) {
        $date_set = date_create($row['pay_datetime']);
        echo "<li class='list-group-item'>รายละเอียดการเติมเวลา รอการตรวจสอบ: " . $row['member_name'] . " " . $row['member_lastname'] . "<br>เวลา: " . $row['pay_time'] . " ชั่วโมง<br>ราคา: " . $row['pay_cost'] . " บาท<br>เวลาดำเนินการ: " . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น.</li>";
    }
    echo "</ul>";
}


// (3) สนามมาสติก
$nodata = 0;
echo "ข้อมูลการจองสนามพื้นมาสติก";
echo "<ul class='list-group'>";
for ($i = 1; $i <= 6; $i++) {
    $sql_user_racket = "SELECT * FROM stadium_mastic_" . $i . " 
    WHERE stadium_mastic_reserve_datetime > NOW() 
    AND stadium_mastic_member = " . $_SESSION['member_id'];
    $result_racket = mysqli_query($con, $sql_user_racket);
    if (mysqli_num_rows($result_racket) == 0) {
        $nodata++;
    } else {
        while ($row_racket = mysqli_fetch_array($result_racket)) {
            $date_set = date_create($row_racket['stadium_mastic_reserve_datetime']);
            echo "<li class='list-group-item'>รายละเอียดการจองสนาม: " . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น. สนามพื้นมาสติก " . $i . "</li>";
        }
    }
}
if ($nodata >= 6) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการจองสนาม";
    echo "</div>";
}
echo "</ul>";


// (4)  สนามยาง
$nodata = 0;
echo "ข้อมูลการจองสนามพื้นยาง";
echo "<ul class='list-group'>";
for ($i = 1; $i <= 6; $i++) {
    $sql_user_racket = "SELECT * FROM stadium_rubber_" . $i . " 
    WHERE stadium_rubber_reserve_datetime > NOW() 
    AND stadium_rubber_member = " . $_SESSION['member_id'];
    $result_racket = mysqli_query($con, $sql_user_racket);
    if (mysqli_num_rows($result_racket) == 0) {
        $nodata++;
    } else {
        while ($row_racket = mysqli_fetch_array($result_racket)) {
            $date_set = date_create($row_racket['stadium_rubber_reserve_datetime']);
            echo "<li class='list-group-item'>รายละเอียดการจองสนาม: " . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น. สนามพื้นยาง " . $i . "</li>";
        }
    }
}
if ($nodata >= 6) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการจองสนาม";
    echo "</div>";
}
echo "</ul>";


// (5)  ยืมไม้แบตมินตัน
echo "ข้อมูลการยืมไม้แบตมินตัน";
echo "<ul class='list-group'>";

$sql_user_racket = "SELECT * FROM lend_racket 
    WHERE lend_racket_status != 2
    AND lend_racket_member = " . $_SESSION['member_id'];
$result_racket = mysqli_query($con, $sql_user_racket);
if (mysqli_num_rows($result_racket) == 0) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการยืมไม้แบตมินตัน";
    echo "</div>";
} else {
    while ($row_racket = mysqli_fetch_array($result_racket)) {
        if ($row_racket['lend_racket_status'] == 1) {
            echo "<li class='list-group-item'>รายละเอียดรอการอนุมัติ: ไม้แบตมินตันจำนวน " . $row_racket['lend_racket_amount'] . " คู่ " . "</li>";
        }else{
            echo "<li class='list-group-item'>รายละเอียดอนุมัติแล้ว: ไม้แบตมินตันจำนวน " . $row_racket['lend_racket_amount'] . " คู่ " . "</li>";
        }                
    }
}
echo "</ul>";



// (6)  ยืมรองเท้า
echo "ข้อมูลการยืมรองเท้า";
echo "<ul class='list-group'>";

$sql_user_shoes = "SELECT * FROM lend_shoes 
    WHERE lend_shoes_status != 2
    AND lend_shoes_member = " . $_SESSION['member_id'];
$result_shoes = mysqli_query($con, $sql_user_shoes);
if (mysqli_num_rows($result_shoes) == 0) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการยืมรองเท้า";
    echo "</div>";
} else {
    while ($row_shoes = mysqli_fetch_array($result_shoes)) {
        if ($row_shoes['lend_shoes_status'] == 1) {
            echo "<li class='list-group-item'>รายละเอียดรอการอนุมัติ: รองเท้าจำนวน " . $row_shoes['lend_shoes_amount'] . " คู่ " . "</li>";
        }else{
            echo "<li class='list-group-item'>รายละเอียดอนุมัติแล้ว: รองเท้าจำนวน " . $row_shoes['lend_shoes_amount'] . " คู่ " . "</li>";
        }                
    }
}
echo "</ul>";

echo "<br>";
// (7)  ประวัติการเข้าใช้บริการสนามมาสติก
$nodata = 0;
echo "ประวัติการเข้าใช้บริการสนามมาสติก";
echo "<ul class='list-group'>";
for ($i = 1; $i <= 6; $i++) {
    $sql_user_racket = "SELECT * FROM stadium_mastic_" . $i . " 
    WHERE stadium_mastic_reserve_datetime < NOW() 
    AND stadium_mastic_member = " . $_SESSION['member_id']. " LIMIT 10";
    $result_racket = mysqli_query($con, $sql_user_racket);
    if (mysqli_num_rows($result_racket) == 0) {
        $nodata++;
    } else {
        while ($row_racket = mysqli_fetch_array($result_racket)) {
            $date_set = date_create($row_racket['stadium_mastic_reserve_datetime']);
            echo "<li class='list-group-item'>ประวัติการจองสนาม: " . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น. สนามพื้นมาสติก " . $i . "</li>";
        }
    }
}
if ($nodata >= 6) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการจองสนาม";
    echo "</div>";
}
echo "</ul>";

echo "<br>";
// (8)  ประวัติการเข้าใช้บริการสนามพื้นยาง
$nodata = 0;
echo "ประวัติการเข้าใช้บริการสนามพื้นยาง";
echo "<ul class='list-group'>";
for ($i = 1; $i <= 6; $i++) {
    $sql_user_racket = "SELECT * FROM stadium_rubber_" . $i . " 
    WHERE stadium_rubber_reserve_datetime < NOW() 
    AND stadium_rubber_member = " . $_SESSION['member_id'] . " LIMIT 10";
    $result_racket = mysqli_query($con, $sql_user_racket);
    if (mysqli_num_rows($result_racket) == 0) {
        $nodata++;
    } else {
        while ($row_racket = mysqli_fetch_array($result_racket)) {
            $date_set = date_create($row_racket['stadium_rubber_reserve_datetime']);
            echo "<li class='list-group-item'>ประวัติการจองสนาม: " . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น. สนามพื้นยาง " . $i . "</li>";
        }
    }
}
if ($nodata >= 6) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการจองสนาม";
    echo "</div>";
}
echo "</ul>";

echo "<br>";
// (10)  ประวัติยืมไม้แบตมินตัน
echo "ข้อมูลประวัติยืมไม้แบตมินตัน";
echo "<ul class='list-group'>";

$sql_user_racket = "SELECT * FROM lend_racket 
    WHERE lend_racket_status = 2
    AND lend_racket_member = " . $_SESSION['member_id'] . " LIMIT 10";
$result_racket = mysqli_query($con, $sql_user_racket);
if (mysqli_num_rows($result_racket) == 0) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการยืมไม้แบตมินตัน";
    echo "</div>";
} else {
    while ($row_racket = mysqli_fetch_array($result_racket)) {
        $date_set = date_create($row_racket['lend_racket_datetime']);
        echo "<li class='list-group-item'>ประวัติยืมไม้แบตมินตัน: ไม้แบตมินตันจำนวน " . $row_racket['lend_racket_amount'] . " คู่ <br>" . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น.</li>";             
    }
}
echo "</ul>";


echo "<br>";
// (11)  ประวัติยืมรองเท้า
echo "ข้อมูลประวัติยืมรองเท้า";
echo "<ul class='list-group'>";

$sql_user_shoes = "SELECT * FROM lend_shoes 
    WHERE lend_shoes_status = 2
    AND lend_shoes_member = " . $_SESSION['member_id']. " LIMIT 10";
$result_shoes = mysqli_query($con, $sql_user_shoes);
if (mysqli_num_rows($result_shoes) == 0) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลการยืมรองเท้า";
    echo "</div>";
} else {
    while ($row_shoes = mysqli_fetch_array($result_shoes)) {
        $date_set = date_create($row_shoes['lend_shoes_datetime']);
        echo "<li class='list-group-item'>ข้อมูลประวัติยืมรองเท้า: รองเท้าจำนวน " . $row_shoes['lend_shoes_amount'] . " คู่ <br>" . date_format($date_set, "d") . " " . $date_th[date_format($date_set, "n")] . " " . date_format($date_set, "Y") . " " . date_format($date_set, "H:i") . " น.</li>";               
    }
}
echo "</ul>";