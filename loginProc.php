<?php
    $user_id = $_POST['user_id'];
    $pwd = $_POST['pwd'];

    if($user_id == "root" && $pwd == "root"){
        setcookie("isAdmin", "OK");
    }
    else{
        echo "관리자만 접근 가능합니다";
        exit;
    }
?>
<script>
    location.href="list.php";
</script>