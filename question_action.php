<?php
$mysql_db = 'question';
$conn = mysqli_connect("localhost", "root", "!Wocjf13", "ROOT_TeamProject");
//여기까지는 되는 것을 확인함
$query = "select * from question";
$result = mysqli_query($conn, $query);

$title = $_POST['title'];
$content = $_POST['content'];
$email = $_POST['email'];
$date = date('Y-m-d H:i:s');

$insertQuery = "insert into question(title,content,email,date) 
values ('$title','$content','$email', '$date')";
$result = mysqli_query($conn, $insertQuery);
?>

<script>
alert("입력받은 데이터값을 성공적으로 저장했습니다!");
location.replace("./question.php");
</script>
