<?php
    session_start();
    include "db.php";

    if(isset($_POST['chkNick']) && isset($_POST['chkPwd']))
    {
        $CHKNICK = mysqli_real_escape_string($db, $_POST['chkNick']);
        $CHKPWD = mysqli_real_escape_string($db, $_POST['chkPwd']);
        
        if(empty($CHKNICK))
        {
            header("location: find_id_view.php?error=닉네임이 비어있습니다");
            exit();
        }
        else if(empty($CHKPWD))
        {
            header("location: find_id_view.php?error=비밀번호가 비어있습니다");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM `member` WHERE `mb_nick` = '$CHKNICK'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) === 1)
            {
                $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
                $hash = $row['password'];

                if(password_verify($CHKPWD, $hash))
                {
                    echo "<h2>귀하가 찾고자 하는 아이디는 ".$row['mb_id']."입니다</h2>";

                    echo "<br>";
                }
                else
                {
                    header("location: find_id_view.php?error=비밀번호가 틀렸습니다");
                    exit();   
                }
                
            }
            else
            {
                header("location: find_id_view.php?error=조건과 일치하는 계정이 없습니다");
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