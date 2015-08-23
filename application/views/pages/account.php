<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap">


        <div class="row">

            <!-- Cabinet Content -->
            <section id="cabinet-content" class="clearfix">

                <h2 class="cabinetHead">Персональные данные</h2>

                <!-- Account -->
                <form id="cabinet-my-account" class="form-submit clearfix" action="<?= base_url() ?>edit_user_data" method="POST" enctype="multipart/form-data">

                    <div class="col-sm-6">
                        <p>
                            <label for="account_name">Имя</label>
                            <input type="hidden" value="<?= $user_data['id'] ?>" id="company_name" name="id" class="cabinet-form-input" >
                            <input type="text" value="<?= $user_data['name'] ?>" id="account_name" name="account_name" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="account_surname">Фамилия</label>
                            <input type="text" value="<?= $user_data['surname'] ?>" id="account_surname" name="account_surname" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="account_patronymic">Отчество</label>
                            <input type="text" value="<?= $user_data['patronymic'] ?>" id="account_patronymic" name="account_patronymic" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="account_email">Email</label>
                            <input type="text" value="<?= $user_data['email'] ?>" id="account_email" name="account_email" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="account_phone">Телефон</label>
                            <input type="text" value="<?= $user_data['phone'] ?>" id="account_phone" name="account_phone" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="account_country">Страна</label>
                            <select class="cabinet-form-input" id="account_country" name="account_country" data-map="country">
                                <option value="<?= $user_data['country'] ?>"><?= $user_data['country'] ?></option>
                            </select>
                        </p>
                        <p>
                            <label for="location">Область</label>
                            <select class="cabinet-form-input" name="location" id="location" data-ajax="region" rel="account">                                
                                <?php
                                foreach ($location as $k) {
                                    if ($user_data['location'] == $k['name']) {
                                        ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                                        <?php
                                    }
                                }
                                foreach ($location as $k) {
                                    if ($user_data['location'] != $k['name']) {
                                        ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option> 
                                        <?php
                                    }
                                }
                                ?>                               
                            </select>
                        </p>
                        <p>
                            <label for="city">Город</label>
                            <select id="city" name="city" class="cabinet-form-input" data-map="city" rel="city-account">
                                <option val='<?= $user_data['city'] ?>'><?= $user_data['city'] ?></option>
                            </select>
                        </p>

                        <p>
                            <label for="account_street">Улица</label>
                            <input type="text" value="<?= $user_data['street'] ?>" id="account_street" name="account_street" class="cabinet-form-input" data-map="street">
                        </p>
                        <p>
                            <label for="account_building">Дом</label>
                            <input type="text" value="<?= $user_data['building'] ?>" id="account_building" name="account_building" class="cabinet-form-input" data-map="building">
                        </p>

                        <hr>

                        <p>
                            <span class="form-submit">
                                <input type="submit" name="account_submit" id="account_submit" value="Сохранить">
                            </span>
                        </p>
                    </div>

                    <div class="col-sm-6">

                        <p>
                            <label>Ваше местоположение на карте</label>
                        <div id="map"></div>
                        </p>

                    </div>

                </form>
                <!-- Account End -->

            </section>
            <!-- Cabinet Content End -->

        </div>

        <hr>

    </div>
</div>

<!-- Main Content End -->


