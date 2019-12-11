<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Search Ticket</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where userId = '$id' order by srcTime";
    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));

    $num = 1;

    echo "<section>
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

    echo"<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody>";

    while ($row = mysqli_fetch_array($result)) {
      // code...

      $in_num = (string)$num;

      $query2 = "UPDATE TICKET SET num='$in_num'
      where day='$row[0]' and src='$row[1]' and dest='$row[2]' and srcTime='$row[3]' and seatNum='$row[5]' and price='$row[6]'";
      mysqli_query($conn, $query2) or die(mysqli_error($conn));

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

    echo "</tbody></table> </div>
     </div>
     <div></div>
     </section>";

    mysqli_close($conn);
 ?>
<form>
    <button type='button' style="font-family: 'Do Hyeon', sans-serif; font-size:40px;" name='mod_ticket' onclick="location.href='modifyTicket.php'">예매 시간 변경</button><br><br>
    <button type='button' style="font-family: 'Do Hyeon', sans-serif; font-size:40px;" name='remove_ticket' onclick="location.href='removeTicket.php'">예매 취소</button><br><br>
    <br><br><br>
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
