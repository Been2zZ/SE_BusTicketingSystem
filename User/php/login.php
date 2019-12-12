<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");
    // print "CONNECT OK!<br>";

    $id = $_POST["id"];
    $passwd = $_POST["passwd"];

    // $query = "INSERT INTO user VALUES('$id', '$passwd')";
    $query = "select * from USER_DB where id = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // id가 존재하는 경우
      $row = mysqli_fetch_array($result);
      if ($row['pw'] == $passwd) {
        // passwd 일치 --> login
        if ($row['id'] == "admin" && $row['pw'] == "admin") {
          // admin
          $_SESSION['id'] = $id;
          print "<script>document.location.href='../../Admin/html/main_admin.html'</script>";
        }
        $_SESSION['id'] = $id;
        print "<script>document.location.href='../html/main_mem.html'</script>";
      } else {
        // passwd 불일치
        print "<script>alert('일치하는 비밀번호가 없습니다.')</script>";
        print "<script>document.location.href='../html/login.html'</script>";
      }
    } else {
      // id가 존재하지 않는 경우
      print "<script>alert('일치하는 아이디가 없습니다.')</script>";
      print "<script>document.location.href='../html/login.html'</script>";
    }

    mysqli_close($conn);
 ?>
