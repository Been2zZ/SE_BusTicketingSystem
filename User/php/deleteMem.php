<?php
    session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $id = $_SESSION['id'];
    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $phoneNum = $_POST["phoneNum"];

    $query = "DELETE FROM USER_DB where id='$id'";
    $result = mysqli_query($conn, $query);

    print "<script>alert('회원 탈퇴가 완료되었습니다.')</script>";
    print "<script>document.location.href='../../main.html'</script>";

    mysqli_close($conn);
 ?>
