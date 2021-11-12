<?php

    include('db.php'); //db.php에 있는 기능을 포함시킴
    
    //isset() 함수로 각 변수가 설정돼있는지 확인한다
    if(isset($_POST['id']) && isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['confirmPassword']))
    {
        //특수문자를 문자열로 변경해준다
        $ID = mysqli_real_escape_string($db, $_POST['id']);
        $NICK = mysqli_real_escape_string($db, $_POST['nickname']);
        $PWD = mysqli_real_escape_string($db, $_POST['password']);
        $CONPWD = mysqli_real_escape_string($db, $_POST['confirmPassword']);

        //각 입력값이 비어있는지 확인하고 맞다면 ?error=구문을 출력한다
        if(empty($ID))
        {
            header("location: view.php?error=아이디가 비어있어요");
            exit();
        }
        else if(empty($NICK))
        {
            header("location: view.php?error=닉네임이 비어있어요");
            exit();
        }
        else if(empty($PWD))
        {
            header("location: register_view.php?error=비밀번호가 비어있어요");
            exit();
        }
        else if(empty($CONPWD))
        {
            header("location: register_view.php?error=비밀번호 확인이 비어있어요");
            exit();
        }
        else if($PWD !== $CONPWD)
        {
            header("location: register_view.php?error=비밀번호가 일치하지 않아요");
            exit();
            
        }
        else
        {
            // 암호화
            $PWD = password_hash($PWD, PASSWORD_DEFAULT);

            $sql_same = "SELECT * FROM member where mb_id = '$ID' and mb_nick = '$NICK'"; // member에서 모든 값을 조회하되, mb_id가 $ID이고 mb_nick이 $NICK인 것을 조회한다.
            $order = mysqli_query($db, $sql_same); //$db에 $sql_same이라는 명령을 실행한다

            //$order를 통해 아이디와 닉네임이 동일한 게 하나 이상 있는지 확인하고 ?error= 구문을 출력
            if(mysqli_num_rows($order) > 0)
            {
                header("location: register_view.php?error=아이디 또는 닉네임이 이미 있어요");
                exit();
            }
            else
            {
                //값을 넣고 저장
                $sql_save = "INSERT into member(mb_id, mb_nick, password) values('$ID', '$NICK', '$PWD')";
                $result = mysqli_query($db, $sql_save);

                if($result) 
                {
                    //$result의 조건이 참이면 ?success= 구문을 출력한다
                    header("location: register_view.php?success=성공적으로 가입되었습니다");
                    exit();
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
        //모든 조건에 충족하지 않고 오류가 나면 ?error=구문을 출력한다
        header("location: view.php?error=알 수 없는 오류가 발생하였습니다");
        exit();
    }
?>