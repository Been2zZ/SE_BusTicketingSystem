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


?>

<form method="post" action="payment.php">
  <button type="submit" name="pay">결제</button>
</form>
