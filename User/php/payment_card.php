<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
      <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Payment : Card</title>
  </head>
<body>
<div class="wrapper">
	<div class="container">
    <form>
    <label>카드번호 :
      <div class="container-width">
      <input class="input1" type="text" size="4" pattern="[0-9]" required=''></div>
      <div class="container-width">
      <input class="input1"  type="text" size="4" pattern="[0-9]" required=''></div>
      <div class="container-width">
      <input class="input1"  type="text" size="4" pattern="[0-9]" required=''></div>
      <div class="container-width">
      <input class="input1"  type="text" size="4" pattern="[0-9]" required=''></div></label><br>
    <label>cvc번호 :
      <div class="container-width">
      <input class="input1"  type="text" size="4" pattern="[0-9]" required=''></div></label><br>
    <label>유효기간 :
      <div class="container-width">
      <input class="input1"  type="text" size="2" pattern="[0-9]" required=''></div> 년
      <div class="container-width">
      <input class="input1"  type="text" size="2" pattern="[0-9]" required=''></div> 월
    </label><br>
    </form>
<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];

  $query = "select mileage from USER_DB where id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  print "<div class='fontsizeup'>보유 마일리지 : ".$row[0]."점</div>";

  $_SESSION['mileage'] = $row[0];
?>

<form method="post" action="payment_check.php">
  <div class="fontsizeup">
  !마일리지 사용시 적립이 불가합니다.!<br></div>
  <div class="container-width">
  <input type="number" name="mileage" placeholder="사용할 마일리지를 입력하세요." required=''></div> <span class="fontsizeup">점</span> <br>
  <button type="submit" style="font-family:'Do Hyeon'; font-size:40px;" name="pay">결제</button>
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
