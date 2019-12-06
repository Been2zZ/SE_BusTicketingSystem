<meta charset="utf-8">
  <label>카드번호 :
    <input type="number" size="4" pattern="[0-9]">
    <input type="number" size="4" pattern="[0-9]">
    <input type="number" size="4" pattern="[0-9]">
    <input type="number" size="4" pattern="[0-9]"></label><br>
  <label>cvc번호 :  <input type="number" size="4" pattern="[0-9]"></label><br>
  <label>유효기간 :
    <input type="number" size="2" pattern="[0-9]">년
    <input type="number" size="2" pattern="[0-9]">일
  </label><br>

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

  print "보유 마일리지 : ".$row[0];

  $_SESSION['mileage'] = $row[0];
?>

<input>
