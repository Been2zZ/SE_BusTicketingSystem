
<!-- 정기권 구매 -->
<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];
  $season = $_POST['choiceday'];

  // $_POST 로 정기권 일 수 받아온 후, [정기권 일수,구매 날짜:now()] USER_DB에 저장
  // 정기권 일수, 구매날짜 - update

  $date_fomat = "select DATE_FORMAT(now(), '%Y-%m-%d')";
  $result = mysqli_query($conn, $date_fomat);
  $date = mysqli_fetch_array($result);

  $query = "UPDATE USER_DB SET season='$season',season_start='$date[0]' where id='$id'";
  mysqli_query($conn, $query);

  print "<script>alert('결제가 완료되었습니다.')</script>";
  print "<script>document.location.href='../html/mypage.html'</script>";
?>
