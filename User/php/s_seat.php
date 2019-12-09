<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>S level seat</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $day = $_SESSION['day'];
  $src = $_SESSION['src'];
  $dest = $_SESSION['dest'];
  $srcTime = $_SESSION['srcTime'];
  $destTime = $_SESSION['destTime'];

  $query = "select seatNum from TICKET where day='$day' and src='$src' and dest='$dest' and srcTime='$srcTime' and destTime='$destTime'";
  $result = mysqli_query($conn, $query);

  echo "이미 예약이 완료된 좌석의 목록입니다.<br>";

  echo "<section><div class='tbl-header'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <thead>
  <tr>
  <th>좌석 번호</th>
  </tr></thead>
  </table>
  </div>";

  echo"<div class='tbl-content'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <tbody>";


  while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row[0]."</td>";
  }
  echo "</tbody></table></div></section>";
?>
    <form method="post" action="ticketing_seat.php">
      <img src="s.seat.png" width='300px' height='400px'><br>
      <input type="text" name="seatNum" placeholder="좌석 번호를 입력해주세요." required=''><br><br>
      <button type="submit" name="s_seat">선택</button>
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
