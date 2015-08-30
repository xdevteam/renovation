<!-- Page title -->
<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    Галерея
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url('gallery'); ?>" >
                       Галерея
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Page title -->
<!-- Main Content -->
<div id="main" class="cat-main">
    <div class="container wf-wrap clearfix" id="main_wrapper_wf">
         <?php include_once'application/views/templates/category-sidebar.php'; ?>
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-8" >
        <div id="content" class="content"> 
            

            <div class="row cat-row trty1">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-4.jpg">
                        <img src="<?=base_url()?>img/shop-item-4.jpg" >
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-3.jpg">
                        <img src="<?=base_url()?>img/shop-item-3.jpg" >
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-7.jpg">
                        <img src="<?=base_url()?>img/shop-item-7.jpg" >
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                   <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-5.jpg">
                        <img src="<?=base_url()?>img/shop-item-5.jpg" >
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-2.jpg">
                        <img src="<?=base_url()?>img/shop-item-2.jpg" >
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    <a class="fancybox" rel="group" href="<?=base_url()?>img/shop-item-6.jpg">
                        <img src="<?=base_url()?>img/shop-item-6.jpg" >
                    </a>
                </div>
            </div>         
            <div >
                <?php
                
                ?>   
            </div>

        </div>
        </div>
            <?php include_once'application/views/templates/brand-list.php'; ?>                    


    </div>
</div>