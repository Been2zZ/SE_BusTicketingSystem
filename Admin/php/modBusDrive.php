

<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    // 버스 아이디
    $busId = $_SESSION["selectBusId"];
    // 운행 날짜
    $date = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
    // 출발 시간
    $srcTime = $_POST["src_hour"].':'.$_POST["src_min"].':'.$_POST["src_sec"];
    // 변경 출발 시간
    $new_srcTime = $_POST["new_src_hour"].':'.$_POST["new_src_min"].':'.$_POST["new_src_sec"];
    // 변경 도착 시간
    $new_destTime = $_POST["new_dest_hour"].':'.$_POST["new_dest_min"].':'.$_POST["new_dest_sec"];


    $query = "select * from BUS_DRIVE_DB where busId='$busId' and day='$date' and srcTime='$srcTime'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $query = "UPDATE BUS_DRIVE_DB SET srcTime='$new_srcTime', destTime='$new_destTime' where busId='$busId' and day='$date' and srcTime='$srcTime'";
      mysqli_query($conn, $query);

      print "<script>alert('버스의 운행정보 수정이 완료되었습니다.')</script>";
    } else {
      print "<script>alert('수정을 원하는 버스의 정보가 없습니다.')</script>";
    }

    print "<script>document.location.href='../html/BusDriveManagement.html'</script>";

    mysqli_close($conn);
 ?>
