<?php
session_start();
include "lib.php";

$number = $_GET['number'];
$idx = $_GET['idx'];
$user_name = $_GET['user_name'];

$query = "select pub from comment where number='$number'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

$comment_name = $data['pub'];

if($comment_name != $user_name) //db에 있는 값을 가져와서 비교
{
    echo "<script> alert('게시자만 수정할 수 있습니다'); </script>";
    ?>
    <script>
    location.href='view.php?idx=<?=$idx?>';
    </script>
    <?php
}

$query = "select * from comment where number='$number'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result); //수정할 때 입력하는 칸에 수정할 내용이 표시되게 하기 위한 코드
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"></head>
<style>
    .folder{
        height:890px;
        background: #474747;
    }
    h2{
        color:#D4EF63;
    }
    hr{
        width: 1200px;
        height: 3px;
        border: 0;
        background: #BBBBBB;
    }
    h4{
        color:#FFFFFF;
    }
    .container{
         padding-top:90px;
         padding-bottom:100px;
    }
    label{
      font-size:1.2em;
      color:#FFFFFF;
    }
    .f-div {
      text-align: center;
      height: inherit;
      padding: 60px 0;
            }
</style>
<body>
<header></header>
<div class="folder">
    <div class="container">
        <h2>댓글 수정</h2>
        <hr>
        <h4>내용을 수정하고 저장버튼을 눌러 반영하세요!</h4> 
        <form action="update_comment!.php" method="post">
            <input type="hidden" name="idx" value="<?= $idx ?>">
            <input type="hidden" name="number" value="<?= $number ?>">
            <input type="hidden" name="user_name" value="<?= $user_name ?>">

            <div class="form-group">
                <label>내용 :</label>
                <input class="form-control" type="text" name="comment" value="<?=$data['comment']?>">
            </div>
            <button class="btn">저장</button>
    </form>
    </div>
    </div>
</div>
<footer></footer>
</body>
<script src="./script/jquery-1.12.3.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('header').load('/header.html');
       $('footer').load('/footer.html');
   });
</script>