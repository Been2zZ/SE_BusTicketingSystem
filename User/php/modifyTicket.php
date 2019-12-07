<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $TicketNum = $_POST['TicketNum'];

  if ($_SESSION['id'] == null) {
    // 비회원
  } else {
    // 회원
  }

?>
