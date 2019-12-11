<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $null = "0";
  $day = $_SESSION['day'];
  $src = $_SESSION['src'];
  $dest = $_SESSION['dest'];
  $srcTime = $_SESSION['srcTime'];
  $destTime = $_SESSION['destTime'];
  $seatNum = $_SESSION['seatNum'];
  $price = $_SESSION['price'];

  if ($_SESSION['id'] == null) {
    // 비회원
    $phoneNum = $_SESSION['phoneNum'];

    $query = "INSERT INTO TICKET(num, day, src, dest, srcTime, destTime, seatNum, price, phoneNum)
    values('$null', '$day', '$src', '$dest', '$srcTime', '$destTime', '$seatNum', '$price', '$phoneNum')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    print "<script>alert('결제가 완료되었습니다.')</script>";
    print "<script>document.location.href='../../main.html'</script>";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $mileage = $_SESSION['mileage'];    // 현재 마일리지
    $usedMileage = $_POST['mileage'];   // 사용할 마일리지

    if ($mileage >= $usedMileage) {
      // code...

      if ($usedMileage == 0) {
        // 마일리지 사용 X -> 적립
        $per = $price * 0.02;
        $new_mileage = $mileage + $per;
        $query = "UPDATE USER_DB SET mileage='$new_mileage' where id='$id'";
        mysqli_query($conn, $query);
      } else {
        // 마일리지 사용
        $new_mileage = $mileage - $usedMileage;
        $query = "UPDATE USER_DB SET mileage='$new_mileage' where id='$id'";
        mysqli_query($conn, $query);
      }

      $query2 = "INSERT INTO TICKET(num, day, src, dest, srcTime, destTime, seatNum, price, userId)
      values('$null', '$day', '$src', '$dest', '$srcTime', '$destTime', '$seatNum', '$price', '$id')";

      mysqli_query($conn, $query2) or die(mysqli_error($conn));

      print "<script>alert('결제가 완료되었습니다.')</script>";
      print "<script>document.location.href='../html/main_mem.html'</script>";
    } else {
      // code...
      print "<script>alert('보유한 마일리지보다 큰 값을 입력했습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }
  }

?>
