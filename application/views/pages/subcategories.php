<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h1>
                    <?php
                    if (!empty($category))
                        echo $category;
                    else
                        echo 'Все Категории';
                    ?>
                </h1>
            </div>
            <div class="wf-td">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>subcategories/<?php
                        if (!empty($link))
                            echo $link;
                        ?>">
                               <?php
                               if (!empty($category))
                                   echo $category;
                               else
                                   echo 'Все Категории';
                               ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Page title -->


<!-- Main Content -->

<div id="main" class="cat-main">
    <div class="container wf-wrap">

        <!-- 1st Row -->
        <div class="row cat-row">
            <?php
            if (!empty($subcategories)) {
                foreach ($subcategories as $item) {
                    if ($item['status'] == 'enable') {
                        ?>
                        <div class="col-md-3 col-sm-3 cat-content-row-item">
                            <article>
                                <div class="cat-item-img">
                                    <a href="<?= base_url(); ?>products/<?= $item['link'] ?>">
                                        <img src="<?= $item['image_path'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="cat-item-title">
                                    <a href="<?= base_url(); ?>products/<?= $item['link'] ?>">
                                        <h3>
            <?= $item['name'] ?>
                                            <mark class="count">(<?= $count[$item['id']] ?>)</mark>
                                        </h3>
                                    </a>
                                </div>
                            </article>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="col-md-3 col-sm-3 cat-content-row-item">                
                </div>
                <div class="col-md-6 col-sm-6 cat-content-row-item">
                    <article>
                        <div class="cat-item-img">
                            <a href="#">
                                <img src="http://mr-stiher.ru/img/oops-404.png" alt="">
                            </a>
                        </div>
                        <div class="cat-item-title">
                            <a href="#">
                                <h3>
                                    В данной категории нет ни одного товара
                                    <mark class="count"></mark>
                                </h3>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-3 col-sm-3 cat-content-row-item">                
                </div>
                <?php
            }
            ?>
        </div>



        <!--        2nd Row 
                <div class="row cat-row">
        
                    <div class="col-md-4 col-sm-4 cat-content-row-item">
                        <article>
                            <div class="cat-item-img">
                                <a href="<?= base_url(); ?>products">
                                    <img src="../../../img/shop-item-5.jpg" alt="">
                                </a>
                            </div>
                            <div class="cat-item-title">
                                <a href="<?= base_url(); ?>products">
                                    <h3>
                                        Footwear
                                        <mark class="count">(3)</mark>
                                    </h3>
                                </a>
                            </div>
                        </article>
                    </div>
        
                    <div class="col-md-4 col-sm-4 cat-content-row-item">
                        <article>
                            <div class="cat-item-img">
                                <a href="<?= base_url(); ?>products">
                                    <img src="../../../img/shop-item-6.jpg" alt="">
                                </a>
                            </div>
                            <div class="cat-item-title">
                                <a href="<?= base_url(); ?>products">
                                    <h3>
                                        Hoodies
                                        <mark class="count">(7)</mark>
                                    </h3>
                                </a>
                            </div>
                        </article>
                    </div>
        
                    <div class="col-md-4 col-sm-4 cat-content-row-item">
                        <article>
                            <div class="cat-item-img">
                                <a href="<?= base_url(); ?>products">
                                    <img src="../../../img/shop-item-7.jpg" alt="">
                                </a>
                            </div>
                            <div class="cat-item-title">
                                <a href="<?= base_url(); ?>products">
                                <h3>
                                    T-Shirts
                                    <mark class="count">(7)</mark>
                                </h3>
                            </a>
                        </div>
                    </article>
                </div>-->

        <!--        </div>-->

    </div>
</div>



<!-- Main Content End -->

