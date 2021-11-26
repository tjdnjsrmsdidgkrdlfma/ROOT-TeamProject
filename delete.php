<?php

session_start(); //세션을 시작한다
include "lib.php"; // lib.php 파일을 포함시킨다

$idx = $_POST['idx']; // $_POST로 idx를 가져온다
$password = $_POST['password']; // $_POST로 password를 가져온다

// 변수를 특수문자에서 문자열로 탈출시켜준다
$idx = mysqli_real_escape_string($connect, $idx);
$password = mysqli_real_escape_string($connect, $password);

// 컬럼 idx가 $idx이고 password가 $password인 값들을 모두 조회한다
$query = "select * from sing_board where idx='$idx' and password='$password' ";
$result = mysqli_query($connect, $query);

// 조회 후 나온 값들과 관련된 값들을 가져온다
$data = mysqli_fetch_array($result);

// 가져온 관련된 값들 중 idx 부분을 가져와 그것과 $_GET['idx']를 비교해 아닌지 확인한다
if(!$data['idx'])
{
    echo "
    <script>
    alert('비밀번호가 다릅니다.');
    history.back(1);
    </script>
    ";
    exit;
}

// 컬럼 idx가 $idx인 값들을 지워준다
$query = "delete from sing_board where idx='$idx'";
mysqli_query($connect, $query);

//마이페이지의 작성 글 개수를 1개 줄인다.
$_SESSION['cnt'] = $_SESSION['cnt'] - 1;

// 컬럼 idx가 $idx인 값들을 모두 조회한다
$query = "select * from comment where idx='$idx'";
$result = mysqli_query($connect, $query);

// 조회 후 나온 값들과 관련된 값들을 가져온다
$data = mysqli_fetch_array($result);

// idx가 $idx인 값을 지워준다
$query = "delete from comment where idx='$idx'";

mysqli_query($connect, $query);

?>
<script>
    location.href='list.php';
</script>