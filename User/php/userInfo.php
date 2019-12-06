<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];

    $query = "select * from USER_DB where id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    echo "<table border = '1'>
    <tr>
    <td>아이디</td>
    <td>비밀번호</td>
    <td>이름</td>
    <td>연락처</td>
    <td>마일리지</td>
    </tr>
    <tr>
    <td>$row[0]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
    </tr>
    </table>";

    mysqli_close($conn);
 ?>


<html>
  <title>UserInfo</title>
    <button type='button' name='mod_mem' onclick="location.href='../html/modifyMem.html'"
   style='width:100pt; height:20pt'>회원정보 수정</button><br><br>
    <button type='button' name='del_mem' onclick="location.href='../html/deleteMem.html'"
    style='width:100pt; height:20pt'>회원 탈퇴</button><br><br>
</html>
