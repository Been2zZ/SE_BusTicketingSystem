<?php
session_start();
// ini_set('display_errors', '1');

$usedMileage = $_POST['mileage'];
$_SESSION['usedMileage'] = $usedMileage;

 ?>
<<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script language = 'javascript'>
    var result = confirm("결제를 진행하시겠습니까?");
    if (result) {
      document.location.href='../php/payment.php';
    } else {
      document.location.href='../html/main_mem.html';
    }
    </script>
  </head>
  <body>
  </body>
</html>
