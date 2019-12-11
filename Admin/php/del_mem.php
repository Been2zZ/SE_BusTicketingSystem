<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../bttn.css?after">
      <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <title>Delete User</title>
  </head>
  <body>
    <div class="wrapper">
    <div class="container">
<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $query = "select * from USER_DB";
  $result = mysqli_query($conn, $query);

  echo "<section>
  <div></div>
  <div>
  <div class='tbl-header'>
  <table cellpadding='0' cellspacing='0' border='0'>
  <thead>
  <tr>
  <td>아이디</td>
  <td>비밀번호</td>
  <td>이름</td>
  <td>연락처</td>
  <td>마일리지</td>
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
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    </tr>";
  }
  echo "</tbody></table>
  </div>
  </div>
  <div></div>
  </section>";

  mysqli_close($conn);
?>


<form method="post" action="delete.php">
<input type="text" name="userId" placeholder="삭제하려는 회원의 아이디를 입력해주세요."><br><br>
<button type="submit" style="font-family:'Do Hyeon'; font-size:40px;" name="a_seat">삭제</button>
<br><br><br><br>
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
