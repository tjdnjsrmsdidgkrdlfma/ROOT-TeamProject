<?php
include "lib.php";

$idx = $_GET['idx'];
$idx = mysqli_real_escape_string($connect, $idx);

?>

<form action="delete.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <p>
    <tr>
        <th>게시물을 정말 삭제하시겠습니까? </th>
    </tr>
    </p>
    <p>
    <tr>
        <th> 비밀번호 </th>
        <td> <input type="password" name="password" placeholder="비밀번호"> </td>
    </tr>
    </p>
    <input type="submit" value="저장">
</form>