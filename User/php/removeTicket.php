<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Remove Ticket</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");


  if ($_SESSION['id'] == null) {
    // 비회원
    $phoneNum = $_SESSION['phoneNum'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum'";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where userId = '$id'";
  }

  $result = mysqli_query($conn, $query);

  echo "<h2>보유한 예매권 목록입니다.<h2><section>
  <div></div>
  <div>
  <div class='tbl-header'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <thead>
  <tr>
  <th>번호</th>
  <th>날짜</th>
  <th>출발지</th>
  <th>도착지</th>
  <th>출발시간</th>
  <th>도착시간</th>
  <th>좌석번호</th>
  <th>가격</th>
  </tr></thead>
  </table>
  </div>";

  echo "<div class='tbl-content'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <tbody>";


  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[6]."</td>
    <td>".$row[7]."</td>
    </tr>";
  }

  echo "</tbody></table></div>
  </div>
  <div></div>
  </section>";

  mysqli_close($conn);
?>

<form method="post" action="remove.php">
  <h2>삭제할 예매권의 번호를 입력해주세요.</h2>
  <input type="text" name="delNum" placeholder="번호를 입력해주세요..." required=''>
  <button type="submit" style="font-family:'Do Hyeon'; font-size:40px;" name="ticketing_when">입력</button>
  <br><br>
    <a href="javascript:history.go(-1)">&nbsp B A C K &nbsp</a>
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
