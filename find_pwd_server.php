<?php
    include "db.php";

    if(isset($_POST['checkID']) && isset($_POST['checkNick']))
    {
        $CHKID = mysqli_real_escape_string($db, $_POST['checkID']);
        $CHKNICK = mysqli_real_escape_string($db, $_POST['checkNick']);
        
        if(empty($CHKID))
        {
            header("location: find_pwd_view.php?error=닉네임이 비어있습니다");
            exit();
        }
        else if(empty($CHKNICK))
        {
            header("location: find_pwd_view.php?error=비밀번호가 비어있습니다");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM `member` WHERE `mb_id` = '$CHKID' AND `mb_nick` = '$CHKNICK'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) === 1)
            {
                echo "<script> location.href='new_pwd_view.php'; </script>";
            }
            else
            {
                header("location: find_pwd_view.php?error=조건과 일치하는 계정이 없습니다");
                exit();
            }
        }
    }
    else
    {
        header("location: find_id_view.php?error=알 수 없는 오류가 발생하였습니다");
        exit();
        
    }
    ?> <a href="login_view.php">로그인 페이지로 돌아이기</a> <?php
?>