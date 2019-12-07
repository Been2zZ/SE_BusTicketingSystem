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
    mysqli_query($conn, $query);

    print "<script>alert('결제가 완료되었습니다.')</script>";
    print "<script>document.location.href='../../main.html'</script>";
  } else {
    // 회원
    $id = $_SESSION['id'];
    $mileage = $_SESSION['mileage'];    // 현재 마일리지
    $usedMileage = $_POST['mileage'];   // 사용할 마일리지

    print $id."<br>";

    $new_mileage = $mileage - $usedMileage;

    print $new_mileage."<br>";

    // 예외처리 : -값인 경우
    if ($usedMileage == 0) {
      // 마일리지 사용 X -> 적립
      $per = $mileage * 0.5;
      $new_mileage = $mileage + $per;

      $query = "UPDATE USER_DB SET mileage='$new_mileage' where id='$id'";
      mysqli_query($conn, $query);
    } else {
      // 마일리지 사용
      $query = "UPDATE USER_DB SET mileage='$new_mileage' where id='$id'";
      mysqli_query($conn, $query);
    }

    $query2 = "INSERT INTO TICKET(num, day, src, dest, srcTime, destTime, seatNum, price, userId)
    values('$null', '$day', '$src', '$dest', '$srcTime', '$destTime', '$seatNum', '$price', '$id')";
    
    mysqli_query($conn, $query2);

    print "<script>alert('결제가 완료되었습니다.')</script>";
    print "<script>document.location.href='../html/main_mem.html'</script>";
  }

?>
