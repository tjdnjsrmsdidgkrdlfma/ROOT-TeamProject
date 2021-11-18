<?php

session_start();
include "db.php";

if(isset($_POST['exID']) && isset($_POST['newID']) && isset($_POST['pwd']) && isset($_POST['conpwd']))
{
    $_SESSION['mb_id'] = $_POST['exID'];
    $EXID = mysqli_real_escape_string($db, $_POST['exID']);
    $NEWID = mysqli_real_escape_string($db, $_POST['newID']);
    $PWD = mysqli_real_escape_string($db, $_POST['pwd']);
    $CONPWD = mysqli_real_escape_string($db, $_POST['conpwd']);

    if(empty($EXID))
    {
        header("location: chgID_view.php?error=기존 아이디가 비어있습니다");
        exit();
    }
    else if(empty($NEWID))
    {
        header("location: chgID_view.php?error=새 아이디가 비어있습니다");
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
        $select = "SELECT * from `member` WHERE `mb_id` = '$NEWID'";
        $result = mysqli_query($db, $select);

        if(mysqli_num_rows($result) > 0)
        {
            header("location: chgID_view.php?error=아이디 또는 닉네임이 이미 존재합니다");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM `member` WHERE `mb_id` = '$_SESSION[mb_id]' AND `password` = '$PWD'";
            $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $sql_update = "UPDATE `member` SET `mb_id` = '$NEWID' WHERE `mb_id` = '$_SESSION[mb_id]'";
            $order = mysqli_query($db, $sql_update);

            $sql_select = "SELECT * FROM `member` WHERE `mb_id` = '$NEWID'";
            $query = mysqli_query($db, $sql_select);

            if(mysqli_num_rows($query) === 1)
            {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['mb_id'] = $row['mb_id'];

                echo "<script> alert('아이디 바꾸기 성공'); alert('마이페이지로 이동'); location.href='mypage.php'; </script>";
            }
            else
            {
                header("location: chgID_view.php?error=응애");
                exit();
            }
        }
        else
        {
            header("location: chgID_view.php?error=일치하는 아이디가 없습니다");
            exit();
        }
        }
    }
    
}
?>