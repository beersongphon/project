<?php 
require('connect.php'); 
//$query = "SELECT gender, count(*) as number FROM tbl_employee GROUP BY gender";
$query="SELECT * FROM tb_user"; 
$result = mysqli_query($conn, $query); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Pie Chart by Google Chart API with PHP Mysql</title> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script type="text/javascript"> 
google.charts.load('current', {'packages':['corechart']}); 
google.charts.setOnLoadCallback(drawChart); 
function drawChart() 
{ 
var data = google.visualization.arrayToDataTable([ 
['Gender', 'Number'], 
<?php 
while($row = mysqli_fetch_array($result)) 
{ 
echo "['".$row["user_firstname"]."', ".$row["rating"]."],"; 
} 
?> 
]); 
var options = { 
title: 'PROGRAMMING LANGUAGE', 
is3D:true, 
// pieHole: 0.4 
}; 
var chart = new google.visualization.PieChart(document.getElementById('piechart')); 
chart.draw(data, options); 
} 
</script> 
</head> 
<body> 
<br /><br /> 
<div style="width:900px;"> 
<h3 align="center">PI CHART</h3> 
<br /> 
<div id="piechart" style="width: 900px; height: 500px;"></div> 
</div> 
</body> 
</html>