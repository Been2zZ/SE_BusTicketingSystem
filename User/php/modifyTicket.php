<!-- modify Ticket 복붙 code임 수정 -->
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
