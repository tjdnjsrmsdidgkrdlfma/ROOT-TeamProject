<?php
session_start(); //session을 시작한다
include "db.php"; // db.php 파일을 포함시킨다

// $_POST로 얻어온 변수가 설정돼있는지 확인한다
if (isset($_POST['logID']) && isset($_POST['logPassword'])) {
    // 각 변수를 특수문자에서 문자열로 탈출시킨다
    $LOGID = mysqli_real_escape_string($db, $_POST['logID']);
    $LOGPWD = mysqli_real_escape_string($db, $_POST['logPassword']);

    //입력이 비어있을 때 header로 에러 메시지 출력
    if (empty($LOGID)) {
        echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";
    }
    else if (empty($LOGPWD)) {
        echo "<script> alert('비밀번호가 비어있습니다'); history.back(); </script>";
    }
    else {
        //mb_id가 $LOGID인 값을 모두 조회한다
        $sql = "select * from member where mb_id = '$LOGID'";
        $result = mysqli_query($db, $sql);

        // 조회한 값과 같은 값이 한 개 있는지 확인한다
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
            $hash = $row['password']; // 그 값들 중 password 부분만 가져온다

            // $_SESSION으로 조회한 값들을 저장시킨다
            $_SESSION['mb_id'] = $row['mb_id'];
            $_SESSION['mb_nick'] = $row['mb_nick'];
            $_SESSION['no'] = $row['no'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['pwd'] = $LOGPWD;

            //비밀번호 $LOGPWD과 $hash가 서로 같은지 확인한다
            if (password_verify($LOGPWD, $hash))
            {
                echo "<script> alert('로그인 성공!'); location.href='index.html'; </script>";
            }
            else
            {              
                if (isset($_SESSION['mb_nick']))
                {
                    session_destroy();
                    echo "<script> alert('비밀번호가 올바르지 않습니다'); history.back(); </script>";
                }
            }
        }
        else {
            echo "<script> alert('회웝가입된 아이디가 없습니다'); history.back(); </script>";
        }

    }
}
else {
    echo "<script> alert('알 수 없는 오류가 발생했습니다'); history.back(); </script>";

}
?>