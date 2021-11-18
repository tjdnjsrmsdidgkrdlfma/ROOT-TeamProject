<?php
session_start();
include "lib.php";

$idx = $_GET['idx'];
$idx = mysqli_real_escape_string($connect, $idx);

$query = "select * from sing_board where idx='$idx'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
?>

<form action="writepost.php" method="post">
    <p>
    <tr>
        <th> 제목 </th>
        <td> <?=$data['name']?> </td>
    </tr>
    </p>
    <p>
    <tr>
        <th> 내용 </th>
        <td> <?=nl2br($data['memo'])?> </td>
    </tr>
    </p>
    <a href="write.php?idx=<?=$idx?>">수정</a>
    <a href="delete.php?idx=<?=$idx?>" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</a>
    <a href="list.php">목록</a>
</form>