<!-- Page title -->

<div class="page-title">
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
                            <a href="<?= base_url(); ?>default">Главная </a>
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
    <?php
}
        foreach ($product as $item) {
            ?>    
    <div id="main" class="cat-main">
        <div class="container wf-wrap clearfix" id="main_wrapper_wf">
             <?php include_once'application/views/templates/category-sidebar.php'; ?>       
            <div id="content" class=" clearfix product_info col-lg-7 col-md-7 col-sm-8 col-xs-8">

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

                <div class="summary">
                    <p>
                    <?php 
                    if(strlen($item['description'])>700){
                        $prestring=strip_tags(substr($item['description'], 0 , 700));
                        $pos=strripos($prestring, '.');
                        $string=substr($prestring, 0, $pos);
                        echo  $string;
                    ?>... <button class="btn-xs read_more_item">Читать далее</button>
                    <?php }else{
                        echo $item['description'];
                    } ?>
                    </p>
                    <hr>
                    <? if(!empty($item['power'])) {?>
                    <p><strong>Мощность: <small><?=$item['power']?></small></strong></p>
                    <? } ?>
                    <? if(!empty($item['color'])) {?>
                    <p><strong>Цвет: <small><?=$item['color']?></small></strong></p>
                    <? } ?>
                    <? if(!empty($item['size'])) {?>
                    <p><strong>Размер: <small><?=$item['size']?></small></strong></p>
                    <? } ?>
                    <p class="item_price text-right">                        
                        <? if(!empty($item['stock_price'])){ ?>
                        <span class="price_regular" style="text-decoration: line-through;"><?=$item['price']?><?= $item['currency'] ?></span>
                        <span class="price"><?=$item['stock_price']?></span>
                        <? 
                        }else{ ?> 
                        <span class="price"><?=$item['price']?></span>
                        <?
                    }?>
                        <span class="currency"><?= $item['currency'] ?></span>
                        <span class="separator">за</span>
                        <span class="quantity"><?= $item['prod_quantity'] ?></span>
                        <span class="separator">шт.</span>
                    </p>
                    <? if(!empty($item['prod_min_order'])) {?>
                    <p class="order">
                        <span>Минимальный заказ:</span>
                        <span class="q"><?= $item['prod_min_order'] ?></span>
                    </p>
                    <? } ?>
                    <div class="quantity_ clearfix text-right">
                        <div class="add2cart buy-it" data-toggle="modal" data-target="#modalCart" id="<?= $item['id'] ?>">В Корзину</div>
                        <input type="number" step="1" min="1" value="1" title="Change quantity" size="4">
                    </div>
                    
                    <div class="product_meta" style="display:none;"> 
                        <span class="date">
                            Товар добавлен:
                            <span href="<?= base_url(); ?>" class="phone_value"><?= $item['date'] ?></span>
                        </span>
                    </div>

                    <div class="seller_info">                        
                        <span class="company" style="display: none;">
                            Компания:
                            <a href="" class="company_value"><?= $user_data['company'] ?></a>
                        </span>        
                    </div>
                    <?php if (!empty($item['pdf_path'])){ ?>
                    <div>
                        <span class="pdf">                           
                            <a href="<?= base_url();?>/<?= $item['pdf_path'] ?>" target="blank" class="pdf"><img src="../../../images/pdf.png" width="45"> <strong style="color: #3B3946;">Скачать PDF документацию</strong></span>
                        </span>
                    </div>
                    <? } ?>
                </div>
            <?php } ?>

            <div class="product-tabs hidden-sm hidden-xs">
                <ul class="tabs clearfix prod_tabs_button">
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
                                     <?                                    
                                    if($param[0]!='-' || $param[1]!='-'){?>
                                    <tr>
                                        <td><?= $param[0] ?></td>
                                        <td><?= $param[1] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[2]!='-' || $param[3]!='-'){?>
                                    <tr>
                                        <td><?= $param[2] ?></td>
                                        <td><?= $param[3] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[5]!='-' || $param[4]!='-'){?>
                                    <tr>
                                        <td><?= $param[4] ?></td>
                                        <td><?= $param[5] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[6]!='-' || $param[7]!='-'){?>
                                    <tr>
                                        <td><?= $param[6] ?></td>
                                        <td><?= $param[7] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[9]!='-' || $param[8]!='-'){?>
                                    <tr>
                                        <td><?= $param[8] ?></td>
                                        <td><?= $param[9] ?></td>
                                    </tr>
                                    <?
                                    }
                                    if($param[10]!='-' || $param[11]!='-'){?>
                                    <tr>
                                        <td><?= $param[10] ?></td>
                                        <td><?= $param[11] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[12]!='-' || $param[13]!='-'){?>
                                    <tr>
                                        <td><?= $param[12] ?></td>
                                        <td><?= $param[13] ?></td>
                                    </tr>
                                     <?
                                    }
                                    if($param[14]!='-' || $param[15]!='-'){?>
                                    <tr>
                                        <td><?= $param[14] ?></td>
                                        <td><?= $param[15] ?></td>
                                    </tr>
                                    <?
                                    }
                                    if($param[16]!='-' || $param[17]!='-'){?>
                                    <tr>
                                        <td><?= $param[16] ?></td>
                                        <td><?= $param[17] ?></td>
                                    </tr>
                                    <?
                                    }
                                    if($param[18]!='-' || $param[19]!='-'){?>
                                    <tr>
                                        <td><?= $param[18] ?></td>
                                        <td><?= $param[19] ?></td>
                                    </tr>
                                    <? } ?>

                                </tbody>
                            </table>
                </section>
            </div>
            <? if(!empty($item['video_path'])) {?>
                    <p><?=$item['video_path']?></p>
                    <? } ?>
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
