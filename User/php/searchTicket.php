<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where userId = '$id'";
    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));

    $num = 1;

    while ($row = mysqli_fetch_array($result)) {
      // code...

      $in_num = (string)$num;

      $query2 = "UPDATE TICKET SET num='$in_num'
      where day='$row[0]' and src='$row[1]' and dest='$row[2]' and srcTime='$row[3]' and seatNum='$row[5]' and price='$row[6]'";
      mysqli_query($conn, $query2) or die(mysqli_error($conn));

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
      </tr>
      <tr>
      <td>".$num."</td>
      <td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
      <td>".$row[4]."</td>
      <td>".$row[5]."</td>
      <td>".$row[6]."</td>
      </tr></table>";

      $num = $num + 1;
    }

    mysqli_close($conn);
 ?>

<meta charset="UTF-8">
<html>
<form>
    <button type='button' name='mod_ticket' onclick="location.href='modifyTicket.php'"
   style='width:100pt; height:20pt'>예매 시간 변경</button><br><br>
    <button type='button' name='remove_ticket' onclick="location.href='removeTicket.php'"
    style='width:100pt; height:20pt'>예매 취소</button><br><br>
  </form>
</html>
