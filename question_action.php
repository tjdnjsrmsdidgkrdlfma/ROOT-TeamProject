<?php

$mysql_db = 'question'; // 'question'이라는 문자열을 가진 변수를 저장한다
$conn = mysqli_connect("localhost", "root", "!Wocjf13", "ROOT_TeamProject"); //DB에 연결한다

$query = "select * from question"; // question이라는 DB에서 모든 값을 조회한다
$result = mysqli_query($conn, $query);

$title = $_POST['title']; // $_POST로 title을 가져온다
$content = $_POST['content']; // $_POST로 content을 가져온다
$email = $_POST['email']; // $_POST로 email을 가져온다
date_default_timezone_set('Asia/Seoul'); // 날짜의 시간을 한국/서울의 시간을 기준으로 해준다
$date = date('Y-m-d H:i:s'); // 날짜를 보여주는 변수를 저장한다

if(empty($email))
{
    echo "<script> alert('이메일 칸이 비어있습니다'); history.back(); </script>";
}
else if(empty($title))
{
    echo "<script> alert('제목 칸이 비어있습니다'); history.back(); </script>";
}
else if(empty($content))
{
    echo "<script> alert('내용 칸이 비어있습니다'); history.back(); </script>";
}
else
{
    // 각 컬럼에 $title, $conent, $email, $date를 넣어준다
    $insertQuery = "insert into question(title,content,email,date) 
    values ('$title','$content','$email', '$date')";
    $result = mysqli_query($conn, $insertQuery);
    
    ?>

<script>
alert("입력받은 데이터값을 성공적으로 저장했습니다!");
location.replace("./question.php"); // question.php로 이동한다
</script>

<?php   }   ?>