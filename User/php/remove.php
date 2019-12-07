<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $delNum = $_POST['delNum'];

  $query = "DELETE from TICKET where num='$delNum'";
  mysqli_query($conn, $query);

  print "<script>alert('예매권 취소가 완료되었습니다. 1-2영업일 내에 결제 방식으로 환불될 예정입니다.')</script>";
  print "<script>document.location.href='../../main.html'</script>";
?>
