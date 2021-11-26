<?php
session_start(); //session을 시작한다
include "db.php"; // db.php 파일을 포함시킨다

// $_POST로 얻어온 변수가 설정돼있는지 확인한다
if (isset($_POST['id']) && isset($_POST['nick']) && isset($_POST['pwd'])) {
    // 각 변수를 특수문자에서 문자열로 탈출시킨다
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $nick = mysqli_real_escape_string($db, $_POST['nick']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);

    //입력이 비어있을 때 header로 에러 메시지 출력
    if (empty($id)) {
        echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";
    }
    else if (empty($nick))
    {
        echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";
    }
    else if (empty($pwd))
    {
        echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";    
    }
    else {
        //mb_id가 $id인 값을 모두 조회한다
        $sql = "select * from member where mb_id = '$id' and mb_nick = '$nick'";
        $result = mysqli_query($db, $sql);

        // 조회한 값과 같은 값이 한 개 있는지 확인한다
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
            $hash = $row['password']; // 그 값들 중 password 부분만 가져온다


            //비밀번호 $pwd과 $hash가 서로 같은지 확인한다
            if (password_verify($pwd, $hash)) {

                //세션을 파괴한다
                session_destroy();

                // 컬럼 mb_id가 $id이고 mb_nick이 $nick인 값들을 모두 지워준다
                $del = "DELETE FROM `member` WHERE `mb_id` = '$id' AND `mb_nick` = '$nick'";
                        mysqli_query($db, $del);
                        echo "<script> alert('계정 삭제 성공!'); location.href='register_view.php'; </script>";
            }
            else {              
                echo "<script> alert('비밀번호가 올바르지 않습니다'); history.back(); ; </script>";
                }
        }
        else {
            echo "<script> alert('조건과 일치하는 계정이 없습니다'); history.back(); ; </script>";
        }

    }
}
else {
    echo "<script> alert('알 수 없는 오류가 발생하였습니다'); history.back(); ; </script>";

}
?>