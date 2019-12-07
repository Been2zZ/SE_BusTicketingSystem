<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $timeNum = $_POST['timeNum'];
    $_SESSION['timeNum'] = $timeNum;

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
    <td>$row[1]</td>
    <td>$row2[0]</td>
    <td>$row2[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row2[2]</td>
    <td>$row2[3]</td>
    </tr>
    </table>";

    if ($row2[2] == 'S') {
      // == 'S'
      print "<script>document.location.href='s_seat.php'</script>";
    } else {
      // == 'A'
      print "<script>document.location.href='a_seat.php'</script>";
    }
 ?>
