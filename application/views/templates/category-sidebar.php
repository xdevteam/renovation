<div class="col-sm-4 col-md-2 col-lg-2 col-xs-4 tabs-category-container">
                        <section class="widget-product-categories">
                            <h4 class="widget-title"><img src="http://cms.loc/images/dom.png">Каталог продукции</h4>
                            <ul class="product-cat">                        
                                <?php                     
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="cat-item cat-parent" data-ajax="<?= $k ?>">
                                            <img src="http://cms.loc/images/strl.png">
                                            <a href="<?= base_url(); ?>subcategories/<?= $k ?>"><?= $cat ?></a>
                                            <span class="count hidden-xs">(<?= count($v) ?>)</span>
                                            <ul class="children">      
                                                <?php
                                                if (!empty($v)) {
                                                    foreach ($v as $key => $val) {
                                                        foreach ($val as $kl => $zn) {
                                                            ?>      
                                                            <li>
                                                                <a href="<?= base_url(); ?>products/<?= $key ?>"><?= $kl ?></a>
                                                                <span class="count hidden-xs">(<?= $zn ?>)</span>
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