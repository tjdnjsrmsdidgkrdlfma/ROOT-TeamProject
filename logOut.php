<?php
    session_start(); // 세션을 시작한다

    session_unset(); // 세션 배열의 모든 값을 지운다

    session_destroy(); //세션을 파괴한다 / 완전히 지운다

    header("location: login_view.php"); // 로그인 페이지로 이동한다
    exit();
?>