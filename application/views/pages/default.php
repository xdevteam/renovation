

<!-- Main Content -->

<div id="main">
    

    <div class="container wf-wrap">
        <div class="row">

            <!-- Tabs -->

            <div id="tabs-container">               

                <div class="tabs-content clearfix">

                    <!-- Categories List -->
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 tabs-category-container">
                        <section class="widget-product-categories">
                            <h3 class="widget-title">Категории</h3>
                            <ul class="product-cat">                        
                                <?php                     
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="cat-item cat-parent" data-ajax="<?= $k ?>">
                                            <a href="<?= base_url(); ?>subcategories/<?= $k ?>"><?= $cat ?></a>
                                            <span class="count">(<?= count($v) ?>)</span>
                                            <ul class="children">      
                                                <?php
                                                if (!empty($v)) {
                                                    foreach ($v as $key => $val) {
                                                        foreach ($val as $kl => $zn) {
                                                            ?>      
                                                            <li>
                                                                <a href="<?= base_url(); ?>products/<?= $key ?>"><?= $kl ?></a>
                                                                <span class="count">(<?= $zn ?>)</span>
                                                            </li> 
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>                                                              
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>                   
                            </ul>
                        </section>
                    </div>
                    <!-- Categories List End -->


                    <!-- Home tab Grid -->
                    <div class="col-sm-7 col-md-7 col-lg-7 col-xs-8 clearfix tabs-content-grid home-tab-grid">
                        <div id="category_content">
                        <?php //foreach ($subcategory_img as $item) {
                            ?>
                            <!-- 1st row --><!-- 
                            <div class="col-md-4 col-sm-5 tabs-grid-item">
                                <div class="inner-item"> -->
                                    <!-- <a href="<?= base_url(); ?>products/<?= $item['link'] ?>" class="item-link">
                                        <div class="photo-frame">
                                            <img src="<?= $item['image_path'] ?>" alt="<?= $item['name'] ?>">
                                        </div>
                                        <div class="item-title">
                                            <span><?= $item['name'] ?></span>
                                        </div>
                                    </a> -->
                                    <?php include_once'application/views/templates/slider.php'; ?>

                                <!-- </div> -->
                            </div>
                        <?php //}
                        ?>
                        <!-- </div> -->
                    </div>
                    <!-- Home tab grid End -->
                   
                     <!-- Brands List-->
                   
                                
                        <aside id="sidebar" class="sidebar"> 
                            <div class="sidebar-content"> 

                        <section class="widget-top-rated hidden-xs" id="most-popular">
                            <h3 class="widget-title">Выбор по торговой марке</h3>
                                <?php if(!empty($popular)){ ?>
                            <span id="car_next" class="carou-fred-sel-ctrl">
                                <i class="fa fa-chevron-up"></i>
                            </span>
                            <ul class="widget-cart-list carou-fred-sel">
                                <?php foreach($partner as $item) {?>
                                <li>
                                    <a href="<?= base_url(); ?>products/item/<?=$item['link']?>" title="<?=$item['name']?>"> 
                                        <img src="<?=$item['logo']?>" alt="<?=$item['name']?>">
                                        <!-- <span class="product-title"><?=$item['name']?></span> -->
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>products/item/<?=$item['link']?>" title="<?=$item['name']?>"> 
                                        <img src="<?=$item['logo']?>" alt="<?=$item['name']?>">
                                        <!-- <span class="product-title"><?=$item['name']?></span> -->
                                    </a>                                   
                                </li>
                                
                                <?php }?>
                            </ul>

                            <span id="car_prev" class="carou-fred-sel-ctrl">
                                <i class="fa fa-chevron-down"></i>
                            </span> 
                                <?php }?>
                        </section>
                    </div>
                    
                    <!-- Brands List End -->
                    </div>
                </aside>




                 

            </div>

            <!-- Tabs End -->

        </div>

        <hr>


        <? //$this->load->view('templates/feedback'); ?>

    </div>
</div>