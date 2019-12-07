
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $day = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

    $query = "select busId,src,dest,busLevel,price from BUS_DB where src='$src' and dest='$dest'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
      // code...
      $query2 = "select day,srcTime,destTime from BUS_DRIVE_DB where busId='$row[0]' and day='$day'";
      $result2 = mysqli_query($conn, $query2);

      echo $_POST['year']."년 ";
      echo $_POST['month']."월 ";
      echo $_POST['day']."일 ";
      echo "$row[1] -> $row[2]";

      echo "<table border = '1'>
      <tr>
      <td>출발시간</td>
      <td>도착시간</td>
      <td>버스등급</td>
      <td>가격</td>
      </tr><br>";

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<td>$row2[1]</td>";
        echo "<td>$row2[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td></tr>";
      }
      echo "</table>";
    }
 ?>
