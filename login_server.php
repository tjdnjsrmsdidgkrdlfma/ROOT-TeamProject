<?php
    session_start();
    include "db.php";

    if(isset($_POST['logID']) && isset($_POST['logPassword']))
    {
        $LOGID = mysqli_real_escape_string($db, $_POST['logID']);
        $LOGPWD = mysqli_real_escape_string($db, $_POST['logPassword']);

        if(empty($LOGID))
        {
            header("location: login_view.php?error=아이디가 비어있습니다");
            exit();
        }
        else if(empty($LOGPWD))
        {
            header("location: login_view.php?error=비밀번호가 비어있습니다");
            exit();
        }
        else
        {
            $sql = "select * from member where mb_id = '$LOGID'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) === 1)
            {
                $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
                $hash = $row['password'];

                $_SESSION['mb_id'] = $row['mb_id'];
                $_SESSION['mb_nick'] = $row['mb_nick'];
                $_SESSION['no'] = $row['no'];
                $_SESSION['password'] = $row['password'];

                if(password_verify($LOGPWD, $hash))
                {
                    echo "<script> alert('로그인 성공!'); alert('마이페이지로 이동'); location.href='mypage.php'; </script>";
                }
                else
                {
                    header("location: login_view.php?error=비밀번호가 틀렸습니다");
                    exit();
                }
            }
            else
            {
                header("location: login_view.php?error=아이디가 잘못됐습니다");
                exit(); 
            }
            
        }
    }
    else
    {
        header("location: login_view.php?error=알 수 없는 오류가 발생하였습니다");
        exit();
        
    }
?>