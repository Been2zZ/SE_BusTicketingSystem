<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $delNum = $_POST['delNum'];

  if ($_SESSION['id'] == null) {
    // 비회원
    $phoneNum = $_SESSION['phoneNum'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum'";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where userId = '$id'";
  }

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($result)) {
      if ($delNum == $row[0]) {
        // code...
        $query2 = "DELETE from TICKET where num='$delNum'";
        mysqli_query($conn, $query2);

        print "<script>alert('예매권 취소가 완료되었습니다. 1-2영업일 내에 결제 방식으로 환불될 예정입니다.')</script>";

        if ($_SESSION['id'] == null) {
          // code...
          print "<script>document.location.href='../../main.html'</script>";
        } else {
          // code...
          print "<script>document.location.href='../html/main_mem.html'</script>";
        }
      }
  }

  print "<script>alert('존재하지 않는 번호입니다.')</script>";
  print "<script>document.location.href='javascript:history.go(-1)'</script>";

?>
