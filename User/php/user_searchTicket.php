<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>Search Ticket</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    if ($_SESSION['phoneNum'] == null) {
      // 예매권 없는 경우
      print "<script>alert('예매권이 존재하지 않습니다.')</script>";
      print "<script>document.location.href='../../main.html'</script>";
    }
    $phoneNum = $_SESSION['phoneNum'];

    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum'";
    $result = mysqli_query($conn, $query);

    $num = 1;

    echo "<section><div class='tbl-header'>
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

    echo"<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody>";

    while ($row = mysqli_fetch_array($result)) {

      $in_num = (string)$num;

      $query2 = "UPDATE TICKET SET num='$in_num'
      where day='$row[0]' and src='$row[1]' and dest='$row[2]' and srcTime='$row[3]' and seatNum='$row[5]' and price='$row[6]'";
      $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

      echo "<tr>
      <td>".$num."</td>
      <td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
      <td>".$row[4]."</td>
      <td>".$row[5]."</td>
      <td>".$row[6]."</td>
      </tr>";

      $num = $num + 1;
    }

    echo "</tbody></table></div></section>";

    mysqli_close($conn);
 ?>
<form>
    <button type='button' name='mod_ticket' onclick="location.href='modifyTicket.php'">예매 시간 변경</button><br><br>
    <button type='button' name='remove_ticket' onclick="location.href='removeTicket.php'">예매 취소</button><br><br>
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
