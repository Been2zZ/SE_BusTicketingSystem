<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>Modify List</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $modNum = $_SESSION['modNum'];  // 수정할 예매권의 번호

  if ($_SESSION['id'] == null) {
    // 비회원
    $phoneNum = $_SESSION['phoneNum'];
    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where num='$modNum' and phoneNum='$phoneNum'";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where num='$modNum' and userId='$id'";
  }

  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $row = mysqli_fetch_array($result);

  $_SESSION['modDay'] = $row[0];  // day
  $_SESSION['modSrc'] = $row[1];  // src
  $_SESSION['modDest'] = $row[2];  // dest
  $_SESSION['modSrcTime'] = $row[3];  // srcTime
  $_SESSION['modSeatNum'] = $row[5];  // seatNum

  $query2 = "SELECT busId from BUS_DB where src='$row[1]' and dest='$row[2]' and price='$row[6]'";
  $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
  $row2 = mysqli_fetch_array($result2);

  $_SESSION['modBusId'] = $row2[0];

  $query3 = "SELECT srcTime,destTime from BUS_DRIVE_DB where busId='$row2[0]' and day='$row[0]' and srcTime != '$row[3]'";
  $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

  echo "<section><h2>변경 가능한 시간의 목록입니다.<h2><br><div class='tbl-header'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <thead>
  <tr>
  <td>출발시간</td>
  <td>도착시간</td>
  </tr></thead>
  </table>
  </div>";

  echo"<div class='tbl-content'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <tbody>";

  while ($row3 = mysqli_fetch_array($result3)) {
    // 변경가능한 시간표
    echo "<tr>
    <td>".$row3[0]."</td>
    <td>".$row3[1]."</td>
    </tr>";
  }

  echo "</tbody></table></div></section>";
  mysqli_close($conn);
?>

<meta charset="UTF-8">

<form method="post" action="modifyTime.php">
  <h2>변경하고자하는 출발 시간을 입력해주세요.<h2><br>
  <div class="container-width">
  <input type="text" name="new_src_hour" placeholder="시 (hour)" required=''></div> :
  <div class="container-width">
  <input type="text" name="new_src_min" placeholder="분 (min)" required=''></div> :
  <div class="container-width">
  <input type="text" name="new_src_sec" placeholder="초 (sec)" required=''></div>
  <br><br>
  <button type="submit" name="inputmod">입력</button>
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
