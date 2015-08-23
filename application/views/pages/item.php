<!-- Page title -->

<div class="page-title col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="wf-wrap">
        <?php
        foreach ($product as $item) {
            ?>            
            <div class="wf-table">
                <div class="wf-td hgroup">
                    <h2 class="product_name_item"><?=$item['name']?></h2>
                </div>
                <div class="wf-td hidden-xs hidden-sm">
                    <ul class="breadcrumbs text-normal">
                        <li>
                            <a href="<?= base_url(); ?>default">Главная</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>subcategories/<?= $subcat_name['0']['link'] ?>"><?= $subcat_name['0']['name'] ?></a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>products/<?= $cat_name['0']['link'] ?>"><?= $cat_name['0']['name'] ?></a>
                        </li>
                        <li>
                            <a href="<?= base_url('products/item/' . $item['id']); ?>"><?= $item['name'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div> 

    <!-- Page title -->


    <!-- Main Content -->
    <!-- <pre>
        <?php
        // var_dump($product);
        ?>
    </pre> -->
    <div id="main" class="cat-main">
        <div class="container wf-wrap clearfix">
             <?php include_once'application/views/templates/category-sidebar.php'; ?>       
            <div id="content" class=" clearfix product_info col-lg-8 col-md-8 col-sm-8 col-xs-8">

                <!-- Main Product Image -->

                <div class="images col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <a href="<?= base_url(); ?><?= $item['image_path'] ?>" class="fancy" data-fancybox-group="gallery">
                        <img src="<?= $item['image_path'] ?>" alt="" width="700" height="850" id="mainImage">
                    </a>
                    <div class="thumbnails clearfix hidden-xs hidden-sm">    
                     <?php 
                     $min_images=unserialize($item['min_img']);
                     if(!empty ($min_images)){ ?>                     
                        <?php foreach (unserialize($item['min_img'])as $img) { ?>
                        <div class="col-md-4 col-sm-4">
                                                      
                            <a href="<?= base_url(); ?><?= $img ?>" class="fancy" data-fancybox-group="gallery">
                                <img src="<?= $img ?>" alt="" width="400" height="400">
                            </a>

                        </div>
                         <?php }?>      
                        <?php } ?>
                        
                    </div>
                </div>

                <!-- Summary -->

                <div class="summary col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <p class="item_price">
                        <span class="price"><?= $item['price'] ?></span>
                        <span class="currency"><?= $item['currency'] ?></span>
                        <!-- <span class="separator">за</span>
                        <span class="quantity"><?= $item['prod_quantity'] ?></span> -->
                    </p>
                    <? if(!empty($item['prod_min_order'])) {?>
                    <p class="order">
                        <span>Минимальный заказ:</span>
                        <span class="q"><?= $item['prod_min_order'] ?></span>
                    </p>
                    <? } ?>
                    <div class="quantity_ clearfix">
                        <input type="number" step="1" min="1" value="1" title="Change quantity" size="4">
                        <div class="add2cart buy-it" data-toggle="modal" data-target="#modalCart" id="<?= $item['id'] ?>">Купить</div>
                    </div> 
                    <div class="seller_info">                        
                        <span class="company" style="display: none;">
                            Компания:
                            <a href="<?= base_url('view_company'); ?>/<?= $user_data['id'] ?>" class="company_value"><?= $user_data['company'] ?></a>
                        </span>                
                    </div>
                </div>
            <?php } ?>
            <!-- Product Tabs -->

            <div class="product-tabs hidden-sm hidden-xs">
                <ul class="tabs clearfix">
                    <li class="description_tab active">
                        <a href="#">Описание</a>
                    </li>
                    <li class="add_info_tab">
                        <a href="#">Дополнительная информация</a>
                    </li>
                </ul>

                <section id="description_panel">
                    <p> <?= nl2br($item['description']) ?></p>
                </section>

                <section id="add_info_panel" style="display: none;">
                   
                    <table class="project-charasteristics table table-responsive table-striped table-bordered">
                                <tbody>
                                    <?php $param = unserialize($item['parametr']) ?>
                                    <tr>
                                        <td>Тип вентилятора</td>
                                        <td><?= $param[0] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Размер</td>
                                        <td><?= $param[1] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Продуктивность</td>
                                        <td><?= $param[2] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Потребляемая мощность</td>
                                        <td><?= $param[3] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Класс защиты</td>
                                        <td><?= $param[4] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Управление</td>
                                        <td><?= $param[5] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Фильтр</td>
                                        <td><?= $param[6] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Освещение</td>
                                        <td><?= $param[7] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Вес</td>
                                        <td><?= $param[8] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Уровень шума</td>
                                        <td><?= $param[9] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                </section>
            </div>
        </div>
       <?php include_once'application/views/templates/brand-list.php'; ?>     
    </div>
</div>
 <?php
        foreach ($product as $item) {
            ?>  
<div class="product-tabs hidden-lg hidden-md" style="padding: 0 15px;">
    
                <ul class="tabs clearfix">
                    <li class="description_tab active description_tab_mini">
                        <a >Описание</a>
                    </li>
                    <li class="add_info_tab add_info_tab_mini">
                        <a >Дополнительная информация</a>
                    </li>
                </ul>

                <section id="description_tab_mini">
                    <p> <?= nl2br($item['description']) ?></p>
                </section>

                <section id="reviews_tab" style="display: none;">
                    
                    <table class="project-charasteristics table table-responsive table-striped table-bordered">
                                <tbody>
                                    <?php $param = unserialize($item['parametr']) ?>
                                    <tr>
                                        <td>Тип вентилятора</td>
                                        <td><?= $param[0] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Размер</td>
                                        <td><?= $param[1] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Продуктивность</td>
                                        <td><?= $param[2] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Потребляемая мощность</td>
                                        <td><?= $param[3] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Класс защиты</td>
                                        <td><?= $param[4] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Управление</td>
                                        <td><?= $param[5] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Фильтр</td>
                                        <td><?= $param[6] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Освещение</td>
                                        <td><?= $param[7] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Вес</td>
                                        <td><?= $param[8] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Уровень шума</td>
                                        <td><?= $param[9] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                </section>
           
            </div>
            <?php } ?>
<div class="hidden-xs hidden-sm">
<!-- Company's Others Goods -->
            <?php if (!empty($popular)) { ?>
                <div class="marketing-carousel " id="others">
                    <h3>Хиты продаж</h3>

                    <ul class="carou-fred-sel clearfix">
                        <?php foreach ($popular as $oth_item) {
                            ?>
                            <li>
                                <div class="carousel-img">
                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                        <img src="<?= $oth_item['image_path'] ?>" alt="<?= $oth_item['name'] ?>">
                                    </a>
                                </div>
                                <div class="carousel-info">
                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                        <span class="product-title"><?= $oth_item['name'] ?></span>
                                        <span class="amount"><?= $oth_item['price'] ?> <?= $oth_item['currency'] ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>

                    <span href="#" id="other_next" class="marketing-ctrl next">
                        <i class="fa fa-chevron-right"></i>
                    </span>

                    <span href="#" id="other_prev" class="marketing-ctrl prev">
                        <i class="fa fa-chevron-left"></i>
                    </span>
                </div>
            <?php }  ?>

            <!--  Similar Goods -->

            <?php if (!empty($like)) { ?>

                <div class="marketing-carousel" id="similars">
                    <h3>Другие похожие товары</h3>
                    <ul class="carou-fred-sel clearfix">

                        <?php
                        foreach ($like as $lk) {
                            ?>                  
                            <li>
                                <div class="carousel-img">
                                    <a href="<?= base_url(); ?>products/item/<?= $lk['id'] ?>-<?= $lk['trans'] ?>" title="<?= $lk['name'] ?>">
                                        <img src="<?= $lk['image_path'] ?>" alt="<?= $lk['name'] ?>">
                                    </a>
                                </div>
                                <div class="carousel-info">
                                    <a href="<?= base_url(); ?>products/item/<?= $lk['id'] ?>-<?= $lk['trans'] ?>" title="<?= $lk['name'] ?>">
                                        <span class="product-title"><?= $lk['name'] ?></span>
                                        <span class="amount"><?= $lk['price'] ?>  <?= $lk['currency'] ?></span>
                                    </a>
                                </div>
                            </li>                            
                        <?php } ?>
                    </ul>
                    <span href="#" id="similar_next" class="marketing-ctrl next">
                        <i class="fa fa-chevron-right"></i>
                    </span>

                    <span href="#" id="similar_prev" class="marketing-ctrl prev">
                        <i class="fa fa-chevron-left"></i>
                    </span>
                </div>
            <?php } else {
                ?>
                <div class="marketing-carousel" id="not_found">
                    <h3>Другие похожие товары</h3> 
                    <span class="product">Похожих товаров не найдено</span>                                        
                </div>

                <?php
            }
            ?>



</div>

<!-- Main Content End -->
