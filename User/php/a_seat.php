<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];
  $busId = $_SESSION['busId'];
  $day = $_SESSION['day'];
  $srcTime = $_SESSION['srcTime'];
  $destTime = $_SESSION['destTime'];

  $query = "select seatNum from TICKET where busId='$busId' and day='$day' and srcTime='$srcTime' and destTime='$destTime'";
  $result = mysqli_query($conn, $query);

  echo "이미 예약이 완료된 좌석의 목록입니다.";
  while ($row = mysqli_fetch_array($result);) {
    echo $row[0]."<br>";
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bus Ticketing System</title>
  </head>
  <body>
    <form method="post" action="ticketing_seat.php">
      <img src="a.seat.png" width='300px' height='400px'><br>
      <input type="text" name="seatNum" placeholder="좌석 번호를 입력해주세요."><br><br>
      <button type="submit" name="a_seat">선택</button>
    </form>
  </body>
</html>
