<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>Search Ticket</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $timeNum = $_POST['timeNum'];
    $_SESSION['timeNum'] = $timeNum;

    if ($timeNum > $_SESSION['num'] || $timeNum == 0) {
      // code...
      // $_SESSION['num'] = 0;
      print "<script>alert('해당되는 번호가 없습니다.')</script>";
      print "<script>document.location.href='javascript:history.go(-1)'</script>";
    } else {
      // code...
      $query = "select * from BUS_DRIVE_DB where tmpNum='$timeNum'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);

      $_SESSION['busId'] = $row[0];
      $_SESSION['day'] = $row[1];
      $_SESSION['srcTime'] = $row[2];
      $_SESSION['destTime'] = $row[3];

      $query2 = "select src,dest,busLevel,price from BUS_DB where busId='$row[0]'";
      $result2 = mysqli_query($conn, $query2);
      $row2 = mysqli_fetch_array($result2);

      $query3 = "UPDATE BUS_DRIVE_DB set tmpNum=0";
      mysqli_query($conn, $query3);

      $_SESSION['src'] = $row2[0];
      $_SESSION['dest'] = $row2[1];
      $_SESSION['busLevel'] = $row2[2];
      $_SESSION['price'] = $row2[3];

      echo "<section><div class='tbl-header'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
      <tr>
      <th>날짜</th>
      <th>출발지</th>
      <th>도착지</th>
      <th>출발시간</th>
      <th>도착시간</th>
      <th>버스등급</th>
      <th>가격</th>
      </tr></thead>
      </table>
      </div>
      <div class='tbl-content'>
      <table cellpadding='0' cellspacing='0' border='0'>
      <tbody>
      <tr>
      <td>$row[1]</td>
      <td>$row2[0]</td>
      <td>$row2[1]</td>
      <td>$row[2]</td>
      <td>$row[3]</td>
      <td>$row2[2]</td>
      <td>$row2[3]</td>
      </tr></tbody></table></div></section>";

      if ($row2[2] == 'S') {
        // == 'S'
        $_SESSION['level'] = 'S';
        print "<script>document.location.href='s_seat.php'</script>";
      } else {
        // == 'A'
        $_SESSION['level'] = 'A';
        print "<script>document.location.href='a_seat.php'</script>";
      }
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
