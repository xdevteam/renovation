<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">        
        <title>ELEYUS Admin</title>

        <!-- Wysiwyg -->           
        <script src="//cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
        
        <link href="<?= base_url(); ?>../../../../css/admin_style.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url(); ?>../../../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url(); ?>../../../../css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url(); ?>../../../../css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url(); ?>../../../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?= base_url(); ?>../../../../css/back_end.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>admin/index">
                    <img src="../../../images/logo-orig.png" width ="110" alt="logo">
                </a>
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <? echo base_url();?>
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?= $admin['name'] ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Профиль</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Входящие</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Настройки</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"> 
                                <form action="<?= base_url('admin') ?>/exit_user" method="POST">
                                    <i class="fa fa-fw fa-power-off"></i><input  type="submit" id="exit" name="logout" value=" Выйти" class="top-bar-icon-text subm" >
                                </form>     
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>        
        </nav>

        <!-- Sidebar -->
        <ul class="nav navbar-nav side-nav" id="sideBar">
            <li>
                <a href="<?= base_url(); ?>admin/index" data-ajax="index">
                    <i class="fa fa-fw fa-dashboard"></i> 
                    Главная
                </a>
            </li>            
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-fw fa-arrows-v"></i> Сайт <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="<?= base_url(); ?>admin/menu" class="dropped"><i class="fa fa-fw fa-bars"></i> Меню</a>
                    </li>
                    <li>
                        <a href="pages" class="dropped"><i class="fa fa-fw fa-file-o"></i> Страницы</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/slider" class="dropped"><i class="fa fa-fw fa-sliders"></i> Слайдер</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/partners" class="dropped"><i class="fa fa-fw fa-suitcase"></i> Партнеры</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/blog_article" class="dropped"><i class="fa fa-fw fa-newspaper-o"></i> Блог</a>
                    </li>
                     <li>
                        <a href="<?= base_url(); ?>admin/news_article" class="dropped"><i class="fa fa-fw fa-newspaper-o"></i> Новости</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/about_us" class="dropped"><i class="fa fa-fw fa-info-circle"></i> О нас</a>
                    </li>
                </ul>
            </li>  
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#item"><i class="fa fa-fw fa-arrows-v"></i> Витрина <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="item" class="collapse">
                    <li>
                        <a href="<?= base_url(); ?>admin/focus_product" data-ajax="focus_product" class="dropped"><i class="fa fa fw fa-sitemap"></i> Группа товаров</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/category" data-ajax="category" class="dropped"><i class="fa fa-fw fa-cubes"></i> Категории товаров</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/subcategories" data-ajax="subcategories" class="dropped"><i class="fa fa-fw fa-cube"></i> Подкатегории товаров</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/products" data-ajax="products" class="dropped"><i class="fa fa-fw fa-shopping-cart"></i> Товары</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="<?= base_url(); ?>admin/users" data-ajax="blank-page" class="ajax"><i class="fa fa-fw fa-users"></i> Пользователи</a>
            </li>  
            <li>
                <a href="<?= base_url(); ?>admin/settings" data-ajax="blank-page" class="ajax"><i class="fa fa-fw fa-wrench"></i> Настройки</a>
            </li>  
            <li>
                <a href="<?= base_url(); ?>admin/fake_comments" data-ajax="blank-page" class="ajax"><i class="fa fa-fw fa-comment"></i>Коментарии на главной</a>
            </li>   
        </ul>
        <!-- Sidebar End -->




