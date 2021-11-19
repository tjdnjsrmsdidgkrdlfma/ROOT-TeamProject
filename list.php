<?php
session_start();
include "lib.php";
?>

    <tr>
        <th> No </th>
        <th> 닉네임</th>
        <th> 제목 </th>
        <th> 작성일자 </th>
    </tr>

    <?php
    $query = "select * from sing_board order by idx desc";
    $result = mysqli_query($connect, $query);

    while($data = mysqli_fetch_array($result))
    {
        ?>
        <br>
        <td> <?=$data['idx']?> </td>
        <td> <?=$data['pub']?></td>
        <td> <a href="view.php?idx=<?=$data['idx']?>"><?=$data['name']?></a></td>
        <td> <?=$data['regdate']?> </td>
        <?php
    }
    ?>
    <br>

<a href="write.php">글쓰기</a>
<br>
<br>
<a href="mypage.php">마이페이지로 돌아아기</a>