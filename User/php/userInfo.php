<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <title>User infomation</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select * from USER_DB where id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    echo "<section><div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <thead>
    <tr>
    <th>아이디</th>
    <th>비밀번호</th>
    <th>이름</th>
    <th>연락처</th>
    <th>마일리지</th>
    </tr></thead>
    </table>
    </div>
    <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody>
    <tr>
    <td>$row[0]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
    </tr>
    </tbody></table></div></section>";

    mysqli_close($conn);
 ?>
<form>
    <button type='button' name='mod_mem' onclick="location.href='../html/modifyMem.html'">회원정보 수정</button><br><br>
    <button type='button' name='del_mem' onclick="location.href='deleteMem.php'">회원 탈퇴</button><br><br>
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
