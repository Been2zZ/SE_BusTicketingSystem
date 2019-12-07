<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $phoneNum = $_SESSION['phoneNum'];

    $query = "select num,day,src,dest,srcTime,destTime,seatNum,price from TICKET where phoneNum = '$phoneNum'";
    $result = mysqli_query($conn, $query);

    echo "<table border = '1'>
    <tr>
    <td>번호</td>
    <td>날짜</td>
    <td>출발지</td>
    <td>도착지</td>
    <td>출발시간</td>
    <td>도착시간</td>
    <td>좌석번호</td>
    <td>가격</td>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>
      <td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
      <td>".$row[4]."</td>
      <td>".$row[5]."</td>
      <td>".$row[6]."</td>
      <td>".$row[7]."</td>
      </tr>";
    }

    echo "</table>";

    mysqli_close($conn);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>modify Ticket</title>
   </head>
   <body>
     <form method="post" action="modifyTicket.php">
       <input type="text" name="TicketNum" placeholder="시간 변경을 원하는 예매권의 번호를 입력해주세요."><br><br>
       <button type="submit" name="inputTicketNum">입력</button>
     </form>
   </body>
 </html>
