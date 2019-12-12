<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];
    $passwd = $_POST["passwd"];

    $query2 = "SELECT pw FROM USER_DB where id='$id'";
    $result2 = mysqli_query($conn, $query2);
    $row2  = mysqli_fetch_array($result2);

    if ($row2[0] == $passwd) {
      // 비번 일치
      $query = "DELETE FROM USER_DB where id='$id'";
      $result = mysqli_query($conn, $query);

      print "<script>alert('회원 탈퇴가 완료되었습니다.')</script>";
      print "<script>document.location.href='../../main.html'</script>";
    } else {
      // 비번 불일치
      print "<script>alert('비밀번호가 일치하지 않습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    mysqli_close($conn);
 ?>
