<!-- Page title -->
<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    Cтатьи
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/blog" >
                        Cтатьи
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
 
            <div class="row cat-row">
                
                <?php 

                foreach($post as $p){ 
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post_block">
                    <a href="<?=  base_url()?>single-post/<?=$p['id']?>" >
                        <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                            <img src="<?=$p['image_path']?>" alt=<?=$p['name']?> >
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h4><?=$p['name']?></h4>
                            <div class="blog_content_prev"><?=substr(strip_tags($p['article_description']), 0, 350)?></div>
                        </div>
                    </a>
                </div>    
                <?php } ?> 
                  <?php
                echo $this->pagination->create_links();
                ?>            
            </div>       
           

        </div>
        </div>
        <?php include_once'application/views/templates/brand-list.php'; ?>              
        </div></div>
</div>



<!-- Main Content End -->
