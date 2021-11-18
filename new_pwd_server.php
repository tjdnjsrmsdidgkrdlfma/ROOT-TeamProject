<?php

include "db.php";

if(isset($_POST['exID']) && isset($_POST['exNick']) && isset($_POST['newpwd']) && isset($_POST['newconpwd']))
{
    $EXID = mysqli_real_escape_string($db, $_POST['exID']);
    $EXNICK = mysqli_real_escape_string($db, $_POST['exNick']);
    $NEWPWD = mysqli_real_escape_string($db, $_POST['newpwd']);
    $NEWCONPWD = mysqli_real_escape_string($db, $_POST['newconpwd']);

    if(empty($EXID))
    {
        header("location: new_pwd_view.php?error=아이디가 비어있습니다");
        exit();
    }
    else if(empty($EXNICK))
    {
        header("location: new_pwd_view.php?error=닉네임이 비어있습니다");
        exit();
    }
    else if(empty($NEWPWD))
    {
        header("location: new_pwd_view.php?error=비밀번호가 비어있습니다");
        exit();
    }
    else if(empty($NEWCONPWD))
    {
        header("location: new_pwd_view.php?error=비밀번호 확인이 비어있습니다");
        exit();
    }
    else
    {
        $NEWPWD = password_hash($NEWPWD, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `member` WHERE `mb_id` = '$EXID' AND `mb_nick` = '$EXNICK'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $sql_update = "UPDATE `member` SET `password` = '$NEWPWD' WHERE `mb_id` = '$EXID' AND `mb_nick` = '$EXNICK'";
            $order = mysqli_query($db, $sql_update);

            $sql_select = "SELECT * FROM `member` WHERE `mb_id` = '$EXID' AND `mb_nick` = '$EXNICK'";
            $query = mysqli_query($db, $sql);

            if(mysqli_num_rows($query) === 1)
            {
                
                $row = mysqli_fetch_assoc($query);
                $hash = $row['password'];
                
                $enc = password_hash($hash, PASSWORD_DEFAULT);

                if(password_verify($NEWPWD, $enc))
                {
                    echo "<script> alert('비밀번호 재설정 성공!'); alert('로그인 페이지로 이동'); location.href='login_view.php'; </script>";
                }



            }
            
            
        }
        else
        {
            header("location: new_pwd_view.php?error=조건과 일치하는 계정이 없습니다");
            exit();
        }
        
    }

    
}
?>