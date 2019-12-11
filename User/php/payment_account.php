<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
      <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
      <style>
        p.r {
        font-family: 'Do Hyeon', sans-serif;
        font-size: 40px;
        }
        </style>
    <title>Payment : Card</title>
  </head>
<body>
<div class="wrapper">
	<div class="container">
    <form>
<label> &nbsp&nbsp&nbsp&nbsp&nbsp은행 :
  <div class="container-width">
  <input type="text" required='' placeholder="은행사를 입력하세요..."></div><br>
</label><br>
<label> 계좌번호 :
  <div class="container-width">
  <input type="text" pattern="[0-9]" required='' placeholder="계좌번호를 입력하세요..."></div><br>
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

  print "<div class='fontsizeup'>보유 마일리지 : ".$row[0]."점</div>";

  $_SESSION['mileage'] = $row[0];
?>

<form method="post" action="payment.php">
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
