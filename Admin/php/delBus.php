<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    // 버스 아이디
    $busId = $_POST["busId"];

    $query = "select * from BUS_DB where busId='$busId'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // 입력한 값에 대응하는 버스 존재
      $query = "DELETE from BUS_DB where busId='$busId'";
      mysqli_query($conn, $query);

      print "<script>alert('해당 버스가 등록 삭제 완료되었습니다.')</script>";
    } else {
      print "<script>alert('삭제를 원하는 버스가 존재하지 않습니다.')</script>";
    }

    print "<script>document.location.href='../html/BusManagement.html'</script>";

    mysqli_close($conn);
 ?>
