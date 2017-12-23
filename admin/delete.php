
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--添加才不乱码-->
</head>
<?php
require_once('connect.php');
$id = $_GET['id']; //[]而不是()!!!
$deletesql = "delete from article where id = $id"; //没有*号

if(mysql_query($deletesql)){  //mysql_query()而不是query();
    echo "<script>alert('删除文章成功');window.location.href='manage.php'</script>";
}else{
    echo "<script>alert('删除文章失败')</script>";
    echo mysql_error();
}

//mysql_query($deletesql);ajax用
?>

