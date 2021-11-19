<?php
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
    <a href="confirm_delete.php?idx=<?=$idx?>">삭제</a>
    <a href="list.php">목록</a>
</form>

<form action="comment.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <p>
    <tr>
        <th> 댓글 작성</th>
        <td> <input type="text" name="comment"> </td>
    </tr>
    </p>
    <input type="submit" value="저장">
</form>

<tr>
    <th> 댓글 </th>
</tr>

<?php
    $query = "select * from comment where idx='$idx'";
    $result = mysqli_query($connect, $query);

    while($data = mysqli_fetch_array($result))
    {
        ?>
        <br>
        <td> <?=$data['comment']?> </td>
        <?php
    }
?>