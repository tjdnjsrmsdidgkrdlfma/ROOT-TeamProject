<?php
include "lib.php";

$idx = $_POST['idx'];
$comment = $_POST['comment'];

$query = "insert into comment(idx, comment)
values('$idx','$comment')";

mysqli_query($connect, $query);

?>

<script>
    location.href='view.php?idx=<?=$idx?>';
</script>