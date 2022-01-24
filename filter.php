<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "dbproject");  
      $i = 1;
      $output = '';  
      $query = "  
          SELECT * FROM tb_order 
          LEFT JOIN
          tb_user
          ON
          tb_order.user_id = tb_user.user_id
          LEFT JOIN
          tb_order_detail
          ON
          tb_order_detail.order_id = tb_order_detail.order_id
           WHERE tb_order.order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">วันที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>อีเมล</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">ราคารวม</th>
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td class="text-center">'.$i.'</td>
                         <td class="text-center">'. $row["order_date"] .'</td>
                         <td class="text-bold-500">'. $row['user_firstname'].' '.$row['user_lastname'].'</td>
                         <td class="text-bold-500">'. $row['order_address'].'</td>
                         <td class="text-bold-500">'. $row['order_tel'].'</td>
                         <td class="text-bold-500">'. $row['order_email'].'</td>
                         <td class="text-center">'. $row['permission_id'].'</td>
                         <td class="text-center">'. $row['order_total'].'</td>
                     </tr>  
                ';  
                $i++;
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
