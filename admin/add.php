
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--添加才不乱码-->
</head>

<?php
require_once('connect.php');

$title = $_POST['title'];
if(!(isset($_POST['title'])&&(!empty($title)))){
    echo "<script>alert('标题不能为空');window.location.href='manage.php'</script>";
    exit;
}
$author = $_POST['author'];
$abstract = $_POST['abstract'];
$categoryID = $_POST['categoryID'];
$content = $_POST['content'];
$insertsql = "insert into article (title,author,abstract,categoryID,content) values('$title','$author','$abstract','$categoryID','$content')";


if(mysql_query($insertsql)){
    echo "<script>alert('添加文章成功');window.location.href='manage.php'</script>;";
}else{
    echo "<script>alert('添加文章失败')</script>";
    echo mysql_error();
}

?>

