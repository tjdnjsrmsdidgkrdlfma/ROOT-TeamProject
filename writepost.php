<?php
session_start();
include "lib.php";
include "db.php";

$idx = $_POST['idx'];
$pub = $_POST['publisher'];
$name = $_POST['name'];
$memo = $_POST['memo'];
$password = $_POST['password'];

$idx = mysqli_real_escape_string($connect, $idx);
$name = mysqli_real_escape_string($connect, $name);
$PUB = mysqli_real_escape_string($connect, $pub);
$memo = mysqli_real_escape_string($connect, $memo);
$password = mysqli_real_escape_string($connect, $password);

if($idx)
{
    $query = "select * from sing_board where idx='$idx' and password='$password'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

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

    $query = "update sing_board set name='$name', memo='$memo' where idx='$idx'";

    mysqli_query($connect, $query);
}
else
{
    date_default_timezone_set('Asia/Seoul');
    $regdate = date("Y-m-d H:i:s");

    $query = "insert into sing_board(pub, name, memo ,regdate, password)
    values('$PUB','$name','$memo','$regdate','$password')";

    mysqli_query($connect, $query);

    $sql = "SELECT COUNT(pub) as cnt FROM `sing_board` WHERE `pub` = '$PUB'";
    $mysql = mysqli_query($connect, $sql);

    if(mysqli_num_rows($mysql) > 0)
    {
        $row = mysqli_fetch_assoc($mysql);

        $_SESSION['cnt'] = $row['cnt'];
    }
}
?>
<script>
    location.href='list.php';
</script>