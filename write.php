<?php
session_start();
include "lib.php";

$idx = $_GET['idx'];
$idx = mysqli_real_escape_string($connect, $idx);

$query = "select * from sing_board where idx='$idx'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
$data['pub'] = $_SESSION['mb_nick'];
?>

<form action="writepost.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <input type="hidden" name="publisher" value="<?=$data['pub']?>" readonly>
    <p>
    <tr>
        <th> 이름 </th>
        <td> <input type="text" name="name" value="<?=$data['name']?>"> </td>
    </tr>
    </p>
    <p>
    <tr>
        <th> 내용 </th>
        <td> <textarea name="memo"><?=$data['memo']?></textarea> </td>
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