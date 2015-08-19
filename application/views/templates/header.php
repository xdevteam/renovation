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

                <header class="custom_header col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="topblock col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="topbl1 col-lg-8 col-md-8 col-sm-8 col-xs-9 pull-left">
                            
                            <div class="genname col-lg-12 col-md-12 col-sm-10 col-xs-10 pull-right">МАГАЗИН СТРОИТЕЛЬНЫХ МАТЕРИАЛОВ</div>
                            <span class="tel1 col-lg-6 col-md-6 col-sm-6 col-xs-12">8 (47396) 5-33-44</span>
                            <span class="tel2 col-lg-6 col-md-6 col-sm-6 col-xs-12">8 (47396) 5-33-44</span>
                        </div>
                        <div class="topbl2 col-lg-4 col-md-4 col-sm-4 col-xs-3"></div>
                        
                    </div>
                     
             </header>
             
            <!-- Header End -->
            <!-- Navbar  -->
                     <nav class="navbar" role="navigation">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav main-nav ">
                                <?
                                $i=1;
                                foreach ($menu as $item){
                                if($i==1){
                                $border="";
                                }else{
                                $border="style='border-left: 1px solid grey;'";
                                }
                                $i++;                                 
                                ?>
                                <li class="drop">
                                    <a <?= $border ?> href="<?= base_url() ?><?= $item['link'] ?>"><?= $item['name'] ?></a> 
                                </li>                                
                                <? } ?>
                         
                            </ul>
                        </div>
                        <!-- .navbar-collapse -->
                     </div>
                     <!-- .container -->
                    </nav>
                <!-- Navbar End -->
