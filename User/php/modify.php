<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $modNum = $_POST['modNum']; // 수정할 예매권의 번호
  $_SESSION['modNum'] = $modNum;

  print "<script>document.location.href='modList.php'</script>";
?>
