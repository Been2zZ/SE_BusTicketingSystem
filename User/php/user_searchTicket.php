<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $phoneNum = $_SESSION['phoneNum'];

    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum'";
    $result = mysqli_query($conn, $query);

    $num = 1;

    echo "<table border = '1'>
    <tr>
    <td>번호</td>
    <td>날짜</td>
    <td>출발지</td>
    <td>도착지</td>
    <td>출발시간</td>
    <td>도착시간</td>
    <td>좌석번호</td>
    <td>가격</td>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {

      $in_num = (string)$num;

      $query2 = "insert into TICKET(num) value('$in_num')
      where day='$row[0]' and src='$row[1]' and dest='$row[2]' and srcTime='$row[3]' and seatNum='$row[5]' and price='$row[6]'";
      $result2 = mysqli_query($conn, $query2);

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

    echo "</table>";

    mysqli_close($conn);
 ?>

<meta charset="UTF-8">
<html>
    <button type='button' name='mod_ticket' value="" onclick="location.href='modifyTicket.php'"
   style='width:100pt; height:20pt'>예매 시간 변경</button><br><br>
    <button type='button' name='remove_ticket' onclick="location.href='removeTicket.php'"
    style='width:100pt; height:20pt'>예매 취소</button><br><br>
</html>
