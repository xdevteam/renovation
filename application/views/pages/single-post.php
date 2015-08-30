<!-- Page title -->
<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    <?=$post_view[0]['name']?>
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <?php if(!empty($post_view[0]['blog_page'])) { ?>
                        <a href="<?= base_url(); ?>blog">Статьи</a>
                        <?php } ?>
                        <?php if(!empty($post_view[0]['news_page'])) { ?>
                        <a href="<?= base_url(); ?>news">Новости</a>
                        <?php } ?>
                        <?php if(!empty($post_view[0]['description'])) { ?>
                        <a href="<?= base_url(); ?>gallery">Галерея</a>
                        <?php } ?>
                    </li>
                    <li>
                        <a href="<?=  base_url()?>single-post/<?=$post_view[0]['id']?>" >
                        <?=$post_view[0]['name']?>
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
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" >
        <div id="content" class="content"> 
 
            <div class="row cat-row post_content">
                <?php if(!empty($post_view[0]['blog_page'])) { ?>
                <?=$post_view[0]['blog_page']?>
                <?php } ?>
                <?php if(!empty($post_view[0]['description'])) { ?>
                <img src="<?=$post_view[0]['image_path']?>" alt="" title="main_image">
                <?=$post_view[0]['description']?>
                <?php } ?>
                <?php if(!empty($post_view[0]['news_page'])) { ?>
                <?=$post_view[0]['news_page']?>
                <?php } ?>
                <?php if(!empty($post_view[0]['date'])) { ?>
                <span class="pull-right"><strong>Опубликован: </strong>  <small><?=$post_view[0]['date']?><small></span>
                <?php } ?>               
            </div>       
           

        </div>
        </div>
        <?php //include_once'application/views/templates/brand-list.php'; ?>              
    </div>
</div>



<!-- Main Content End -->
