<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>Ticketing</title>
  </head>
  <body>
    <div class="wrapper">
    <div class="container">

<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $day = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

    $query = "select busId,busLevel from BUS_DB where src='$src' and dest='$dest'";
    $result = mysqli_query($conn, $query);
    $num = 1;

    while ($row = mysqli_fetch_array($result)) {
      // code...
      $query2 = "select srcTime,destTime from BUS_DRIVE_DB where busId='$row[0]' and day='$day'";
      $result2 = mysqli_query($conn, $query2);


      echo "<h1>".$_POST['year']."년 ";
      echo $_POST['month']."월 ";
      echo $_POST['day']."일 ";
      echo "$src -> $dest";
      echo "   (버스 등급 : ".$row[1].")<h1>";

      echo "<section><div class='tbl-header'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
      <tr>
      <th>번호</th>
      <th>버스등급</th>
      <th>출발시간</th>
      <th>도착시간</th>
      </tr></thead>
      </table>
      </div>";

      echo"<div class='tbl-content'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <tbody>";

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<tr><td>$num</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row2[0]</td>";
        echo "<td>$row2[1]</td></tr>";
        $query3 = "UPDATE BUS_DRIVE_DB SET tmpNum='$num'
        where busId='$row[0]' and day='$day' and srcTime='$row2[0]' and destTime='$row2[1]'";
        $num = $num + 1;
        $result3 = mysqli_query($conn, $query3);
      }
      echo "</tbody></table></div></section>";
    }
 ?>
<form method="post" action="ticketing_when.php">
  <h2>예매할 시간의 번호를 입력해주세요.</h2><br>
  <input type="text" name="timeNum" placeholder="번호를 입력해주세요..."><br>
  <button type="submit" name="ticketing_when">선택</button>
</form>
</div>
<ul class="bg-bubbles">
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
</div>
</body>
</html>
