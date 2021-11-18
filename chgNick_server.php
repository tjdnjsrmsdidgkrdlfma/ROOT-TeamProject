<?php

session_start();
include "db.php";

if(isset($_POST['exNick']) && isset($_POST['newNick']) && isset($_POST['pwd']) && isset($_POST['conpwd']))
{
    $_SESSION['mb_nick'] = $_POST['exNick'];
    $EXNICK = mysqli_real_escape_string($db, $_POST['exNick']);
    $NEWNICK = mysqli_real_escape_string($db, $_POST['newNick']);
    $PWD = mysqli_real_escape_string($db, $_POST['pwd']);
    $CONPWD = mysqli_real_escape_string($db, $_POST['conpwd']);

    if(empty($EXNICK))
    {
        header("location: chgNick_view.php?error=기존 닉네임이 비어있습니다");
        exit();
    }
    else if(empty($NEWNICK))
    {
        header("location: chgNick_view.php?error=새 닉네임이 비어있습니다");
        exit();
    }
    else if(empty($PWD))
    {
        header("location: chgID_view.php?error=비밀번호가 비어있습니다");
        exit();
    }
    else if(empty($CONPWD))
    {
        header("location: chgID_view.php?error=비밀번호 확인이 비어있습니다");
        exit();
    }
    else if($PWD !== $CONPWD)
    {
        header("location: chgID_view.php?error=비밀번호가 일치하지 않습니다");
        exit();
    }
    else
    {
        $select = "SELECT * from `member` WHERE `mb_nick` = '$NEWNICK'";
        $result = mysqli_query($db, $select);

        if(mysqli_num_rows($result) > 0)
        {
            header("location: chgNick_view.php?error=이미 존재하는 아이디입니다");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM `member` WHERE `mb_nick` = '$_SESSION[mb_nick]' AND `password` = '$PWD'";
            $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $sql_update = "UPDATE `member` SET `mb_nick` = '$NEWNICK' WHERE `mb_nick` = '$_SESSION[mb_nick]'";
            $order = mysqli_query($db, $sql_update);

            $sql_select = "SELECT * FROM `member` WHERE `mb_nick` = '$NEWNICK'";
            $query = mysqli_query($db, $sql_select);

            if(mysqli_num_rows($query) === 1)
            {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['mb_nick'] = $row['mb_nick'];

                echo "<script> alert('닉네임 바꾸기 성공'); alert('마이페이지로 이동'); location.href='mypage.php'; </script>";
            }
            else
            {
                header("location: chgNick_view.php?error=응애");
                exit();
            }
        }
        else
        {
            header("location: chgNick_view.php?error=일치하는 아이디가 없습니다");
            exit();
        }
        }
    }
    
}
?>