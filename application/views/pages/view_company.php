<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap">
        <div class="row">

            <!-- Cabinet Content -->
            <section id="cabinet-content" class="clearfix">

                <h2 class="cabinetHead">Информация о компании</h2>

                <form id="cabinet-company-info" class="form-submit clearfix" action="<?= base_url() ?>add_commit" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-sm-6 company_view">

                            <div>
                                <h4>Название компании:</h4>
                                <span><?= $user_data['company'] ?></span>
                            </div>
                            <div>
                                <h4>Контактное лицо:</h4>
                                <span><?= $user_data['name'] ?></span>
                            </div>
                            <div>
                                <h4>Email компании:</h4>
                                <span><?= $user_data['email'] ?></span>
                            </div>
                            <div>
                                <h4>Телефон компании:</h4>
                                <span><?= $user_data['phone'] ?></span>
                            </div>
                            <?php if (!empty($user_data['phone_more'])) {
                                ?>
                                <div>
                                    <h4>Дополнительный телефон:</h4>
                                    <span><?= $user_data['phone_more'] ?></span>
                                </div>
                            <?php } ?>
                            <div>
                                <h4>Страна:</h4>
                                <span ><?= $user_data['country'] ?></span>
                            </div>
                            <div>
                                <h4>Город:</h4>
                                <span ><?= $user_data['city'] ?></span>  
                            </div>                       
                            <div>
                                <h4>Улица:</h4>
                                <span ><?= $user_data['street'] ?></span> 
                            </div>
                            <div>
                                <h4>Дом:</h4>
                                <span ><?= $user_data['building'] ?></span>       
                            </div>
                            <p>
                                <select class="cabinet-form-input" id="company_country" data-map="country" hidden>
                                    <option value="ua"><?= $user_data['country'] ?></option>                                    
                                    <!-- AJAX ? -->
                                </select>
                            </p>

                            <p>
                                <select id="city"  class="cabinet-form-input" data-map="city" hidden>
                                    <option value="zp"><?= $user_data['city'] ?></option>                                
                                </select>
                            </p>
                            <p>

                                <input type="text" value="<?= $user_data['street'] ?>" id="company_street" class="cabinet-form-input" data-map="street" hidden>
                            </p>
                            <p>

                                <input type="text" value="<?= $user_data['building'] ?>" id="company_building" class="cabinet-form-input" data-map="building" hidden>
                            </p>
                            <?php if (!empty($rating)) { ?>
                                <div class="rating clearfix">
                                    <h4>Рейтинг компании:</h4>
                                    <span class="star-rating" title="Rated 5.00 of 5">
                                        <?php
                                        $n = '';
                                        foreach ($rating as $k => $num) {
                                            $n+=$num['stars'];
                                        }
                                        $lim = $n / count($rating);
                                        for ($a = 0; $a < round($lim); $a++) {
                                            ?>
                                            <i class="fa fa-star-o"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="col-sm-6">

                            <p>
                                <label>Местоположение на карте</label>
                            <div id="map"></div>
                            </p>


                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-12">

                            <!-- Feedback -->

                            <div id="reviews_panel" style="display: block;">
                                <? if(!empty($comment)){ ?>
                                <div id="comments">
                                    <ul class="commentslist">                                        
                                        <? foreach($comment as $commit){ ?>
                                        <li class="comment" id="comment-1">
                                            <div class="comment-container">
                                                <img src="../../../img/avatar-1.png" alt="" width="60" height="60">
                                                <div class="comment-text clearfix">
                                                    <div class="star-right clearfix">
                                                        <? for ($i=0; $i<$commit['stars']; $i++){ ?>
                                                        <i class="fa fa-star-o"></i>
                                                        <? } ?>
                                                    </div>

                                                    <p class="meta">
                                                        <strong class="author"><?= $commit['author'] ?></strong>
                                                        -
                                                        <time datetime="<?= $commit['date'] ?>"><?= $commit['date'] ?></time>
                                                    </p>

                                                    <div class="descr">
                                                        <p><?= $commit['commit'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <? } ?>
                                    </ul>
                                </div>
                                <? } ?>
                                <div class="add-review">
                                    <? if(!empty($error)){ ?>
                                    <?= $error ?>
                                    <? } ?>
                                    <h3>Добавить комментарий о компании</h3>                                       
                                    <div class="comment-form-author">
                                        <label for="author">Имя *</label>
                                        <input type="text" name="author" size="30" aria-required="true">
                                        <input type="hidden" name="company" value="<?= $ident ?>" aria-required="true" >
                                    </div>
                                    <div class="comment-form-email">
                                        <label for="email">Email *</label>
                                        <input type="text" name="email" size="30" aria-required="true">
                                    </div>
                                    <div class="comment-form-rating">
                                        <label>Ваш рейтинг</label>
                                        <p class="stars">
                                            <span>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </p>
                                        <input type="hidden" name="star_rating" value="">
                                    </div>
                                    <div class="comment-form-comment">
                                        <label for="comment">Ваш комментарий</label>
                                        <textarea name="comment" id="comment" cols="45" rows="8" aria-required="true"></textarea>
                                    </div>
                                    <div class="form-submit">                                            
                                        <input type="submit" name="add_commit"  value="Отправить">
                                    </div>

                                </div>
                            </div>

                            <!-- Company's Others Goods -->
                            <?php if (!empty($other)) { ?>
                                <div class="marketing-carousel" id="item-others">
                                    <h3>Товары компании</h3>

                                    <ul class="carou-fred-sel clearfix">
                                        <?php foreach ($other as $oth_item) { ?>
                                            <li>
                                                <div class="carousel-img">
                                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                                        <img src="<?= $oth_item['image_path'] ?>" alt="<?= $oth_item['name'] ?>">
                                                    </a>
                                                </div>
                                                <div class="carousel-info">
                                                    <a href="<?= base_url(); ?>products/item/<?= $oth_item['id'] ?>-<?= $oth_item['trans'] ?>" title="<?= $oth_item['name'] ?>">
                                                        <span class="product-title"><?= $oth_item['name'] ?></span>
                                                        <span class="amount"><?= $oth_item['price'] ?> <?= $oth_item['currency'] ?></span>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                    <span href="#" id="other_next" class="marketing-ctrl next">
                                        <i class="fa fa-chevron-right"></i>
                                    </span>

                                    <span href="#" id="other_prev" class="marketing-ctrl prev">
                                        <i class="fa fa-chevron-left"></i>
                                    </span>
                                </div>
                            <?php } else { ?>
                                <div class="marketing-carousel" id="not_found">
                                    <h3>Товары компании</h3> 
                                    <span class="product">Компания не разместила ни одного товара</span>                                        
                                </div>
                            <?php } ?>

                        </div>
                    </div>

                </form>              
            </section>

        </div>
    </div>

</div>