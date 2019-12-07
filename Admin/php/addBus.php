<!-- 버스 등록 -->
<?php
    // session_start();
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "67734107", "SE_BusTicketingSystem", "3306") or die("FAIL.");

    $busId = $_POST["busId"];
    $src = $_POST["src"];
    $dest = $_POST["dest"];
    $busLevel = $_POST["busLevel"];
    $price = $_POST["price"];

    $query = "select * from BUS_DB where busId = '$busId'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // id가 존재하는 경우
        print "<script>alert('존재하는 버스 아이디가 있습니다.')</script>";
        print "<script>document.location.href='../html/addBus.html'</script>";
    } else {
      $query = "INSERT INTO BUS_DB VALUES('$busId', '$src', '$dest', '$busLevel', '$price')";
      $result = mysqli_query($conn, $query);
      print "<script>alert('버스 등록이 완료되었습니다.')</script>";
      print "<script>document.location.href='../html/addBus.html'</script>";
    }

    mysqli_close($conn);
 ?>
