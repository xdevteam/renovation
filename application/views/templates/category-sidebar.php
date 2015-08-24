<div class="col-sm-4 col-md-3 col-lg-3 col-xs-4 tabs-category-container">
                        <section class="widget-product-categories">
                            <h4 class="widget-title"><img src="http://cms.loc/images/dom.png">Каталог продукции</h4>
                            <ul class="product-cat">                        
                                <?php                     
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="cat-item cat-parent" data-ajax="<?= $k ?>">
                                            <span class="count ">
                                            <img src="http://cms.loc/images/strl.png" width="11" height="11">
                                            <?= $cat ?>
                                            (<?= count($v) ?>)</span>
                                            <ul class="children">      
                                                <?php
                                                if (!empty($v)) {
                                                    foreach ($v as $key => $val) {
                                                        foreach ($val as $kl => $zn) {
                                                            ?>      
                                                            <li>
                                                                <span class="count hidden-xs">
                                                                <a href="<?= base_url(); ?>products/<?= $key ?>"><?= $kl ?></a>
                                                                (<?= $zn ?>)</span>
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