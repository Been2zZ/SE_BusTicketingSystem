<!-- remove Ticket 복붙 code임 수정 -->
<?php
  session_start();
  ini_set('display_errors', '1');
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

  echo "</table>";

  mysqli_close($conn);
?>

<meta charset="UTF-8">

<form method="post" action="remove.php">
  <input type="text" name="delNum" placeholder="삭제할 예매권의 번호를 입력해주세요."><br><br>
  <button type="submit" name="ticketing_when">입력</button>
</form>
