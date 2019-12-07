<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>A level seat</title>
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

    $query = "select busId,src,dest,busLevel,price from BUS_DB where src='$src' and dest='$dest'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
      // code...
      $query2 = "select day,srcTime,destTime from BUS_DRIVE_DB where busId='$row[0]' and day='$day'";
      $result2 = mysqli_query($conn, $query2);

      echo "<h1>".$_POST['year']."년 ";
      echo $_POST['month']."월 ";
      echo $_POST['day']."일 ";
      echo "$row[1] -> $row[2]"."<h1>";

      echo "<section><div class='tbl-header'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
      <tr>
      <th>출발시간</th>
      <th>도착시간</th>
      <th>버스등급</th>
      <th>가격</th>
      </tr></thead>
      </table>
      </div>";

      echo "<div class='tbl-content'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <tbody>";

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<tr><td>$row2[1]</td>";
        echo "<td>$row2[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td></tr>";
      }
      echo "</tbody></table></div></section>";
    }
 ?>
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
