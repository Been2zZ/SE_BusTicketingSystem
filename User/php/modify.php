<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $modNum = $_POST['modNum']; // 수정할 예매권의 번호
  $_SESSION['modNum'] = $modNum;

  if ($_SESSION['id'] == null) {
    // 비회원
    $phoneNum = $_SESSION['phoneNum'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum' order by srcTime";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where userId = '$id' order by srcTime";
  }

  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
    if ($modNum == $row[0]) {
      print "<script>document.location.href='modList.php'</script>";
    }
  }
  print "<script>alert('해당되는 번호가 없습니다.')</script>";
  print "<script>document.location.href='javascript:history.go(-1)'</script>";
?>
