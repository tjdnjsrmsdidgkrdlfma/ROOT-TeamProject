<?php
session_start();
include "lib.php";

$idx = $_GET['idx'];

$asdf = $_GET['asdf']; //comment.php에서 asdf를 전달한다.

$idx = mysqli_real_escape_string($connect, $idx);
$_SESSION['idx'] = $_GET['idx'];

if($asdf == 1) {
    //$asdf가 1이라는 것은 comment.php에서 온 것이고 따라서 글의 조회수를 올리지 않는다.
}
else {
    $query = "update sing_board set hit = hit + 1 where idx='$idx'"; //조회수를 올려주는 코드
    $result = mysqli_query($connect, $query);
}

$query = "select * from sing_board where idx='$idx'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="./css/CsS-H.F.css">
<style>
.folder {
    height: 890px;
    background: #474747;
}

.container {
    padding-top: 80px;
    padding-bottom: 160px;
}

#ti {
    font-size: 2em;
    font-weight: bold;
    color: #FFFFFF;
}

td {
    color: #FFFFFF;
}

button {
    padding: 50px 50px;
    color: #000;
}

#Com {
    color: #FFFFFF;
}

.f-div {
    text-align: center;
    height: inherit;
    padding: 60px 0;
}
</style>

<body>
    <header></header>
    <div class="folder">
        <div class="container">
            <form action="write.php?idx=<?= $idx ?>" method="post">
                <!--<form action="writepost.php" method="post">-->
                <table class="table table-bordered">
                    <tr>
                        <th id="ti">제목: <?= $data['name'] ?></th>
                        <!-- 게시글 제목 -->
                    </tr>
                    <tr>
                        <td><?= $data['memo'] ?></td>
                        <!-- 게시글 내용 -->
                    </tr>
                </table>
                <!-- <button class="btn"><a href="write.php?idx=<?= $idx ?>">수정</a></button> -->
                <button class="btn" type="submit">수정</button>
            </form>
            <button class="btn"><a href="confirm_delete.php?idx=<?= $idx ?>">삭제</a></button>
            <button class="btn"><a href="list.php">목록</a></button>
            <hr>

            <form action="comment.php" method="post">
                <input type="hidden" name="idx" value="<?= $idx ?>">
                <input type="hidden" name="pub" value="<?= $data['pub'] ?>">
                <div class="card">
                    <?php
        //count로 pub가 $pub인 값을 모두 조회한 결과들의 개수를 센다
        $sql = "SELECT COUNT(*) as count FROM `comment` WHERE `idx` = '$idx'";
        $result = mysqli_query($connect, $sql);

        $idk = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다
        ?>
                    <label id="Com" class="fa fa-comment"> 댓글 작성 (<?php echo $idk['count'];?>)</label>
                </div>
                <div class="card">
                    <textarea class="form-control" type="text" pattern=".{0,255}" required title="최대 255글자"
                        name="comment" rows="3"></textarea>
                    <button class="btn" type="submit">저장</button>
                </div>
            </form>

            <?php
                $sql = "SELECT * FROM `comment` WHERE `idx` = '$idx'";
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) > 0) {
            ?>
            <table id="Com" class="table table-bordered">
                <th class="col-md-3">닉네임</th>
                <th>댓글</th>
                <th class="col-md-1">수정</th>
                <th class="col-md-1">삭제</th>
                </tr>
                <?php } ?>
                <?php
                    $query = "select * from comment where idx='$idx'";
                    $result = mysqli_query($connect, $query);
                    while ($data = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?= $data['pub'] ?> </td>
                    <td> <?= $data['comment'] ?> </td>
                    <form action="update_comment.php" method="get">
                        <input type="hidden" name="idx" value="<?= $idx ?>">
                        <input type="hidden" name="number" value="<?= $data['number'] ?>">
                        <input type="hidden" name="user_name" value="<?= $_SESSION['mb_nick'] ?>">
                        <td><button class="btn" type="submit">수정</button></td>
                    </form>
                    <form action="delete_comment.php" method="get">
                        <input type="hidden" name="idx" value="<?= $idx ?>">
                        <input type="hidden" name="number" value="<?= $data['number'] ?>">
                        <input type="hidden" name="user_name" value="<?= $_SESSION['mb_nick'] ?>">
                        <td><button class="btn" type="submit">삭제</button></td>
                    </form>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <footer></footer>
</body>
<script src="./script/jquery-1.12.3.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('header').load('/header.html');
    $('footer').load('/footer.html');
});
</script>