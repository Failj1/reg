<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "reg");
$output = '';
 $query = $_GET["q"];
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
     <tr>  
     <th>ID</th>
     <th>Название</th>	
     <th>Количество</th>
     <th>Тип</td>
     <th>Место Хранения</th>
     </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'. $row['id'] .'</td>
    <td>'. $row['name'] .'</a></td>
    <td>'. $row['amount'] .'</td>
    <td>'. $row['kind'] .'</td>
    <td>'. $row['storage'] .'</td>
     </tr>
   ';
  }
  $output .= '</table>';
  header("Content-Type: application/xls; charset=UTF-8");
  header("Content-Disposition: attachment; filename=download.xls");
  echo "\xEF\xBB\xBF";
  echo $output;
 }
?>