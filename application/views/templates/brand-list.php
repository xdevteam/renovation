<div class="col-sm-2 col-md-2 col-lg-2 hidden-xs brands_col">          
                        <!-- <aside id="sidebar" class="sidebar">  -->
                            <div class="sidebar-content">
                                <section class="widget-top-rated hidden-xs" id="most-popular">
                                    <h3 class="widget-title">Выбор по торговой марке</h3>
                                    <?php if(!empty($partner)){ ?>
                                        <span id="car_next" class="carou-fred-sel-ctrl">
                                            <i class="fa fa-chevron-up"></i>
                                        </span>
                                        <ul class="widget-cart-list carou-fred-sel" id="brands">
                                            <?php foreach($partner as $item) {?>
                                                <li>
                                                    <a href="<?=$item['link']?>" class="link_brand" title="<?=$item['name']?>"> 
                                                        <img src="<?=$item['logo']?>" alt="<?=$item['name']?>">
                                                        <!-- <span class="product-title"><?=$item['name']?></span> -->
                                                    </a>                                    
                                                </li>
                                                <li>
                                                    <a href="<?=$item['link']?>" class="link_brand" title="<?=$item['name']?>"> 
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
                        <!-- </aside> -->
                    </div>  