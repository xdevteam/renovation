<div class="row">
    <!-- Feedback Section -->

    <div id="feedback-container">

        <header>
            <h2>Наши клиенты и партнеры</h2>
            <h4>Нас уже более 10 000!</h4>
        </header>

        <div class="feeback-content clearfix">

            <div id="feedback-carousel-comments" class="col-sm-6">

                <!-- Customer comments block -->
                <section id="testimonial-slider" class="carousel slide">

                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i < count($fake); $i++) { ?>
                        <li data-target="#testimonial-slider" data-slide-to="<?=$i?>" class="active"></li>
                        <?php } ?>                        
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <?php
                        foreach ($fake as $comment) {
                            if ($comment['id'] == $fake_one[0]['id']) {
                                ?>
                                <div class="item active">
                                    <p>
                                        <?= $comment['text'] ?>
                                    </p>
                                    <span class="img">
                                        <img src="<?= $comment['photo_path'] ?>" alt="person 1">
                                    </span>
                                    <span class="who">
                                        <span class="text-primary"><?= $comment['user_name'] ?></span>
                                        <br>
                                        <span class="text-secondary"><?= $comment['office'] ?></span>
                                    </span>
                                </div>
                                <?php
                            }
                        }
                        foreach ($fake as $comment) {
                            if ($comment['id'] != $fake_one[0]['id']) {
                                ?>
                                <div class="item">
                                    <p>
                                        <?= $comment['text'] ?>
                                    </p>
                                    <span class="img">
                                        <img src="<?= $comment['photo_path'] ?>" alt="person 1">
                                    </span>
                                    <span class="who">
                                        <span class="text-primary"><?= $comment['user_name'] ?></span>
                                        <br>
                                        <span class="text-secondary"><?= $comment['office'] ?></span>
                                    </span>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                </section>
                <!-- Customer comments block End -->
            </div>

            <div id="feedback-partners" class="col-sm-6">
                <!-- Partners icons block -->
                <section id="partners-icons" class="clearfix">
                    <?php
                    foreach ($partner as $item) {
                        if ($item['status'] == 'enable') {
                            ?>
                            <div class="col-sm-4 partner-icon">
                                <a href="<?= $item['link'] ?>" target="_blank" title="<?= $item['name'] ?>">
                                    <img src="<?= $item['logo'] ?>">
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <!--                            <div class="col-sm-4 partner-icon">
                                                    <a href="<?= base_url(); ?>" target="_blank" title="Partner 2">
                                                        <img src="../../../img/l-hamb.png">
                                                    </a>
                                                </div>
                    
                                                <div class="col-sm-4 partner-icon">
                                                    <a href="<?= base_url(); ?>" target="_blank" title="Partner 3">
                                                        <img src="../../../img/l-ransom.png">
                                                    </a>
                                                </div>
                    
                                                <div class="col-sm-4 partner-icon">
                                                    <a href="<?= base_url(); ?>" target="_blank" title="Partner 3">
                                                        <img src="../../../img/l-steak.png">
                                                    </a>
                                                </div>
                    
                                                <div class="col-sm-4 partner-icon">
                                                    <a href="<?= base_url(); ?>" target="_blank" title="Partner 3">
                                                        <img src="../../../img/l-thesaviour.png">
                                                    </a>
                                                </div>
                    
                                                <div class="col-sm-4 partner-icon">
                                                    <a href="<?= base_url(); ?>" target="_blank" title="Partner 3">
                                                        <img src="../../../img/l-vintage.png">
                                                    </a>
                                                </div>-->

                </section>
                <!-- Partners icons block End -->
            </div>

        </div>

    </div>

    <!-- Feedback Section End -->
</div>