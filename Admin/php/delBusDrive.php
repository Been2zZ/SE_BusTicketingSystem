<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    // 버스 아이디
    $busId = $_POST["busId"];
    // 운행 날짜
    $date = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
    // 출발 시간
    $srcTime = $_POST["src_hour"].':'.$_POST["src_min"].':'.$_POST["src_sec"];

    $query = "select * from BUS_DRIVE_DB where busId='$busId' and day='$date' and srcTime='$srcTime'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // 입력한 값에 대응하는 운행중 버스 존재
      $query = "DELETE from BUS_DRIVE_DB where busId='$busId' and day='$date' and srcTime='$srcTime'";
      mysqli_query($conn, $query);

      print "<script>alert('입력한 버스의 운행정보 삭제가 완료되었습니다.')</script>";
    } else {
      print "<script>alert('삭제를 원하는 버스가 운행중이지 않습니다.')</script>";
    }

    print "<script>document.location.href='../html/BusDriveManagement.html'</script>";

    mysqli_close($conn);
 ?>
