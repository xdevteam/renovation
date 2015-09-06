<div class="hidden-sm col-md-2 col-lg-2 hidden-xs brands_col">          
                        <!-- <aside id="sidebar" class="sidebar">  -->
                            <div class="sidebar-content">
                                <section class="widget-top-rated hidden-xs" id="most-popular">
                                    <h4 class="text-center">Выбор по торговой марке</h4>
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
                                    
                                    <div class="akcii">
                                        <h4 class="widget-title">Акция</h4>
                                        <img src="" >
                                        <br/>
                                        <span id="stock_name"></span>
                                        <br/>
                                        <span class="akcost">Цена: <span class="stock_cost"></span> <span class="stock_curr"></span></span>
                                    </div>
                                    
                                    <div class="best">
                                        <h4 class="widget-title">Наш выбор</h4>
                                        <img src="" >
                                        <br/>
                                        <span id="bs_name"></span>
                                        <br/>
                                         <span class="bscost">Цена: <span class="bs_cost"></span> <span class="bs_curr"></span></span>
                                    </div>
                                    
                                    
                                </section>
                            </div>
                        <!-- </aside> -->
                    </div>