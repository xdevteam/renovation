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
        <div class="row">
         <?php include_once'application/views/templates/category-sidebar.php'; ?>
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-8" >
        <div id="content" class="content"> 
            

            <div class="row cat-row trty1">
                <?php foreach ($gallery as $item) {
                    ?>.
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                    
                        <h4 class="gallery_titile text-center"><?=$item['name']?></h4>
                     <a class="gallery_item"  href="<?=base_url()?>single_gallery/<?=$item['id']?>">
                        <img src="<?=base_url()?><?=$item['image_path']?>" >
                        <br>
                   
                        <small>Подробнее..</small>
                    </a>
                </div>
                <?php } ?>
            </div>         
            <div >
                <?php
                
                ?>   
            </div>

        </div>
        </div>
            <?php include_once'application/views/templates/brand-list.php'; ?>                    


        </div></div>
</div>