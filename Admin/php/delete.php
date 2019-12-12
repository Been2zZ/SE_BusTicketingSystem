<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $delUserId = $_POST['userId'];

  $query2 = "select id from USER_DB where id = '$delUserId'";
  $result2 = mysqli_query($conn, $query2);
  $row2 = mysqli_fetch_array($result2);

  if ($row2[0] == null) {
    // code...
    print "<script>alert('일치하는 회원 아이디가 없습니다.')</script>";
    print "<script>document.location.href='javascript:history.go(-1)'</script>";
  } else {
    // code...
    $query = "delete from USER_DB where id='$delUserId'";
    $result = mysqli_query($conn, $query);

    mysqli_close($conn);

    print "<script>alert('회원 삭제가 완료되었습니다.')</script>";
    print "<script>document.location.href='javascript:history.go(-2)'</script>";
  }
?>
