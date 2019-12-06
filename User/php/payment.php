<?php
  session_start();
  ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

  $id = $_SESSION['id'];
  $mileage = $_SESSION['mileage'];

  $query = "select mileage from USER_DB where id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $new_mileage = $row[0] - $mileage;

  $query2 = "UPDATE USER_DB SET mileage='$new_mileage' where id = '$id'";
  mysqli_query($conn, $query2);

  $query3 = "insert into TICKET values(0, '$_SESSION['day']', '$_SESSION['src']', '$_SESSION['dest']', '$_SESSION['srcTime']', '$_SESSION['destTime']', '$_SESSION['seatNum']', '$_SESSION['price']')";
  mysqli_query($conn, $query3);

  print "<script>alert('결제가 완료되었습니다.')</script>";
  print "<script>document.location.href='../html/main_mem.html'</script>";
?>
