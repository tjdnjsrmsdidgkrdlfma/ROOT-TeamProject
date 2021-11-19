<?php
session_start();
include "library.php";
$URL = "./index.php";
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}
?>

<html>

<head>
    <title>마이페이지</title>
</head>

<body>

    <h2>마이페이지</h2>

    <h3><a href="memInfo.php">회원 정보</a></h3>
    <h3><a href="list.php">게시판</a></h3>
    <h3><a href="logOut.php">로그아웃</a></h3>

</body>

</html>