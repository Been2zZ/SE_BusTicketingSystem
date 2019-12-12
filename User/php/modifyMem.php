<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];
    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $phoneNum = $_POST["phoneNum"];

    $query2 = "select pw from USER_DB where id='$id'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);

    if ($row2[0] == $passwd) {
      // 수정 전 비번 동일한 경우
      print "<script>alert('동일한 비밀번호를 입력하였습니다. 다시 입력해주세요.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    } else {
      // code...
      $query = "UPDATE USER_DB SET pw='$passwd', name='$name', phoneNum='$phoneNum' where id='$id'";
      $result = mysqli_query($conn, $query);

      print "<script>alert('회원정보 수정이 완료되었습니다.')</script>";
      print "<script>document.location.href='userInfo.php'</script>";
    }

    mysqli_close($conn);
 ?>
