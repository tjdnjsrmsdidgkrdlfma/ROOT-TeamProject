<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP write</title>
</head>

<body>
    <h1>문의</h1>
    <h3>아래에 제목과 내용, 이메일을 입력해주세요</h3>
    <form method="POST" action="question_action.php">
        제목 : <input type="text" name="title" style="width:252px"/><br />
        내용 : <br /><textarea name="content" style="width:300px;height:200px"></textarea><br />
        이메일 : <input type="text" name="email" style="width:236px" /><br />
        <input type="submit" name="answer" /><br />
    </form>
</body>

</html>