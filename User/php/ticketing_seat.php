<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $seatNum = $_POST['seatNum'];
    $_SESSION['seatNum'] = $seatNum;

    print $_SESSION['seatNum'];

    echo "<table border = '1'>
    <tr>
    <td>날짜</td>
    <td>출발지</td>
    <td>도착지</td>
    <td>출발시간</td>
    <td>도착시간</td>
    <td>버스등급</td>
    <td>좌석번호</td>
    <td>가격</td>
    </tr>
    <tr>
    <td>".$_SESSION['day']."</td>
    <td>".$_SESSION['src']."</td>
    <td>".$_SESSION['dest']."</td>
    <td>".$_SESSION['srcTime']."</td>
    <td>".$_SESSION['destTime']."</td>
    <td>".$_SESSION['busLevel']."</td>
    <td>".$_SESSION['seatNum']."</td>
    <td>".$_SESSION['price']."</td>
    </tr>
    </table>";
 ?>

<meta charset="UTF-8">

<form method="post" action="../html/payment.html">
  결제를 진행하시겠습니까? <br>
  <button type="submit" name="payment">결제</button>
</form>
