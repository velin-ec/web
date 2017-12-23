<?php
    require_once('admin/connect.php');
    $query = mysql_query('select * from article order by datelime desc');
    if($query && mysql_num_rows($query)){
        while($row=mysql_fetch_assoc($query)){$data[] = $row;}
    }else{
        echo "<script>alert('目前文章数为0')</script>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>文章发布系统前台页面</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!--引入奥森图标-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--样式-->
    <style>
        .navbar-dark .nav-item:hover {
            background-color: black;
        }

        .navbar-dark .nav-item a:hover {
            color: white;
        }

        .navbar-dark .nav-item a {
            color: #868e96;
        }
    </style>

</head>
<body>
    <!--顶部导航-->
    <nav class="navbar navbar-dark bg-dark py-0">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 py-0" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 py-0" type="submit">Search</button>
        </form>
    </nav>

    <!--container-->
    <div class="container  mt-4">
        <!--二级导航-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">果核网</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Link<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            更多信息
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">关于我们</a>
                            <a class="dropdown-item" href="#">联系我们</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">作者信息</a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>
        <!--轮播图-->
        <div id="carouselExampleIndicators" class="carousel slide  mt-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-secondary"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-secondary"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-secondary"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="content/images/11.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="content/images/22.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="content/images/33.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--文章瀑布-->

        <div class="article-list mt-4">
            <div class="row">
                <!--注意foreach语法-->
                <?php foreach($data as $value){ ?>
                <div class="col-sm-4 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="content/images/a1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $value['title']?></h4>
                            <p class="card-text"><?php echo $value['abstract']?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $value['author']?></li>
                            <li class="list-group-item"><?php echo $value['datelime']?></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>








    <!-- Optional JavaScript -->
    <!--integrity、crossorigin要删掉-->
    <script src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>