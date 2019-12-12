<?php
    session_start();
    // ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $_SESSION['phoneNum'] = $_POST['phoneNum'];

    print "<script>document.location.href='../html/user_payment.html'</script>";

    mysqli_close($conn);
 ?>
