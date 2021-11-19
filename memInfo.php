<?php
    session_start();
?>
<html>
    <head>
        <title>회원정보</title>
    </head>
    <body>
    
        <h2>회원정보</h2>
        
        <h3>닉네임 : <?php echo $_SESSION['mb_nick']; ?></h3>
        <h4>작성 글 : <?php echo $_SESSION['cnt']; ?> </h4>
    
    </body>
</html>