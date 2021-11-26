<?php
session_start();
include "lib.php";

$_SESSION['count'] = $_SESSION['count'] - 1; //마이페이지의 작성 댓글 개수를 1개 줄인다.

$number = $_GET['number']; // $_GET으로 number를 받아온다
$idx = $_GET['idx']; // $_GET으로 idx를 받아온다
$user_name = $_GET['user_name']; // $_GET으로 user_name을 받아온다

// number라는 컬럼이 $number일 때의 pub 값을 조회한다
$query = "select pub from comment where number='$number'";
$result = mysqli_query($connect, $query);

// 조회 결과 나온 값과 관련된 값을 가져온다
$data = mysqli_fetch_array($result);

// 가져온 값 중 pub라는 값을 변수에 저장한다
$comment_name = $data['pub'];

//db에 있는 값을 가져와서 비교
if($comment_name != $user_name)
{
    echo "<script> alert('게시자만 지울 수 있습니다'); </script>";
    ?>
    <script>
    location.href='view.php?idx=<?=$idx?>';
    </script>
    <?php
}
else
{
    // 특수문자를 문자열로 탈춮시켜준다
    $idx = mysqli_real_escape_string($connect, $idx);

    // 컬럼 number가 $number인 값을 모두 조회한다
    $query = "select * from comment where number='$number'";
    $result = mysqli_query($connect, $query);

    // 조회 결과 나온 값과 관련된 값들을 가져온다
    $data = mysqli_fetch_array($result);

    // 컬럼 number가 $number인 값을 지워준다
    $query = "delete from comment where number='$number'";

    mysqli_query($connect, $query);
}
?>
<script>
    location.href='view.php?idx=<?=$idx?>';
</script>