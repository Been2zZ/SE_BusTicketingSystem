<!-- 버스 운행 추가 -->
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
    //도착 시간
    $destTime = $_POST["dest_hour"].':'.$_POST["dest_min"].':'.$_POST["dest_sec"];

    $query = "select * from BUS_DRIVE_DB where busId='$busId' and day='$date' and srcTime='$srcTime'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // 운행 추가하려는 시간대에 이미 운행중인 버스가 존재하는 경우
        print "<script>alert('이미 운행중인 버스가 있습니다.')</script>";
    } else {
      $query = "INSERT INTO BUS_DRIVE_DB(busId, day, srcTime, destTime) VALUES('$busId', '$date', '$srcTime', '$destTime')";
      mysqli_query($conn, $query);

      print "<script>alert('버스 운행 추가가 완료되었습니다.')</script>";
    }

    print "<script>document.location.href='../html/BUSDriveManagement.html'</script>";

    mysqli_close($conn);
 ?>
