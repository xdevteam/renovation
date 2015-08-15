<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap">
        <div class="row">

            <!-- Cabinet Content -->
            <section id="cabinet-content" class="clearfix">

                <h2 class="cabinetHead">Информация о компании</h2>

                <form id="cabinet-company-info" class="form-submit clearfix" action="<?=base_url()?>edit_company_data" method="POST" enctype="multipart/form-data">

                    <div class="col-sm-6">

                        <p>
                            <label for="company_name">Название компании</label>
                            <input type="hidden" value="<?= $user_data['id'] ?>" id="company_name" name="company_id" class="cabinet-form-input" >
                            <input type="text" value="<?= $user_data['company'] ?>" id="company_name" name="company_name" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="company_email">Email компании</label>
                            <input type="text" value="<?= $user_data['email'] ?>" id="company_email" name="company_email" class="cabinet-form-input">
                        </p>
                        <p>
                            <label for="company_phone">Телефон компании</label>
                            <input type="text" value="<?= $user_data['phone'] ?>" id="company_phone" name="company_phone" class="cabinet-form-input">
                        </p>                      
                        <p>
                            <label for="company_phone_more">Дополнительный телефон</label>
                            <input type="text" value="<?= $user_data['phone_more'] ?>" id="company_phone_more" name="company_phone_more" class="cabinet-form-input">
                        </p>                       
                        <p>
                            <label for="company_country">Страна</label>
                            <select class="cabinet-form-input" id="company_country" name="company_country" data-map="country">
                                <option value="<?= $user_data['country'] ?>"><?= $user_data['country'] ?></option>
                                
                                <!-- AJAX ? -->
                            </select>
                        </p>
                        <p>
                            <label for="location">Область</label>
                            <select class="cabinet-form-input" name="location" id="location" data-ajax="region" rel="company_info">                                
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
                            <select id="city" name="city" class="cabinet-form-input" data-map="city" rel="company_info_city">
                                <option value="<?= $user_data['city'] ?>"><?= $user_data['city'] ?></option>                                
                            </select>
                        </p>
                        <p>
                            <label for="company_street">Улица</label>
                            <input type="text" value="<?= $user_data['street'] ?>" id="company_street" name="company_street" class="cabinet-form-input" data-map="street">
                        </p>
                        <p>
                            <label for="company_building">Дом</label>
                            <input type="text" value="<?= $user_data['building'] ?>" id="company_building" name="company_building" class="cabinet-form-input" data-map="building">
                        </p>

                        <hr>

                        <p>
                            <span class="form-submit">
                                <input type="submit" name="company_submit" id="company_submit" value="Сохранить">
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

            </section>

        </div>
    </div>

</div>