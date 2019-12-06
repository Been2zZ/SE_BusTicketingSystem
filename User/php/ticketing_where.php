<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $day = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

    $query = "select busId,busLevel from BUS_DB where src='$src' and dest='$dest'";
    $result = mysqli_query($conn, $query);
    $num = 1;

    while ($row = mysqli_fetch_array($result)) {
      // code...
      $query2 = "select srcTime,destTime from BUS_DRIVE_DB where busId='$row[0]' and day='$day'";
      $result2 = mysqli_query($conn, $query2);

      echo "<table border = '1'>
      <tr>
      <td>번호</td>
      <td>버스등급</td>
      <td>출발시간</td>
      <td>도착시간</td>
      </tr><br>";

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<tr><td>$num</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row2[0]</td>";
        echo "<td>$row2[1]</td></tr>";
        $query3 = "UPDATE BUS_DRIVE_DB SET tmpNum='$num'
        where busId='$row[0]' and day='$day' and srcTime='$row2[0]' and destTime='$row2[1]'";
        $num = $num + 1;
        $result3 = mysqli_query($conn, $query3);
      }
      echo "</table>";
    }

 ?>

<meta charset="UTF-8">

<form method="post" action="ticketing_when.php">
  <input type="number" name="timeNum" placeholder="예매할 시간의 번호를 입력해주세요."><br><br>
  <button type="submit" name="ticketing_when">선택</button>
</form>
