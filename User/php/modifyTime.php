<!-- 예매권 시간 변경 -->
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    // 변경 출발 시간
    $new_srcTime = $_POST["new_src_hour"].':'.$_POST["new_src_min"].':'.$_POST["new_src_sec"];

    $_SESSION['new_srcTime'] = $new_srcTime;

    $modDay = $_SESSION['modDay'];
    $modSrc = $_SESSION['modSrc'];
    $modDest = $_SESSION['modDest'];
    $modSrcTime = $_SESSION['modSrcTime'];
    $modSeatNum = $_SESSION['modSeatNum'];
    $modBusId = $_SESSION['modBusId'];

    $query1 = "select destTime from BUS_DRIVE_DB where busId='$modBusId' and day='$modDay' and srcTime='$new_srcTime'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_array($result1);

    $modDestTime = $row1[0];

    $query2 = "select busLevel, price from BUS_DB where busId='$modBusId'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    $row2 = mysqli_fetch_array($result);

    $_SESSION['day'] = $modDay;
    $_SESSION['src'] = $modSrc;
    $_SESSION['dest'] = $modDest;
    $_SESSION['srcTime'] = $new_srcTime;
    $_SESSION['destTime'] = $modDestTime;
    $_SESSION['busLevel'] = $row2[0];
    $_SESSION['price'] = $row2[1];

    if ($row2[0] == 'S') {
      // == 'S'
      print "<script>document.location.href='mod_s_seat.php'</script>";
    } else {
      // == 'A'
      print "<script>document.location.href='mod_a_seat.php'</script>";
    }

    mysqli_close($conn);
 ?>
