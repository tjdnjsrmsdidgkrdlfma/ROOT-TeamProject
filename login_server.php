<?php
    //db.php에 있는 기능을 포함시킴
    include "db.php";

    //isset() 함수로 각 변수가 설정돼있는지 확인한다
    if(isset($_POST['loginID']) && isset($_POST['loginPassword']))
    {   
        //특수문자를 문자열로 변경해준다
        $LoginID = mysqli_real_escape_string($db, $_POST['loginID']);
        $LoginPWD = mysqli_real_escape_string($db, $_POST['loginPassword']);

        //각 입력값이 비어있는지 확인한다
        if(empty($LoginID))
        {
            header("location: login_view.php?error=아이디가 비어있어요");
            exit();
        }
        else if(empty($LoginPWD))
        {
            header("location: login_view.php?error=비밀번호가 비어있어요");
            exit();
            
        }
        else
        {
            $sql = "select * from member where mb_id = '$LoginID'"; //모든 값을 member에서 조회하되, $LoginID과 동일한 아이디를 조회한다
            $result = mysqli_query($db, $sql); //$db에 $sql이라는 명령을 실행시킨다

            //$result를 통해 동일한 아이디가 있는지 확인한다
            if(mysqli_num_rows($result) === 1)
            {
                $row = mysqli_fetch_assoc($result); //$result와 관계된 것을 가져온다
                echo '번호  :   '.$row['no'].'<br>'.' 닉네임   :   '.$row['mb_nick'].'<br>'.' 아이디   :   '.$row['mb_id'].'<br>'.' 비밀번호   :   '.$row['password'];
            }
        }
    }
?>