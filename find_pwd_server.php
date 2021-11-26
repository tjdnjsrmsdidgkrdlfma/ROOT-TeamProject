<?php
    // db.php 파일을 포함시킨다
    include "db.php";

    // $_POST로 얻어온 변수가 설정돼있는지 확인한다
    if(isset($_POST['checkID']) && isset($_POST['checkNick']))
    {
        // 각 변수를 특수문자에서 문자열로 탈출시킨다
        $CHKID = mysqli_real_escape_string($db, $_POST['checkID']);
        $CHKNICK = mysqli_real_escape_string($db, $_POST['checkNick']);
        
        // 입력한 변수가 비어있는지 확인한다
        if(empty($CHKID))
        {
            echo "<script> alert('닉네임이 비어있습니다'); history.back(); </script>";
        }
        else if(empty($CHKNICK))
        {
            echo "<script> alert('닉네임이 비어있습니다'); history.back(); </script>";
        }
        else
        {
            //mb_id가 $CHKID이고 mb_nick이 $CHKNICK인 값들을 모두 조회한다
            $sql = "SELECT * FROM `member` WHERE `mb_id` = '$CHKID' AND `mb_nick` = '$CHKNICK'";
            $result = mysqli_query($db, $sql);

            // 조회한 값 중 같은 게 한 개 있는지 확인한다
            if(mysqli_num_rows($result) === 1)
            {
                echo "<script> location.href='new_pwd_view.php'; </script>";
            }
            else
            {
                echo "<script> alert('조건과 일치하는 계정을 찾을 수 없습니다'); history.back(); </script>";
            }
        }
    }
    else
    {
        echo "<script> alert('알 수 없는 오류가 발생하였습니다'); history.back(); </script>";
        
    }
    ?> <a href="login_view.php">로그인 페이지로 돌아이기</a> <?php
?>