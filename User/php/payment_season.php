<!-- 정기권 결제 구현 -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>Payment season ticket</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
  session_start();
  // ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];

  // 오늘 날짜
  $today_query = "select DATE_FORMAT(now(), '%Y-%m-%d')";
  $result_today = mysqli_query($conn, $today_query) or die(mysqli_error($conn));
  $date_row = mysqli_fetch_array($result_today);

  $today = $date_row[0];

  // 정기권 구매 날짜
  $start_query = "select season,season_start from USER_DB where id='$id'";
  $result_start = mysqli_query($conn, $start_query)or die(mysqli_error($conn));
  $row_start = mysqli_fetch_array($result_start);

  $season = $row_start[0];    // 정기권 일 수
  $season_start = $row_start[1];    // 정기권 구매 날짜

  // 구매 후 날짜 카운트 어떻게 할건지 추가 구현
  if ($season == 4 || $season == 5 || $season == 7) {
    // code...
    $query = "SELECT DATE_SUB('$today', INTERVAL $season DAY)";   // 정기권 일 수 빼기
    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    if ($row[0] <= $season_start) {

      $null = "0";
      $day = $_SESSION['day'];
      $src = $_SESSION['src'];
      $dest = $_SESSION['dest'];
      $srcTime = $_SESSION['srcTime'];
      $destTime = $_SESSION['destTime'];
      $seatNum = $_SESSION['seatNum'];
      $price = $_SESSION['price'];

      $query = "INSERT INTO TICKET(num, day, src, dest, srcTime, destTime, seatNum, price, userId)
      values('$null', '$day', '$src', '$dest', '$srcTime', '$destTime', '$seatNum', '$price', '$id')";

      mysqli_query($conn, $query) or die(mysqli_error($conn));

      print "<script>alert('결제가 완료되었습니다.')</script>";
      print "<script>document.location.href='../html/main_mem.html'</script>";
    } else {
      // code...
      print "<script>alert('정기권의 이용기간이 종료되었습니다. 재구매 하십시오.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

  } else {
    print "<script>alert('보유한 정기권이 없습니다. 정기권을 구매하십시오.')</script>";
    print "<script>document.location.href='javascript:history.go(-1)'</script>";
  }

?>
      </div>
      <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      </ul>
      </div>
      </body>
      </html>
