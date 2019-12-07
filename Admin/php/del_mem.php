<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $query = "select * from USER_DB";
  $result = mysqli_query($conn, $query);

  echo "<table border = '1'>
  <tr>
  <td>아이디</td>
  <td>비밀번호</td>
  <td>이름</td>
  <td>연락처</td>
  <td>마일리지</td>
  </tr>";

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    </tr>";
  }
  echo "</table>";

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>del_mem</title>
  </head>
  <body>
    <form method="post" action="delete.php">
      <input type="text" name="userId" placeholder="삭제하려는 회원의 아이디를 입력해주세요."><br><br>
      <button type="submit" name="a_seat">삭제</button>
    </form>
  </body>
</html>
