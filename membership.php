<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP write</title>
</head>

<body>
    <h1>입부신청</h1>
    <h3>ROOT를 선택하려는 당신을 환영합니다, 아래 정보를 채워 제출해주세요!</h3>
    <form method="POST" action="membership_action.php">
        제목 : <input type="text" name="title" style="width:252px"/><br />
        내용 : <br /><textarea name="content" style="width:300px;height:200px"></textarea><br />
        비밀번호 : <input type="password" name="password" size="10" maxlength="10" /><br />
        <input type="submit" name="answer" /><br />
    </form>
</body>

</html>