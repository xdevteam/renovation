

<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap" id="main_wrapper_wf">
        <div class="row">
            <!-- Tabs -->
            <div id="tabs-container"> 
                <div class="tabs-content clearfix">
                    <!-- Categories List -->
                    <?php include_once'application/views/templates/category-sidebar.php'; ?>
                    <!-- Categories List End -->
                    <!-- Home tab Grid -->
                    <div class="col-sm-8 col-md-7 col-lg-7 col-xs-12 clearfix tabs-content-grid home-tab-grid">
                        <div id="category_content">                       
                            <?php include_once'application/views/templates/slider.php'; ?>
                        
                        <?php if (!empty($popular)) { ?>

                <div class="marketing-carousel  hidden-sm hidden-xs " id="others">
                       <h1 style="text-align: left; color: #FB740D;">Хиты продаж</h1>

                    <ul class="carou-fred-sel clearfix ">
                        <?php foreach ($popular as $oth_item) {
                            ?>
                            <li class="hidden-sm hidden-xs " style="width: 33%!important;">
                                <div class="carousel-img">
                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                        <img src="<?= $oth_item['image_path'] ?>" alt="<?= $oth_item['name'] ?>">
                                    </a>
                                </div>
                                <div class="carousel-info" >
                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                        <span class="product-title"><?= $oth_item['name'] ?></span>
                                        <span class="amount"><?= $oth_item['price'] ?> <?= $oth_item['currency'] ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>

                    
                </div>
            <?php }  ?>
                </div>
                     
                    </div>
                    <!-- Home tab grid End -->                   
                     <!-- Brands List-->
                    <?php include_once'application/views/templates/brand-list.php'; ?>                    
                </div>                
                <!-- Brands List End -->
            </div>
            <!-- Tabs End -->
        </div>
         <hr>       
    </div>
</div>