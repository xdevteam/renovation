<!-- Page title -->

<!-- Page title -->
<!-- Main Content -->
<div id="main" class="cat-main">
    <div class="container wf-wrap clearfix">

        <div id="content" class="content">
            <? if (!empty($items)) { ?>
            <p class="cat-result-count">Показано <?= count($items) ?> позиции из <?= $total_rows ?></p>
            <? } ?>
            <div class="cat-ordering">
                <select>
                    <option value="pop">Сортировка по популярности</option>
                    <option value="rate">Сортировать по среднему рейтингу</option>
                    <option value="date">Сортировать по новинкам</option>
                    <option value="asc">Сортировать по цене : от низкой к высокой</option>
                    <option value="desc">Сортировать по цене: от высокой к низкой</option>
                </select>
            </div>

            <div class="row cat-row">
                <?php
                if (!empty($items)) {
                    foreach ($items as $item) {
                        if ($item['status'] == 'enable') {
                            ?>                
                            <div class="col-md-4 col-sm-4 cat-content-row-item">
                                <article>
                                    <div class="cat-item-img">
                                        <a href="#" onclick="return false;" class="cat-item-hover-effect"><!--link-->
                                            <img id="mainImage" src="<?= $item['image_path'] ?>" alt=""><!--img-->
                                        </a>
                                    </div>
                                    <div class="cat-item-title">
                                        <a href="#" onclick="return false;" title="<?= $item['name'] ?>"><!--link-->
                                            <h4 id="itemName" class="product-title">
                                                <?= $item['name'] ?><!--name-->
                                            </h4>
                                            <span class="item_price">
                                                <span class="price"><?= $item['name'] ?></span>
                                                
                                            </span>
                                        </a>
                                    </div>
                                    <div class="hover-over-btns">
                                        <a href="#" id="<?= $item['id'] ?>" title="В корзину" data-toggle="modal" data-target="#modalCart" class="buy-it" rel="1">
                                            <div>
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </a>
                                        <a href="<?= base_url('products/item/' . $item['id']); ?>-<?= $item['trans'] ?>" title="К товару">
                                            <div class="show-it">
                                                <i class="fa fa-share"></i>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <div class="col-md-12 col-sm-12 cat-content-row-item">
                        <article>
                            <div class="cat-item-img">
                                <a href="#">
                                    <img src="http://mr-stiher.ru/img/oops-404.png" alt=""><!--img-->
                                </a>
                            </div>
                            <div class="cat-item-title">
                                <a href="#">
                                    <h4>Не найдено ни одного товара

                                    </h4>
                                    <span class="price">
                                        <span class="amount"></span>
                                    </span>
                                </a>
                            </div>                           
                        </article>
                    </div>
                    <?php
                }
                ?>
            </div>         
            <div >
                <?php
                echo $this->pagination->create_links();
                ?>   
            </div>

        </div>

        <?php
        include_once 'application/views/templates/sidebar.php';
        ?>

    </div>
</div>



<!-- Main Content End -->
