
<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    <?php
                    if (!empty($category))
                        echo $category;
                    else
                        echo 'Все Категории';
                    ?>
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
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
        <?php include_once'application/views/templates/category-sidebar.php'; ?>       
            <div id="content" class=" clearfix col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- 1st Row -->
        <div class="row cat-row">
            <?php
            if (!empty($subcategories)) {
                foreach ($subcategories as $item) {
                    if ($item['status'] == 'enable') {
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 cat-content-row-item">
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
        </div>
         <?php include_once'application/views/templates/brand-list.php'; ?> 
    </div>
</div>



<!-- Main Content End -->

