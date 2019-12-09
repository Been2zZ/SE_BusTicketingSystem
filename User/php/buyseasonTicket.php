
<!-- 정기권 구매 -->
<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];
  $season = $_POST['choiceday'];

  // $_POST 로 정기권 일 수 받아온 후, [정기권 일수,구매 날짜:now()] USER_DB에 저장
  // 정기권 일수, 구매날짜 - update

  $query = "UPDATE USER_DB SET season='$season' where id='$id'";
  mysqli_query($conn, $query);

  print "<script>document.location.href='../html/seasonTicket_payment.html'</script>";
?>
