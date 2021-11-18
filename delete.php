<?php
session_start();
include "lib.php";

$idx = $_GET['idx'];

$idx = mysqli_real_escape_string($connect, $idx);

$pub = $_SESSION['mb_nick'];

$sql = "SELECT * FROM `sing_board` WHERE `publisher` = '$pub'";
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) === 1)
{
    $query = "DELETE FROM `sing_board` WHERE `idx` = '$idx'";
    mysqli_query($connect, $query);

    echo "<script>
            location.href='list.php';
        </script>";
}
else
{
    echo "<script> alert('작성자만이 글을 삭제할 수 있습니다'); history.back(); </script>";
}
?>
