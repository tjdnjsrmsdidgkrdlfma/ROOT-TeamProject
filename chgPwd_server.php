<?php

session_start();
include "db.php";

if(isset($_POST['exPwd']) && isset($_POST['newPwd']) && isset($_POST['ID']) && isset($_POST['Nick']))
{
    $_SESSION['password'] = $_POST['exPwd'];

    $EXPWD = mysqli_real_escape_string($db, $_POST['exPwd']);
    $NEWPWD = mysqli_real_escape_string($db, $_POST['newPwd']);
    $ID = mysqli_real_escape_string($db, $_POST['ID']);
    $NICK = mysqli_real_escape_string($db, $_POST['Nick']);

    if(empty($EXPWD))
    {
        header("location: chgPwd_view.php?error=기존 비밀번호가 비어있습니다");
        exit();
    }
    else if(empty($NEWPWD))
    {
        header("location: chgPwd_view.php?error=새 비밀번호가 비어있습니다");
        exit();
    }
    else if(empty($ID))
    {
        header("location: chgPwd_view.php?error=아이디가 비어있습니다");
        exit();
    }
    else if(empty($NICK))
    {
        header("location: chgPwd_view.php?error=닉네임이 비어있습니다");
        exit();
    }
    else
    {
        $select = "SELECT * from `member` WHERE `password` = '$NEWPWD'";
        $result = mysqli_query($db, $select);

        if(mysqli_num_rows($result) > 0)
        {
            header("location: chgPwd_view.php?error=이미 존재하는 비밀번호입니다");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM `member` WHERE `password` = '$_SESSION[password]' AND `mb_id` = '$ID' AND `mb_nick` = '$NICK'";
            $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $sql_update = "UPDATE `member` SET `password` = '$NEWPWD' WHERE `password` = '$_SESSION[password]'";
            $order = mysqli_query($db, $sql_update);

            $sql_select = "SELECT * FROM `member` WHERE `password` = '$NEWPWD'";
            $query = mysqli_query($db, $sql_select);

            if(mysqli_num_rows($query) === 1)
            {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['password'] = $row['password'];

                echo "<script> alert('비밀번호 바꾸기 성공'); alert('마이페이지로 이동'); location.href='mypage.php'; </script>";
            }
            else
            {
                header("location: chgPwd_view.php?error=응애");
                exit();
            }
        }
        else
        {
            header("location: chgPwd_view.php?error=일치하는 아이디가 없습니다");
            exit();
        }
        }
    }
    
}
?>