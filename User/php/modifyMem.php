<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_POST["id"];
    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $phoneNum = $_POST["phoneNum"];

    $query = "select * from USER_DB where id = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // id가 존재하는 경우
        print "<script>alert('존재하는 아이디가 있습니다.')</script>";
        print "<script>document.location.href='../html/join.html'</script>";
    } else {
      $query = "INSERT INTO USER_DB VALUES('$id', '$passwd', '$name', '$phoneNum')";
      $result = mysqli_query($conn, $query);
      print "<script>alert('회원가입이 완료되었습니다. 로그인을 해주세요.')</script>";
      print "<script>document.location.href='../html/login.html'</script>";
    }

    mysqli_close($conn);
 ?>
