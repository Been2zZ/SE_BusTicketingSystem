<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>User infomation</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select * from USER_DB where id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $default = 0;

    if ($row[5] != -1) {
      $default = $row[5];
    }

    echo "<section>
    <div></div>
    <div>
    <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <thead>
    <tr>
    <th>아이디</th>
    <th>비밀번호</th>
    <th>이름</th>
    <th>연락처</th>
    <th>마일리지</th>
    <th>보유 정기권 일 수</th>
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
    <td>$default</td>
    </tr>
    </tbody></table></div>
    </div>
    <div></div>
    </section>";

    mysqli_close($conn);
 ?>
<form>
    <button type='button' name='mod_mem' style="font-family: 'Do Hyeon', sans-serif; font-size:40px;" onclick="location.href='../html/modifyMem.html'">회원정보 수정</button><br><br>
    <button type='button' name='del_mem' style="font-family: 'Do Hyeon', sans-serif; font-size:40px;" onclick="location.href='../html/del_Mem.html'">회원 탈퇴</button><br><br>
    <br><br>
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
