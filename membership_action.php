<?php
$mysql_db = 'membership';
$conn = mysqli_connect("localhost", "root", "!Wocjf13", "ROOT_TeamProject");
//여기까지는 되는 것을 확인함

$title = $_POST['title'];
$content = $_POST['content'];
$password = $_POST['password'];
$date = date('Y-m-d H:i:s');

$insertQuery = "insert into membership(title,content,password,date) 
values ('$title','$content','$password','$date')";
$result = mysqli_query($conn, $insertQuery);
?>

<script>
alert("입력받은 데이터값을 성공적으로 저장했습니다!");
location.replace("./membership.php");
</script>
