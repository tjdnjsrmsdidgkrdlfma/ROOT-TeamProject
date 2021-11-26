<?php

session_start(); //세션을 시작한다
include "lib.php"; // lib.php 파일을 포함시킨다

// 세션으로 불러온 mb_nick이 설정된 변수가 아닌지 확인한다
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<style>
    a {
        text-decoration: none;
    }
    #folder {
        height: 830px;
        background: #474747;
    }
    #Cont {
        margin-top: 60px;
    }
    th {
        font-size: 18px;
        color: #FFFFFF;
    }
    a,
    td {
        font-size: 16px;
        color: #9a9a9a;
    }
    
</style>
<body>
    <header></header>
    <div id="folder">
        <div class="container">
            <table id="Cont" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">순번</th>
                        <th class="col-md-2">닉네임</th>
                        <th>제목</th>
                        <th class="col-md-2">게시일자</th>
                        <th class="col-md-1">조회수</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // sing_board 테이블에서 조회한 모든 값들을 내림차순으로 정렬한다
                        $query = "select * from sing_board order by idx desc";
                        $result = mysqli_query($connect, $query);

                        // $data 변수와 $query로 조회한 값들의 관련된 값들을 비교해 반복문을 실행시킨다
                        while($data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?=$data['idx']?></td>
                        <td><?=$data['pub']?></td>

                        <?php
                            $asdf = $data['idx'];

                            //count로 pub가 $pub인 값을 모두 조회한 결과들의 개수를 센다
                            $sql = "SELECT COUNT(*) as count FROM `comment` WHERE `idx` = $asdf";
                            $jkl = mysqli_query($connect, $sql);

                            $idk = mysqli_fetch_assoc($jkl); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
                            ?>

                        <td>
                            <a href="view.php?idx=<?=$data['idx']?>"><?=$data['name']?>
                                [<?php echo $idk['count'];?>]</a>
                        </td>
                        <td><?=$data['regdate']?></td>
                        <td><?=$data['hit']?></td>
                    </tr>
                    <?php } 
                        // name이란 컬럼이 $data[name]일 때 컬럼 hit의 값을 1을 늘린 값으로 수정시켜준다
                        $update = "UPDATE `sing_board` SET `hit`= `hit` + 1 WHERE `name` = '$data[name]'";
                        $sql = mysqli_query($connect, $update);
                    ?>
                </tbody>
            </table>
            <button onclick="location.href='write.php'" class="btn">글쓰기</button>
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