<label> 은행사 : <input type="text"></label><br>
<label> 계좌번호 :
  <input type="number" pattern="[0-9]">
</label><br>

<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];

  $query = "select mileage from USER_DB where id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  print "보유 마일리지 : ".$row[0]."점<br>";

  $_SESSION['mileage'] = $row[0];
?>

<form method="post" action="payment.php">
  <br>!마일리지 사용시 적립이 불가합니다.!<br>
  <input type="number" name="mileage" placeholder="사용할 마일리지를 입력하세요.">점<br><br>
  <button type="submit" name="pay">결제</button>
</form>
