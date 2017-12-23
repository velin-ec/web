
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--添加才不乱码-->
</head>
<?php
    require_once('connect.php');
    if(empty($_POST['title'])){
        echo "<script>alert('标题不能为空');window.location.href='manage.php'</script>";
        exit;
    }
//要先存进变量才能放进sql语句，否则报错！！！；
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $abstract = $_POST['abstract'];
    $categoryID = $_POST['categoryID'];
    $content = $_POST['content'];
    //关键词之间要打逗号，char型加''号，时间函数now()！！！
    $selectsql = "update article set datelime=now(), title='$title', author='$author', abstract='$abstract', categoryID='$categoryID',content='$content' where id=$id";
    if(mysql_query($selectsql)){
        echo "<script>alert('保存成功');window.location.href='manage.php'</script>";
    }else{
        echo "<script>alert('保存失败')</script>";
        echo $selectsql;
        echo mysql_error();
    }
?>
