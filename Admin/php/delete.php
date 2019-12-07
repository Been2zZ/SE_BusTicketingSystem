<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $delUserId = $_POST['userId'];

  $query = "delete from USER_DB where id='$delUserId'";
  $result = mysqli_query($conn, $query);

  mysqli_close($conn);

  print "<script>alert('회원 삭제가 완료되었습니다.')</script>";
  print "<script>document.location.href='del_mem.php'</script>";
?>
