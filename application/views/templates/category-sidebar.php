<div class="col-sm-2 col-md-2 col-lg-2 col-xs-3 tabs-category-container">
                        <section class="widget-product-categories">
                            <h3 class="widget-title">Категории</h3>
                            <ul class="product-cat">                        
                                <?php                     
                                foreach ($cat_list as $cat => $subcategory) {
                                    foreach ($subcategory as $k => $v) {
                                        ?>                        
                                        <li class="cat-item cat-parent" data-ajax="<?= $k ?>">
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