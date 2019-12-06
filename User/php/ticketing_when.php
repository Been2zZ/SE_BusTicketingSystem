<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "On");
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $timeNum = $_POST['timeNum'];
    print "$timeNum";
    $_SESSION['timeNum'] = $timeNum;

    $query = "select * from BUS_DRIVE_DB where tmpNum='$timeNum'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $_SESSION['busId'] = $row[0];
    $_SESSION['day'] = $row[1];
    $_SESSION['srcTime'] = $row[2];
    $_SESSION['destTime'] = $row[3];

    $query2 = "UPDATE BUS_DRIVE_DB set tmpNum=0";
    mysqli_query($conn, $query2);

    $query3 = "select * from BUS_DRIVE_DB where busId='$_SESSION['busId']'";
    $result2 = mysqli_query($conn, $query3);
    $row2 = mysqli_fetch_array($result2);

    $_SESSION['src'] = $row2[1];
    $_SESSION['dest'] = $row2[2];
    $_SESSION['price'] = $row2[4];

    echo "<table border = '1'>
    <tr>
    <td>날짜</td>
    <td>출발지</td>
    <td>도착지</td>
    <td>출발시간</td>
    <td>도착시간</td>
    <td>버스등급</td>
    <td>가격</td>
    </tr>
    <tr>
    <td>$row[0]</td>
    <td>$row2[1]</td>
    <td>$row2[2]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row2[3]</td>
    <td>$row2[4]</td>
    </tr>
    </table>";
 ?>

<meta charset="UTF-8">

<form method="post" action="ticketing_seat.php">
  <input type="text" name="seatGo" placeholder="해당 버스의 좌석 예매를 진행하시겠습니까?."><br><br>
  <button type="submit" name="ticketing_seat">좌석 예매</button>
</form>
