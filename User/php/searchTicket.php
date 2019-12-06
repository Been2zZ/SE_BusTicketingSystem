<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select num from USER_TICKET_DB where id = '$id'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
      // code...

      $query2 = "select * from TICKET where num='$row[0]'";
      $result2 = mysqli_query($conn, $query2);

      while ($row2 = mysqli_fetch_array($result2)) {
        // code...
        echo "<table border = '1'>
        <tr>
        <td>번호</td>
        <td>날짜</td>
        <td>출발지</td>
        <td>도착지</td>
        <td>출발시간</td>
        <td>도착시간</td>
        <td>좌석번호</td>
        <td>결제방식</td>
        <td>가격</td>
        </tr>
        <tr>
        <td>$row2[0]</td>
        <td>$row2[1]</td>
        <td>$row2[2]</td>
        <td>$row2[3]</td>
        <td>$row2[4]</td>
        <td>$row2[5]</td>
        <td>$row2[6]</td>
        <td>$row2[7]</td>
        <td>$row2[8]</td>
        </tr>
        </table>";
      }
    }

    mysqli_close($conn);
 ?>


<!-- <html>
  <title>UserInfo</title>
    <button type='button' name='mod_mem' onclick="location.href='../html/modifyMem.html'"
   style='width:100pt; height:20pt'>회원정보 수정</button><br><br>
    <button type='button' name='del_mem' onclick="location.href='deleteMem.php'"
    style='width:100pt; height:20pt'>회원 탈퇴</button><br><br>
</html> -->
