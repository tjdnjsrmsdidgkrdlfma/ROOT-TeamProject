<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<style>
    #folder {
        height: 830px;
        background: #474747;
    }
    h2 {
        color: #fff;
    }
    .container {
        margin-top: 270px;
    }
</style>
</head>
<body>
    <div id="folder">
<?php
    session_start(); //sessio을 시작한다
    include "db.php"; // db.php 파일을 포함시킨다

    // $_POST로 얻어온 변수가 설정돼있는지 확인한다
    if(isset($_POST['chkNick']) && isset($_POST['chkPwd']))
    {
        // 각 변수를 특수문자에서 문자열로 탈출시킨다
        $CHKNICK = mysqli_real_escape_string($db, $_POST['chkNick']);
        $CHKPWD = mysqli_real_escape_string($db, $_POST['chkPwd']);
        
        // 입력한 변수가 비어있는지 확인한다
        if(empty($CHKNICK))
        {
            echo "<script> alert('닉네임이 비어있습니다'); history.back(); </script>";
        }
        else if(empty($CHKPWD))
        {
            echo "<script> alert('비밀번호가 비어있습니다'); history.back(); </script>";
        }
        else
        {
            // mb_nick이 $CHKNICK인 값을 모두 조회한다
            $sql = "SELECT * FROM `member` WHERE `mb_nick` = '$CHKNICK'";
            $result = mysqli_query($db, $sql);

            // 조회한 결과 나온 값이 한 개인지 확인한다
            if(mysqli_num_rows($result) === 1)
            {
                
                $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
                $hash = $row['password']; //그 값들 중 password 부분만 가져온다

                //비밀번호 $CHKPWD와 $hash를 서로 같은지 확인한다
                if(password_verify($CHKPWD, $hash)) { ?>
                <header></header>
                <div class="container">
                <?php
                    echo "<h2>귀하가 찾고자 하는 아이디는 ".$row['mb_id']."입니다</h2>";

                    echo "<br>";
                }
                else
                {
                    echo "<script> alert('비밀번호가 틀렸습니다'); history.back(); </script>";   
                }
                
            }
            else
            {
                echo "<script> alert('회원가입된 닉네임이 없습니다'); history.back(); </script>";
            }
    
        }
    }
    else
    {
        echo "<script> alert('알 수 없는 오류가 발생하였습니다'); history.back(); </script>";
        
    }
    ?> <button onclick="location.href='login_view.php'" class="btn">로그인 페이지로 돌아이기</button>
</div>
</div>
    <footer></footer>
</body>
<script src="./script/jquery-1.12.3.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('header').load('/header.html');
       $('footer').load('/footer.html');
   });
</script>