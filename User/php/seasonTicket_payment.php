<!-- 정기권 구매 후 DB에 저장 -->
<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");


  print "<script>alert('결제가 완료되었습니다.')</script>";
  print "<script>document.location.href='../html/main_mem.html'</script>";

?>
