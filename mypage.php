<?php
session_start();
include "library.php";
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}

$pub = $_SESSION['mb_nick'];

//count로 pub가 $pub인 값을 모두 조회한 결과들의 개수를 센다
$sql = "SELECT COUNT(*) as count FROM `comment` WHERE `pub` = '$pub'";
$result = mysqli_query($connect, $sql);

//조회 후 결과들의 개수가 0 이상인지 확인한다
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다

    $_SESSION['count'] = $row['count']; // 관련된 값들 중에서 count인 값을 $_SESSION으로 저장시킨다
}
?>
<style>
    .folder{
        height:890px;
        background:#474747;
    }
    #my{
        color:#D4EF63;
        font-weight:bold;
    }
    #line{
        width: 1200px;
        height: 3px;
        border: 0;
        background: #BBBBBB;
        border:0;
    }
    #tlqkf{
        color:#FFFFFF;
        margin:0 0 50px 0;
    }
    form{
           padding-top:10em ;
    }
    #a{
        color:#FFFFFF;
        margin:0 20px 0 0;
    }
    #a:hover{
        color:#D4EF63;
        text-decoration:none;
    }
    .f-div {
                text-align: center;
                height: inherit;
                padding: 60px 0;
            }
</style>
<html>
<head>
    <title>마이페이지</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>

<body>
<header></header>
    <div class="folder">
    <div class="container">
        <h1 id="my">마이페이지</h1>
        <hr id="line">
        <h3 id="tlqkf">회원정보</h3>
        <ul class="list-group">
            <li class="list-group-item"><h4>닉네임 : <?php echo $_SESSION['mb_nick']; ?></h4></li>
        <?php
        //echo $qustn;
        if($_SESSION['cnt'] === NULL)
        {
            ?>
            <li class="list-group-item"><h4>작성 글 개수 : 0 </h4></li>
            <?php
        }
        else
        {
            ?>
            <li class="list-group-item"><h4>작성 글 개수 : <?php echo $_SESSION['cnt']; ?></h4></li>
            <?php
        }
        if($_SESSION['count'] === NULL)
        {
            ?>
            <li class="list-group-item"><h4>댓글 개수 : 0 </h4></li>
            <?php
        }
        else
        {
            ?>
            <li class="list-group-item"><h4>작성 댓글 개수 : <?php echo $_SESSION['count']; ?></h4></li>
            <?php
        }
        ?>
        </ul>
        <a href="logOut.php" id="a">로그아웃</a>
        <a href="delete_member_view.php" id="a">회원 탈퇴</a>
    </div>
    </div>
    <footer></footer>
    </div>
</body>
<script src="./script/jquery-1.12.3.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('header').load('/header.html');
       $('footer').load('/footer.html');
   });
</script>
</html>