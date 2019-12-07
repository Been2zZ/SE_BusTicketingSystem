<!-- 정기권 선택 code 추가 -->

<!-- 정기권 구매 -->
<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];
  $season = $_POST['season'];

  // 정기권 결제 code 추가

  $query = "UPDATE USER_DB SET season='$season' where id='$id'";
  mysqli_query($conn, $query);
?>
