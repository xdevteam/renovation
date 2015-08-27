<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <meta name="description" content="Renovation Shop">
        <meta name="keywords" content="Shop">
        <meta name="author" content="X-TeaM">        
        <link href="<?= base_url(); ?>../../../css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/load_animation.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/jquery_scrollbar.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>../../../css/newtyle.css" rel="stylesheet" type="text/css"/>
        
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
                        
                        <div class="topbl1 col-lg-8 col-md-8 col-sm-8 col-xs-7 pull-left">                                                        
                            <span class="genname col-lg-12 col-md-12 col-sm-10 col-xs-10 pull-right">МАГАЗИН СТРОИТЕЛЬНЫХ МАТЕРИАЛОВ</span>
                            <a href="<?=base_url()?>" class="home_icon">
                                <img src="<?=base_url()?>images/evrfutt.png" alt="" title="Logo">
                            </a>
                            <a href="<?=base_url()?>" class="home_icon_mini">
                                <img src="<?=base_url()?>images/logo_euro.png" alt="" title="Logo">
                            </a>
                            <span class="tel1 col-lg-6 col-md-6 col-sm-6 col-xs-6">8 (47396) 5-33-44</span>
                            <span class="tel2 col-lg-6 col-md-6 col-sm-6 col-xs-6">8 (47396) 5-33-44</span>
                            <img src="<?=base_url()?>images/girlffuut.png" style="left: 80%;
    top:-70px;"alt="" title="Logo" class="hidden-xs hidden-sm">
                        </div>
                        <div class="topbl2 text-center col-lg-3 col-md-3 col-sm-4 col-xs-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cart_info">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 cart-overlay">
                                    <span class="num badge pull-right" id="cart-amount">0</span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cart-icons">
                                    <img src="<?=base_url()?>images/cart-icon.png" alt="cart-icon" title="cart-icon" width='125'>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="#" class="submit btn btn-default cart_button" data-toggle="modal" data-target="#modalCart" id="topBarCartLink">                                 
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="top-bar-icon-text">Оформить Заказ</span>                                                                                         
                                </a>
                                <a href="#" class="submit btn btn-default cart_button_mini" data-toggle="modal" data-target="#modalCart" id="topBarCartLink_mini">                                 
                                    <i class="fa fa-shopping-cart"></i><span class="num badge pull-right" id="cart-amount">0</span>
                                    <span class="top-bar-icon-text"><br>Оформить<br>Заказ</span>                                                                                         
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="navbar-header" style="z-index: 1051; position: relative;">
                        
                      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         MENU <i class="fa fa-bars"></i>
                      </button>
                      
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
                                if(count($menu)>=8){
                                    $class="more8";
                                    $style="";
                                }else{
                                    $width=100/count($menu);
                                    $style="width:".$width."%;";
                                    $class="less8";
                                }
                                foreach ($menu as $item){
                                    if($i==1){
                                        $border="";
                                    }else{
                                        $border="style='border-left: 1px solid rgba(171, 127, 127, 0.66);'";
                                    }
                                    $i++;                                 
                                ?>
                                <li class="drop" style="<?=$style?>">
                                    <a <?= $border ?> class="<?=$class?>" href="<?= base_url() ?><?= $item['link'] ?>"><?= $item['name'] ?></a> 
                                </li>                                
                                <? } ?>
                         
                            </ul>
                        </div>
                        <!-- .navbar-collapse -->
                     </div>
                     <!-- .container -->
                    </nav>

                <!-- Navbar End -->