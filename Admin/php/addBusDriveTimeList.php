<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
      <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Add Bus Drive</title>
  </head>
  <body>
    <div class="wrapper">
    <div class="container">
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    // 버스 아이디
    $busId = $_POST["busId"];
    $_SESSION['selectBusId'] = $busId;

    $query2 = "select src,dest from BUS_DB where busId='$busId'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);

    if ($row2[0] == null) {
    print "<script>alert('해당하는 버스 고유번호가 없습니다.')</script>";
    print "<script>document.location.href='javascript:history.go(-1)'</script>";
    }

    echo "<h1>".$row2[0]." -> ".$row2[1]."</h1>";
    echo "운행중인 버스의 목록입니다.";

    $query = "select day,srcTime,destTime from BUS_DRIVE_DB where busId='$busId'";
    $result = mysqli_query($conn, $query);

    echo "<section>
    <div></div>
    <div>
    <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <thead>
    <tr>
    <td>날짜</td>
    <td>출발 시간</td>
    <td>도착 시간</td>
    </tr></thead>
    </table>
    </div>";

    echo"<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody>";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>
      <td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      </tr>";
    }
    echo "</tbody></table>
    </div>
    </div>
    <div></div>
    </section>";

    mysqli_close($conn);
 ?>
 <form method="post" action="../php/addBusDrive.php">
   <h2>추가할 운행 날짜를 입력해주세요.<h2><br>
   <input type="text" name="year" placeholder="운행 년도를 입력해주세요..." required=''>
   <input type="text" name="month" placeholder="운행 월을 입력해주세요..." required=''>
   <input type="text" name="day" placeholder="운행 일을 입력해주세요..." required=''>

   <br><h2>추가할 버스 출발 시간을 입력해주세요.<h2><br>
   <div class="container-width">
   <input type="text" name="src_hour" placeholder="시 (hour)" required=''></div> :
   <div class="container-width">
   <input type="text" name="src_min" placeholder="분 (min)" required=''></div> :
   <div class="container-width">
   <input type="text" name="src_sec" placeholder="초 (sec)" required=''></div>

   <br><br><h2>추가할 버스 도착 시간을 입력해주세요.<h2><br>
   <div class="container-width">
   <input type="text" name="dest_hour" placeholder="시 (hour)" required=''></div> :
   <div class="container-width">
   <input type="text" name="dest_min" placeholder="분 (min)" required=''></div> :
   <div class="container-width">
   <input type="text" name="dest_sec" placeholder="초 (sec)" required=''></div>
   <br><br>
   <button type="submit" style="font-family:'Do Hyeon'; font-size:40px;" name="addBusdrive" required=''>추가</button>
   <br><br><br>
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
