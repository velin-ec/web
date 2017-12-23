<?php
require_once('connect.php');
//获取.php?id=0   =>int
$id = intval( $_GET['id']);
if($id==-1){
    $state  = "new";
}elseif($id>0){
    $state  = "edit";
}elseif($id==0){
    $state  = "list";
}
?>

<!--获取$categorys-->
<?php
$query=mysql_query('select * from category order by weight desc');
if($query && mysql_num_rows($query)){
while($row=mysql_fetch_assoc($query)){$categorys[]=$row;}
}else{$categorys=array();}
?>

<!doctype html>
<html lang="en">
<head>
    <title>后台管理页面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">
</head>
<body>

    <header>
        <div class="blog-masthead">
            <div class="container">
                <nav class="nav">
                    <a class="nav-link active" href="manage.php">首页</a>
                    <a class="nav-link" href="?id=-1">添加文章</a>
                </nav>
            </div>
        </div>
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title" style="font-weight:bold;font-family:'YaHei Consolas Hybrid'">文章发布系统</h1>
                <p class="lead blog-description">第一个php实践项目</p>
            </div>
        </div>

    </header>

    <main role="main" class="container">
        <!--列表生成-->
        <?php 
             if($state=='list') {
                  //加引号！！！ 注意取数据的顺序（按时间倒序）！！！
                  $query=mysql_query('select * from article order by datelime desc');
                  //验证是否$query返回true 以及数据条数是否为零！！！
             if($query && mysql_num_rows($query)){
                //通过循环获取多条数组！！！
                while($row=mysql_fetch_assoc($query)){$data[]=$row;}
                //创建一个空数组
             }else{$data=array();}
             if(!empty($data)){
        ?>

        <div class="blog-main">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">文章标题</th>
                        <th scope="col">分类</th>
                        <th scope="col">时间</th>
                        <th scope="col">作者</th>
                        <th scope="col">浏览量</th>
                        <th scope="col">点赞数</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody><?php foreach($data as $value){ //循环一维数组并保存在$value;?>
                    <tr>
                        <th scope="row" id="ajax_id"><?php echo $value['id']?></th> <!--注意引号位置！！！-->
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $categorys[$value['categoryID']-1]['name']?></td>
                        <td><?php echo $value['datelime']?></td>
                        <td><?php echo $value['author']?></td>
                        <td><?php echo $value['pageview']?></td>
                        <td><?php echo $value['like']?></td>
                        <td>
                            <a href="?id=<?php echo $value['id']?>">编辑</a> <!--用php获取id的值！！！！-->
                            <a href="delete.php?id=<?php echo $value['id']?>">删除</a>
                            <!--<button type="button" id="delbtn">删除</button>-->
                        </td>
                    </tr><?php }?>
                </tbody>
            </table>
        </div><?php }} ?>

        <!--新增--><?php if($state=='new') {?>
        <form method="post" action="add.php"><?php echo "<h1>新增</h1>"?>
            <div class="form-group">
                <input name="id" type="hidden" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label for="title">标题</label>
                <input name="title" type="text" class="form-control" placeholder="请输入标题" value="" />
            </div>
            <div class="form-group">
                <label for="author">作者</label>
                <input name="author" type="text" class="form-control" placeholder="请输入作者名" value="" />
            </div>
            <div class="form-group">
                <label for="abstract">摘要</label>
                <input name="abstract" type="text" class="form-control" placeholder="请输入摘要" value="" />
            </div>
            <div class="form-group">
                <label for="categoryID">分类</label>
                <select class="form-control" name="categoryID">
                <?php
                if(!empty($categorys)){
                foreach($categorys as $category) {
                echo "<option value ='$category[id]'>$category[name]</option>";
                } } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="content">正文</label>
                <textarea name="content" rows="10" class="form-control" placeholder="请输入正文"></textarea>
</div>
            <button type="submit" class="btn btn-primary">保存</button>
        </form><?php } ?>

        <!--修改--><?php if($state=="edit") {?>
        <form method="post" action="edit.php">
        <?php echo "<h1>修改</h1>"?>
        <?php
                  $query=mysql_query("select * from article where id=$id");
                  $editdata = mysql_fetch_assoc($query);
            ?>
            <div class="form-group">
                <input name="id" type="hidden" class="form-control" placeholder="请输入标题" value="<?php echo $id?>" />
            </div>
            <div class="form-group">
                <label for="title">标题</label>
                <input name="title" type="text" class="form-control" placeholder="请输入标题" value="<?php echo $editdata['title']?>" />
            </div>
            <div class="form-group">
                <label for="datelime">日期</label>
                <input name="datelime" type="text" class="form-control" value="<?php echo $editdata['datelime']?>" disabled />
            </div>
            <div class="form-group">
                <label for="author">作者</label>
                <input name="author" type="text" class="form-control" placeholder="请输入作者名" value="<?php echo $editdata['author']?>" />
            </div>
            <div class="form-group">
                <label for="abstract">摘要</label>
                <input name="abstract" type="text" class="form-control" placeholder="请输入摘要" value="<?php echo $editdata['abstract']?>" />
            </div>
            <div class="form-group">
                <label for="categoryID">分类</label>
                <select class="form-control" name="categoryID">
                    <?php
                    if(!empty($categorys)){
                        foreach($categorys as $category) {
                            echo "<option value ='$category[id]'>$category[name]</option>";
                        }
                    } ?>
                </select>            
            </div>
            <div class="form-group">
                <label for="content">正文</label>
                <textarea name="content" rows="10" class="form-control" placeholder="请输入正文"><?php echo $editdata['content']?></textarea> <!--textarea开头、结束标签之间不要留空格-->
            </div>
            <button type="submit" class="btn btn-primary">保存</button>
        </form><?php } ?>

        <!--ajax删除-->
        <script>
            //window.onload = function() {
            //    $("#delbtn").click(function () {
            //        $.post("delete.php",
            //        {

            //            id: $('#ajax_id').text() //< echo $value['id']?>
            //        },
            //        function (data, status) {
            //            var id = $('#ajax_id').text();
            //            alert("id=" + id + "的文章已删除成功");
            //            window.location.reload();
            //        });
            //    })
            //};
        </script>


    </main>

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
    <script src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


</body>
</html>