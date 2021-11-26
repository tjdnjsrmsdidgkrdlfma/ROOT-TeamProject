<?php
$mysql_db = 'membership';

//DB에 연결한다
$conn = mysqli_connect("localhost", "root", "!Wocjf13", "ROOT_TeamProject");

// $_POST로 입력값을 받아온다
$name = $_POST['name'];
$num = $_POST['num'];
$title = $_POST['title'];
$content = $_POST['content'];
$tel = $_POST['tel'];
$date = date('Y-m-d H:i:s');

// 각 변수가 비어있는지 확인한다
if(empty($name))
{
    echo "<script> alert('이름 칸이 비어있습니다'); history.back(); </script>";
}
else if(empty($num))
{
    echo "<script> alert('학번 칸이 비어있습니다'); history.back(); </script>";
}
else if(empty($tel))
{
    echo "<script> alert('전화번호 칸이 비어있습니다'); history.back(); </script>";
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
    // 컬럼 name, id, title, content, tel, date에다가 각각 변수를 넣어준다
    $insertQuery = "insert into membership(name,id,title,content,tel,date) values ('$name','$num','$title','$content','$tel','$date')";

    $result = mysqli_query($conn, $insertQuery);
    
    ?>
    <script>
    alert('입력받은 데이터값을 성공적으로 저장했습니다!');
    location.replace('./membership.php');
    </script>
<?php
}



?>

