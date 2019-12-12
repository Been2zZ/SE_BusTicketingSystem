<!-- 예매권 시간 변경 -->
<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $modNum = $_SESSION['modNum'];

    // 변경 출발 시간
    $new_srcTime = $_POST["new_src_hour"].':'.$_POST["new_src_min"].':'.$_POST["new_src_sec"];

    if ($_SESSION['id'] == null) {
      // 비회원
      $phoneNum = $_SESSION['phoneNum'];
      $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where num='$modNum' and phoneNum='$phoneNum'";
    } else {
      // 회원
      $id = $_SESSION['id'];
      $query = "select day,src,dest,srcTime,destTime,seatNum,price from TICKET where num='$modNum' and userId='$id'";
    }

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    $_SESSION['modDay'] = $row[0];  // day
    $_SESSION['modSrc'] = $row[1];  // src
    $_SESSION['modDest'] = $row[2];  // dest
    $_SESSION['modSrcTime'] = $row[3];  // srcTime
    $_SESSION['modSeatNum'] = $row[5];  // seatNum

    $query2 = "SELECT busId from BUS_DB where src='$row[1]' and dest='$row[2]' and price='$row[6]'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    $row2 = mysqli_fetch_array($result2);

    $_SESSION['modBusId'] = $row2[0];

    $query3 = "SELECT srcTime,destTime from BUS_DRIVE_DB where busId='$row2[0]' and day='$row[0]' and srcTime != '$row[3]' order by srcTime";
    $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

    while ($row3 = mysqli_fetch_array($result3)) {
      // 변경가능한 시간표
      if ($new_srcTime == $row3[0]) {
        // code...
        $_SESSION['new_srcTime'] = $new_srcTime;

        $modDay = $_SESSION['modDay'];
        $modSrc = $_SESSION['modSrc'];
        $modDest = $_SESSION['modDest'];
        $modSrcTime = $_SESSION['modSrcTime'];
        $modSeatNum = $_SESSION['modSeatNum'];
        $modBusId = $_SESSION['modBusId'];

        $query4 = "select destTime from BUS_DRIVE_DB where busId='$modBusId' and day='$modDay' and srcTime='$new_srcTime'";
        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
        $row4 = mysqli_fetch_array($result4);

        $modDestTime = $row4[0];

        $query5 = "select busLevel, price from BUS_DB where busId='$modBusId'";
        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
        $row5 = mysqli_fetch_array($result5);

        $_SESSION['day'] = $modDay;
        $_SESSION['src'] = $modSrc;
        $_SESSION['dest'] = $modDest;
        $_SESSION['srcTime'] = $new_srcTime;
        $_SESSION['destTime'] = $modDestTime;
        $_SESSION['busLevel'] = $row5[0];
        $_SESSION['price'] = $row5[1];

        if ($row5[0] == 'S') {
          // == 'S'
          print "<script>document.location.href='mod_s_seat.php'</script>";
        } else {
          // == 'A'
          print "<script>document.location.href='mod_a_seat.php'</script>";
        }
        mysqli_close($conn);
      }
    }
    print "<script>alert('입력한 출발시간에 운행하는 버스가 존재하지 않습니다.')</script>";
    print "<script>document.location.href='javascript:history.go(-1)'</script>";

 ?>
