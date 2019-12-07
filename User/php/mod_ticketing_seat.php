<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $seatNum = $_POST['seatNum'];
    $_SESSION['seatNum'] = $seatNum;

    $new_srcTime = $_SESSION['new_srcTime'];

    echo $seatNum;

    echo "<table border = '1'>
    <tr>
    <td>날짜</td>
    <td>출발지</td>
    <td>도착지</td>
    <td>출발시간</td>
    <td>도착시간</td>
    <td>버스등급</td>
    <td>좌석번호</td>
    </tr>
    <tr>
    <td>".$_SESSION['day']."</td>
    <td>".$_SESSION['src']."</td>
    <td>".$_SESSION['dest']."</td>
    <td>".$_SESSION['srcTime']."</td>
    <td>".$_SESSION['destTime']."</td>
    <td>".$_SESSION['busLevel']."</td>
    <td>".$_SESSION['seatNum']."</td>
    </tr>
    </table>";

    $destTime = $_SESSION['destTime'];
    $seatNum = $_SESSION['seatNum'];

    $modDay = $_SESSION['modDay'];
    $modSrc = $_SESSION['modSrc'];
    $modDest = $_SESSION['modDest'];
    $modSrcTime = $_SESSION['modSrcTime'];

    if ($_SESSION['id'] == null) {
      // 비회원
      $phoneNum = $_SESSION['phoneNum'];
      $query = "UPDATE TICKET SET srcTime='$new_srcTime', destTime='$destTime', seatNum='$seatNum'
      where day='$modDay' and src='$modSrc' and dest='$modDest' and srcTime='$modSrcTime' and phoneNum='$phoneNum'";
      mysqli_query($conn, $query) or die(mysqli_error($conn));

      print "<script>alert('버스의 운행정보 수정이 완료되었습니다.')</script>";
      print "<script>document.location.href='user_searchTicket.php'</script>";
    } else {
      // 회원
      $id = $_SESSION['id'];
      $query = "UPDATE TICKET SET srcTime='$new_srcTime', destTime='$destTime', seatNum='$seatNum'
      where day='$modDay' and src='$modSrc' and dest='$modDest' and srcTime='$modSrcTime' and userId='$id'";
      mysqli_query($conn, $query) or die(mysqli_error($conn));

      print "<script>alert('버스의 운행정보 수정이 완료되었습니다.')</script>";
      print "<script>document.location.href='searchTicket.php'</script>";
    }

 ?>
