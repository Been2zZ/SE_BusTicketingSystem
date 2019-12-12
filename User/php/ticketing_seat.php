<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $seatNum = $_POST['seatNum'];
    $_SESSION['seatNum'] = $seatNum;

    if ($_SESSION['level'] == 'S' && ($seatNum > 18 || $seatNum == 0)) {
      // S 등급 1-18
      print "<script>alert('해당되는 좌석 번호가 없습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";

    } else if ($_SESSION['level'] == 'A' && ($seatNum > 28 || $seatNum == 0)) {
      // A 등급 1-28
      print "<script>alert('해당되는 좌석 번호가 없습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    } else {
      // code...
    $day = $_SESSION['day'];
    $src = $_SESSION['src'];
    $dest = $_SESSION['dest'];
    $srcTime = $_SESSION['srcTime'];
    $destTime = $_SESSION['destTime'];

      $query = "select seatNum from TICKET where day='$day' and src='$src' and dest='$dest' and srcTime='$srcTime' and destTime='$destTime'";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) {
        if ($seatNum == $row[0]) {
          // code...
          print "<script>alert('이미 예약된 좌석입니다.')</script>";
          print "<script>document.location.href='javascript:history.go(-1)'</script>";
        }
      }

      echo "<table border = '1'>
      <tr>
      <td>날짜</td>
      <td>출발지</td>
      <td>도착지</td>
      <td>출발시간</td>
      <td>도착시간</td>
      <td>버스등급</td>
      <td>좌석번호</td>
      <td>가격</td>
      </tr>
      <tr>
      <td>".$_SESSION['day']."</td>
      <td>".$_SESSION['src']."</td>
      <td>".$_SESSION['dest']."</td>
      <td>".$_SESSION['srcTime']."</td>
      <td>".$_SESSION['destTime']."</td>
      <td>".$_SESSION['busLevel']."</td>
      <td>".$_SESSION['seatNum']."</td>
      <td>".$_SESSION['price']."</td>
      </tr>
      </table>";

      $_SESSION['level'] = null;

      if ($_SESSION['id'] == null) {
        // 비회원
        print "<script>document.location.href='../html/user_phoneNumPayment.html'</script>";
      } else {
        // 회원
        print "<script>document.location.href='../html/payment.html'</script>";
      }
    }

    // print $_SESSION['seatNum'];
 ?>
