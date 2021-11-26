<?php
session_start(); // session을 시작한다
include "lib.php"; // lib.php 파일을 포함시킨다

$_SESSION['count'] = $_SESSION['count'] + 1;

$idx = $_POST['idx']; // $_POST로 idx를 받아온 후 $idx에 저장한다
$comment = $_POST['comment']; // $_POST로 comment를 받아온 후 $comment에 저장한다
$pub = $_SESSION['mb_nick']; // $_SESSION으로 mb_nick을 받아온 후 $pub에 저장한다

//각 컬럼에 $idx, $pub, $comment을 넣어준다
$query = "insert into comment(idx, pub, comment)
values('$idx', '$pub', '$comment')";

mysqli_query($connect, $query);

//count로 pub가 $pub인 값을 모두 조회한 결과들의 개수를 센다
$sql = "SELECT COUNT(*) as count FROM `comment` WHERE `pub` = '$pub'";
$result = mysqli_query($connect, $sql);

//조회 후 결과들의 개수가 0 이상인지 확인한다
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result); // 조회 결과 후 나온 값들과 관련된 것들을 가져온다

    $_SESSION['count'] = $row['count']; // 관련된 값들 중에서 count인 값을 $_SESSION으로 저장시킨다
}
$asdf = 1;
?>

<!-- 댓글을 달던 페이지로 돌아간다 -->
<script>
    location.href='view.php?idx=<?=$idx?>&asdf=<?=$asdf?>';
</script>