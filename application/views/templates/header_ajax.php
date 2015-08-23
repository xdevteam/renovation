<header id="header" class="normal-header line-decoration">

    <!-- Top Bar -->
    <div id="top-bar" class="text-normal full-width-line clearfix">
        <div class="wf-wrap">
            <div class="wf-container-top">
                <div class="wf-table">
                    <!-- Top bar conctacts icons -->
                    <div class="wf-td">
                        <span class="mini-contacts">
                            <a href="<?= base_url(); ?>" class="top-bar-icon-text">О нас</a>
                        </span>
                        <span class="mini-contacts">
                            <a href="<?= base_url(); ?>" class="top-bar-icon-text">Тех поддержка</a>
                        </span>
                    </div>
                    <!-- Top bar conctacts icons End -->                              
                    <div class="right-block wf-td clearfix">
                        <div class="mini-login">
                            <a href="#" class="submit" data-toggle="modal" data-target="#modalCart" id="topBarCartLink">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="top-bar-icon-text">Корзина</span>
                                <span class="num badge" id="cart-amount"></span>
                            </a>
                        </div>
                        <div class="mini-login">
                            <a href="<?= base_url(); ?>account/<?= $user['id']; ?>" class="submit">
                                <span class="top-bar-icon-text"><?= $user['surname']; ?>  <?= $user['name']; ?></span>
                            </a>
                        </div>

                        <div class="mini-login">
                            <a href="#" class="submit">
                                <form action="<?= base_url(); ?>exit_user" method="POST">
                                    <i class="fa fa-sign-out"></i>
                                    <input onfocus="this.blur();" type="submit" id="exit" name="logout" value="Выйти" class="top-bar-icon-text subm" >
                                </form>                                
                            </a>
                        </div>
                        <!-- Social -->
                        <div class="soc-ico clearfix">
                            <a href="<?= $inst_link ?>" title="Instagram" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="<?= $fb_link ?>" title="Facebook" target="_blank">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="<?= $tw_link ?>" title="Twitter" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="<?= $vk_link ?>" title="Vk" target="_blank">
                                <i class="fa fa-vk"></i>
                            </a>
                        </div>
                        <!-- Social End -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <span class="top-bar-arrow">
        <span>
            <i class="fa fa-angle-down"></i>
        </span>
    </span>

    <!-- Top Bar End -->

    <!-- Branding & Navigation -->
    <div class="wf-wrap clearfix">

        <div id="branding" class="wf-td">
            <a href="<?= base_url(); ?>">
                <img src="../../../img/logo-regular.png" alt="Logo">
            </a>
        </div>
        <?php if ($user['usercat'] != 'buyer') {
            ?>
            <div id="cabinet-title">
                <span class="cabinet-icon">
                    <i class="fa fa-briefcase"></i>
                </span>
                <span class="cabinet-name">
                    <h3>Кабинет компании</h3>
                    <h4>
                        <?= $user['company']; ?>
                    </h4>
                </span>
            </div>
        <?php } ?>
        <div class="yoursId">
            <h4>Ваш id: </h4>
            <strong>
                <?php
                $id = $user['id'];
                if (strlen($id) < 8) {
                    for ($i = 0; $i < 8 - strlen($id); $i++) {
                        echo 0;
                    }
                }
                echo $id;
                ?>
            </strong>
        </div>
        <div class="entrance">
            <h4>Вы вошли как: </h4>
            <strong><?php
                if ($user['usercat'] == 'seller')
                    echo 'Продавец';
                else
                    echo 'Покупатель';
                ?>
            </strong>
            <br>
            <?php
            if ($user_category != 'buyer') {
                ?>
                <span class="query">сменить статус ?</span>

                <div class="changeRole">
                    <input type="checkbox" name="role" data-on-text="Продавец" data-off-text="Покупатель">
                </div>
            <?php } ?>


        </div>

    </div>


    <div class="row">
        <!-- Search -->
        <form action="<?= base_url(); ?>search" method="POST" class="clearfix">
            <div id="searching">

                <div class="search-inner clearfix">
                    <input type="text" placeholder="Я ХОЧУ КУПИТЬ" name="name" class="search-input" autofocus>

                    <div class="btn-group s-butt">
                        <button type="button" class="btn btn-default search-block-button" id="location-select-button">
                            <span class="btn-text">Вся Украина</span>
                            <input type="hidden" name="city" value="">
                            <span class="search-select-icon">
                                <i class="fa fa-angle-down"></i>
                            </span>

                            <div class="sub-nav">
                                <input type="text" placeholder="Введите название города" name="searchCityName">
                                <ul class="scrollbar-inner"></ul>
                            </div>
                        </button>

                        <a href="#" title="Искать на сайте">
                            <button type="submit" class="btn btn-default search-block-button" name="search" value="BUY" id="buy-search-button">
                                <span class="btn-text">Поиск</span>
                                <span class="search-select-icon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="search-inner clearfix">
                    <div class="s-butt">
                        <button type="button" class="btn btn-default search-block-button" value="SELL" id="sell-search-button">
                            <span class="btn-text">Я хочу продать</span>
                        </button>
                    </div>
                </div>

            </div>
        </form>
        <!-- Search End --> 
    </div>

    <div class="row">

        <!-- Cabinet Navigation -->

        <nav id="cabinet-navigation">
            <ul id="main-nav" class="clearfix">                           
                <?php
                foreach ($menu as $item => $arr) {
                    if (empty($arr['1']))
                        $disable_link = 'onclick="return false;"';
                    else
                        $disable_link = '';
                    ?>
                    <li>
                        <a href="<?= base_url($arr['1']); ?>" <?= $disable_link ?> class="topItem">
                            <span><?= $item ?></span>
                        </a>
                        <?php
                        if (count($arr) > 2) {
                            ?>
                            <div class="sub-nav out-level">
                                <ul>
                                    <?php
                                    foreach ($arr as $id => $array) {
                                        if ($id == $arr['0']) {

                                            foreach ($array as $sub => $mass) {
                                                if (count($mass) > 1) {
                                                    ?>
                                                    <li class="downItem">
                                                        <a href="<?= base_url(); ?><?= $sub ?>" onclick="return false;" class="clearfix">
                                                            <span class="cabinet-nav-text"><?= $mass['0'] ?></span>
                                                            <span class="cabinet-nav-icon">
                                                                <i class="fa fa-angle-right"></i>
                                                            </span>
                                                        </a>
                                                        <div class="sub-nav inn-level">
                                                            <ul>
                                                                <?php
                                                                foreach ($mass as $k => $v) {
                                                                    if (is_array($v)) {
                                                                        foreach ($v as $key => $zn) {
                                                                            if ($key == 'account')
                                                                                $key = 'account/' . $user['id'];
                                                                            if ($key == 'company_info')
                                                                                $key = 'company_info/' . $user['id'];
                                                                            ?>
                                                                            <li>
                                                                                <a href="<?= base_url(); ?><?= $key ?>">
                                                                                    <span><?= $zn ?></span>
                                                                                </a>
                                                                            </li>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>                                                                        
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <?php
                                                } else {
                                                    if ($sub == 'account') {
                                                        $sub = 'account/' . $user['id'];
                                                    }
                                                    ?>                                           
                                                    <li>
                                                        <a href="<?= base_url(); ?><?= $sub ?>" class="clearfix">
                                                            <span class="cabinet-nav-text"><?= $mass['0'] ?></span>
                                                        </a>
                                                    </li>                                                            
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </nav>
        <!-- Cabinet Navigation End -->
    </div>

    <div class="bubblingG">
        <span id="bubblingG_1"></span>
        <span id="bubblingG_2"></span>
        <span id="bubblingG_3"></span>
    </div>

</header>