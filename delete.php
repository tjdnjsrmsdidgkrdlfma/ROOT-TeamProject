<?php
include "lib.php";

$idx = $_POST['idx'];
$password = $_POST['password'];

$idx = mysqli_real_escape_string($connect, $idx);
$password = mysqli_real_escape_string($connect, $password);

$query = "select * from sing_board where idx='$idx' and password='$password' ";
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

$query = "delete from sing_board where idx='$idx' ";

mysqli_query($connect, $query);

?>
<script>
    location.href='list.php';
</script>