<!-- Sidebar -->


<aside id="sidebar" class="sidebar hidden-xs hidden-sm"> 
    <div class="sidebar-content">

        <!--
<section class="widget-product-search">
<div class="widget-title">Поиск</div>
<form role="search" method="get" action="">
<input type="search" class="search-field" placeholder="Искать.." value="" name="S" title="Search for..">
<input type="submit" value="search">
<span class="search-icon">
    <i class="fa fa-search"></i>
</span>
</form>
</section>
        -->

        <section class="widget-product-categories">
            <h3 class="widget-title">Категории</h3>
            <ul class="product-cat">                        
                <?php
                foreach ($cat_list as $cat => $subcategory) {
                    foreach ($subcategory as $k => $v) {
                        ?>                        
                        <li class="cat-item cat-parent">
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

        <!-- Most Popular -->

        <section class="widget-top-rated" id="most-popular">
            <h3 class="widget-title">Самые популярные</h3>
 <?php if(!empty($popular)){ ?>
            <span id="car_next" class="carou-fred-sel-ctrl">
                <i class="fa fa-chevron-up"></i>
            </span>
            <ul class="widget-cart-list carou-fred-sel">
                <?php foreach($popular as $item) {?>
                <li>
                    <a href="<?= base_url(); ?>products/item/<?=$item['id']?>-<?=$item['trans']?>" title="<?=$item['name']?>"> 
                        <img src="<?=$item['image_path']?>" alt="<?=$item['name']?>">
                        <span class="product-title"><?=$item['name']?></span>
                    </a>
                    <span class="amount"><?=$item['price']?> <?=$item['currency']?></span>
                </li>
                <?php }?>
            </ul>

            <span id="car_prev" class="carou-fred-sel-ctrl">
                <i class="fa fa-chevron-down"></i>
            </span>	
 <?php }?>
        </section>

        <!-- Other of its Seller -->

        <section class="widget-top-rated" id="already-seen">
            <h3 class="widget-title">Вы уже посмотрели</h3>
            <?php if (!empty($views)) { 
             ?>
                <span id="car_next_" class="carou-fred-sel-ctrl">
                    <i class="fa fa-chevron-up"></i>
                </span>		

                <ul class="widget-cart-list carou-fred-sel">    
                    <?php foreach ($views as $view) {
                        ?>                
                        <li>
                            <a href="<?= base_url(); ?>products/item/<?=$view['id']?>-<?=$view['trans']?>" title="<?=$item['name']?>"> 
                                <img src="<?=$view['image_path']?>" alt="IPhone mockup 6">
                                <span class="product-title"><?=$view['name']?></span>
                            </a>
                            <span class="amount"><?=$view['price']?>  <?=$item['currency']?></span>
                        </li>
                    <?php } ?>
                </ul>

                <span id="car_prev_" class="carou-fred-sel-ctrl">
                    <i class="fa fa-chevron-down"></i>
                </span>	
            <?php } ?>
        </section>

    </div>
</aside>


<!-- Sidebar End-->