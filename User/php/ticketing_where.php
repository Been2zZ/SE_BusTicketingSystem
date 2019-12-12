<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
      <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Ticketing</title>
  </head>
  <body>
    <div class="wrapper">
    <div class="container">

<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $day = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

    if ($src == $dest) {
      // code...
      print "<script>alert('출도착지가 동일합니다. 다시 입력해주세요.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    $query_check = "select DATE_FORMAT(now(), '%Y-%m-%d')";  // today
    $result_check = mysqli_query($conn, $query_check);
    $row_check = mysqli_fetch_array($result_check);

    $query_check2 = "SELECT DATE_ADD('$row_check[0]', INTERVAL 7 DAY)";  // (today+7)일
    $result_check2 = mysqli_query($conn, $query_check2);
    $row_check2 = mysqli_fetch_array($result_check2);

    if ($day < $row_check[0]) {
      // 현재 날짜보다 이전
      print "<script>alert('지난 날짜에 관한 예매가 불가능 합니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    if ($day > $row_check2[0]) {
      // 일주일 후 날짜 조회 시
      print "<script>alert('아직 배차된 버스가 존재하지 않습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    $query2 = "select busId,busLevel from BUS_DB where src='$src' and dest='$dest'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);

    if ($row2[0] == null) {
      // code...
      print "<script>alert('해당하는 버스가 없습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    $query = "select busId,busLevel,price from BUS_DB where src='$src' and dest='$dest'";
    $result = mysqli_query($conn, $query);
    $num = 1;

    echo "<h1>".$_POST['year']."년 ";
    echo $_POST['month']."월 ";
    echo $_POST['day']."일 ";
    echo "$src -> $dest"."<h1>";

    echo "<section>
    <div></div>
    <div>
    <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <thead>
    <tr>
    <th>번호</th>
    <th>버스등급</th>
    <th>출발시간</th>
    <th>도착시간</th>
    <th>가격</th>
    </tr></thead>
    </table>
    </div>";

    echo"<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody>";

    while ($row = mysqli_fetch_array($result)) {
      // code...

      $query2 = "select srcTime,destTime from BUS_DRIVE_DB where busId='$row[0]' and day='$day' order by srcTime";
      $result2 = mysqli_query($conn, $query2);

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<tr><td>$num</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row2[0]</td>";
        echo "<td>$row2[1]</td>";
        echo "<td>$row[2]</td></tr>";
        $query3 = "UPDATE BUS_DRIVE_DB SET tmpNum='$num'
        where busId='$row[0]' and day='$day' and srcTime='$row2[0]' and destTime='$row2[1]'";
        $num = $num + 1;
        $result3 = mysqli_query($conn, $query3);
      }
    }
    echo "</tbody></table>
    </div>
    </div>
    <div></div></section>";

    $_SESSION['num'] = $num - 1;
 ?>
<form method="post" action="ticketing_when.php">
  <h2>예매할 시간의 번호를 입력해주세요.</h2>
  <input type="text" name="timeNum" pattern="\d{1,2}" placeholder="번호를 입력해주세요..." required=''>
  <button type="submit" style="font-family:'Do Hyeon'; font-size:40px;" name="ticketing_when">선택</button>
  <br><br>
  <a href="javascript:history.go(-1)">&nbsp B A C K &nbsp</a>
</form>
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
