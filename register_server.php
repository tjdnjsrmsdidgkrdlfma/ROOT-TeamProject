<?php
    include "db.php";

    if(isset($_POST['regID']) && isset($_POST['regNick']) && isset($_POST['regPassword']) && isset($_POST['regConPassword']))
    {
        $REGID = mysqli_real_escape_string($db, $_POST['regID']);
        $REGNICK = mysqli_real_escape_string($db, $_POST['regNick']);
        $REGPWD = mysqli_real_escape_string($db, $_POST['regPassword']);
        $REGCONPWD = mysqli_real_escape_string($db, $_POST['regConPassword']);

        if(empty($REGID))
        {
            header("location: register_view.php?error=아이디가 비어있습니다");
            exit();
        }
        else if(empty($REGNICK))
        {
            header("location: register_view.php?error=닉네임이 비어있습니다");
            exit();
        }
        else if(empty($REGPWD))
        {
            header("location: register_view.php?error=비밀번호가 비어있습니다");
            exit();
        }
        else if(empty($REGCONPWD))
        {
            header("location: register_view.php?error=비밀번호 확인이 비어있습니다");
            exit();
        }
        else if($REGPWD !== $REGCONPWD)
        {
            header("location: register_view.php?error=비밀번호가 일치하지 않아요");
            exit();
        }
        else
        {
            $REGPWD = password_hash($REGPWD, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM `member` WHERE `mb_id` = '$REGID' OR `mb_nick` = '$REGNICK'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) > 0)
            {
                header("location: register_view.php?error=아이디 또는 닉네임이 이미 존재합니다");
                exit();
            }
            else
            {
                $sql_save = "INSERT into member(mb_id, mb_nick, password) values('$REGID','$REGNICK','$REGPWD')";
                $order = mysqli_query($db, $sql_save);

                if($order)
                {
                    echo "<script> alert('성공적으로 가입되었습니다'); alert('로그인 페이지로 넘어갑니다'); location.href='login_view.php'; </script>";

                }
                else
                {
                    header("location: register_view.php?error=가입에 실패하였습니다");
                    exit();
                    
                }
            }
        }
    }
    else
    {
        header("location: register_view.php?error=알 수 없는 오류가 발생하였습니다");
        exit();
        
    }
?>