<?php
    // db.php 파일을 포함
    include "db.php";

    //$_POST로 받아온 변수가 설정돼있는지 확인한다
    if(isset($_POST['regID']) && isset($_POST['regNick']) && isset($_POST['regPassword']) && isset($_POST['regConPassword']))
    {
        //변수를 특수문자에서 문자열로 탈출시킨다
        $REGID = mysqli_real_escape_string($db, $_POST['regID']);
        $REGNICK = mysqli_real_escape_string($db, $_POST['regNick']);
        $REGPWD = mysqli_real_escape_string($db, $_POST['regPassword']);
        $REGCONPWD = mysqli_real_escape_string($db, $_POST['regConPassword']);

        //변수 내용이 비어있는지 확인한다
        if(empty($REGID))
        {
            echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGNICK))
        {
            echo "<script> alert('닉네임이 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGPWD))
        {
            echo "<script> alert('비밀번호가 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGCONPWD))
        {
            echo "<script> alert('비밀번호 확인이 비어있습니다'); history.back(); </script>";
        }
        //$REGPWD와 REGCONPWD가 같지 않은지 확인한다
        else if($REGPWD !== $REGCONPWD)
        {
            echo "<script> alert('비밀번호가 일치하지 않습니다'); history.back(); </script>";
        }
        else
        {
            //REGPWD를 암호화시킨다
            $REGPWD = password_hash($REGPWD, PASSWORD_DEFAULT);

            // DB에서 아이디가 $REGID이거나 닉네임이 REGNICK인 값이 있는지 조회하고
            $sql = "SELECT * FROM `member` WHERE `mb_id` = '$REGID' OR `mb_nick` = '$REGNICK'";
            $result = mysqli_query($db, $sql);

            // 조회한  결과와 같은 값이 한 개 이상일 때 ?error에 대한 내용을 출력
            if(mysqli_num_rows($result) > 0)
            {
                echo "<script> alert('아이디 또는 닉네임이 이미 존재합니다'); history.back(); </script>";
            }
            else
            {
                //각 컬럼에 설정해둔 변수들의 값을 넣어준다.
                $sql_save = "INSERT into member(mb_id, mb_nick, password) values('$REGID','$REGNICK','$REGPWD')";
                $order = mysqli_query($db, $sql_save);

                // $sql_save에 관한 query가 잘 실행됐는지 확인한다
                if($order)
                {
                    echo "<script> alert('성공적으로 가입되었습니다'); alert('로그인 페이지로 넘어갑니다'); location.href='login_view.php'; </script>";

                }
                else
                {
                    echo "<script> alert('가입에 실패하였습니다'); history.back(); </script>";
                    
                }
            }
        }
    }
    else
    {
        echo "<script> alert('알 수 없는 오류가 발생하였습니다'); history.back(); </script>";
        
    }
?>