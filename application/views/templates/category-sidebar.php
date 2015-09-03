<div class="col-sm-4 col-md-3 col-lg-3 hidden-xs tabs-category-container">
                        <section class="widget-product-categories">
                            <div class="widget-product-search">                       
                                <form role="search" method="POST" action="<?= base_url(); ?>search">
                                    <input type="search" class="search-field" placeholder="Искать.." value="" name="name" title="Search for..">
                                    <input type="submit" name="search" value="search">
                                    <span class="search-icon">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </form>                            
                            </div>
                            <h4 class="widget-title"><img src="<?=base_url()?>images/dom.png">Каталог продукции</h4>
                            <ul class="product-cat">                        
                                <?php                     
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="cat-item cat-parent" data-ajax="<?= $k ?>">
                                            <span class="count ">
                                            <img src="<?=base_url()?>images/strl.png" width="11" height="11">
                                            <?= $cat ?>
                                            (<?= count($v) ?>)</span>
                                            <ul class="children hiden-xs">      
                                                <?php
                                                if (!empty($v)) {
                                                    foreach ($v as $key => $val) {
                                                        foreach ($val as $kl => $zn) {
                                                            ?>      
                                                            <li><a href="<?= base_url(); ?>products/<?= $key ?>">
                                                                <span class="count hidden-xs">
                                                                <?= $kl ?>
                                                                (<?= $zn ?>)</span>
                                                                </a>
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
                            <div class="statii">
        <h5><img src="<?=base_url()?>/images/book1.jpg" ><a href="/blog">Статьи</a></h5>
        <p>Электрическая ленточная пила – 
советы по выбору и применению
</p>
<p>Электрическая ленточная пила – 
советы по выбору и применению
</p>
<p>Электрическая ленточная пила – 
советы по выбору и применению
</p>
<p>Электрическая ленточная пила – 
советы по выбору и применению
</p>
    </div>
                            <div class="newsc">
        <h5><img src="<?=base_url()?>/images/glob1.jpg" ><a href="/news">Новости</a></h5>
        <p>Новый закон «О платежной дисцип-
лине собственников жилья»
</p>
<p>Новый закон «О платежной дисцип-
лине собственников жилья»
</p>
<p>Новый закон «О платежной дисцип-
лине собственников жилья»
</p>
<p>Новый закон «О платежной дисцип-
лине собственников жилья»
</p>
    </div>
                        </section>
    
                    </div>

<div class="hidden-sm hidden-md hidden-lg col-xs-12 tabs-category-container">
                        <section class="widget-product-categories">
                            <h4 class="widget-title bock"><img src="<?=base_url()?>images/dom.png">Каталог продукции</h4>
                            <ul class="teg-cat">                        
                                <?php 
                                // print_r($cat_list);                    
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="teg-item" data-ajax="<?= $k ?>">
                                            <a href="<?=base_url()?>subcategories/<?= $k ?>" class="teg-count ">
                                            <img src="<?=base_url()?>images/strl.png" width="11" height="11">
                                            <?= $cat ?>
                                            </a>
                                            
                                        </li>
                                        <?php
                                    }
                                }
                                ?>                   
                            </ul>
                        </section>
                    </div>