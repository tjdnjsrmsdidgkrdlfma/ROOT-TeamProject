<?php
session_start();
include "lib.php";

$idx = $_POST['idx'];
$number = $_POST['number'];
$user_name = $_POST['user_name'];
$comment = $_POST['comment'];

mysqli_query($connect, $query);

//$query = "select * from comment where number='$number'";
$query = "update comment set comment = '$comment' where number='$number'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

mysqli_query($connect, $query); //왜인지는 모르겠지만 없으면 수정이 안 됨.
?>

<script>
    location.href='view.php?idx=<?=$idx?>';
</script>