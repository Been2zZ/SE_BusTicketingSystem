<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="./bttn.css?after">
    <title>Payment : Card</title>
  </head>
<body>
<div class="wrapper">
	<div class="container">
    <form>
  <label>카드번호 :
    <input type="number" size="4" pattern="[0-9]" required=''>
    <input type="number" size="4" pattern="[0-9]" required=''>
    <input type="number" size="4" pattern="[0-9]" required=''>
    <input type="number" size="4" pattern="[0-9]" required=''></label><br>
  <label>cvc번호 :  <input type="number" size="4" pattern="[0-9]" required=''></label><br>
  <label>유효기간 :
    <input type="number" size="2" pattern="[0-9]" required=''>년
    <input type="number" size="2" pattern="[0-9]" required=''>일
  </label><br>
</form>

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
  <input type="number" name="mileage" placeholder="사용할 마일리지를 입력하세요." required=''>점<br><br>
  <button type="submit" name="pay">결제</button>
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
