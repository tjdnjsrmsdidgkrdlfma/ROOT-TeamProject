<?php
    // DB에 연결한다
    $db = mysqli_connect('localhost', 'root', '!Wocjf13', 'ROOT_TeamProject');

    // DB에 연결을 실패하는지 확인한다
    if(!$db)
    {
        echo 'DB 접속 실패';
    }


?>