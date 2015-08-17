<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <meta name="description" content="Центральный украинский ресурс по купле / продаже неликвидов">
        <meta name="keywords" content="Неликвиды, купля, продажа">
        <meta name="author" content="SITE&SEO">        
        <link href="<?= base_url(); ?>../../../css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/load_animation.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/jquery_scrollbar.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="<?= base_url(); ?>../../../css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url(); ?>../../../css/jquery.fancybox.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?= base_url(); ?>../../../css/style.css">
        <link rel="stylesheet" href="<?= base_url(); ?>../../../css/responsive.css">
        <link rel="stylesheet" href="<?= base_url(); ?>../../../css/settings.css">
        <link rel="stylesheet" type="text/css" href="../../../css/jquery.bxslider.css" media="screen">

        <!--[if IE]>
                <style>
                        .tabs-buttons li:hover:not(.activeTab) a {
                                color: rgb(5, 75, 171);
                                background: transparent;
                        }
                </style>
        <![endif]-->

       <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    </head>   
    <body>        
        <section id="page">              

                <header class="custom_header">
                    <div class="topblock">
                        
                        <div class="topbl1">
                            
                            <div class="genname">МАГАЗИН СТРОИТЕЛЬНЫХ МАТЕРИАЛОВ</div>
                            <span class="tel1">8 (47396) 5-33-44</span>
                            <span class="tel2">8 (47396) 5-33-44</span>
                        </div>
                        <div class="topbl2"></div>
                        
                    </div>
                     <!-- Navbar  -->
                     <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav main-nav ">
                                <?
                                $i=1;
                                foreach ($menu as $item){
                                if($i==1){
                                $active='class="active"';
                                }else{
                                $active='';
                                }
                                $i++;                                 
                                ?>
                                <li class="drop">
                                    <a <?= $active ?>  href="<?= base_url() ?><?= $item['link'] ?>"><?= $item['name'] ?></a>
                                    <!--
                                    <ul class="dropdown">
                                            <li><a href="<?= base_url() ?>">Home Default</a></li>
                                    </ul>
                                    -->
                                </li>
                                <? } ?>
                         
                            </ul>
                        </div><!-- /.navbar-collapse -->
                     </div><!-- /.container -->
                    </nav>
                <!-- Navbar End -->
             </header>
             
            <!-- Header End -->
