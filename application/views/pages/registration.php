<!-- Page title -->

<div class="page-title">
    <div class="wf-wrap">

        <div class="wf-table">
            <div class="wf-td hgroup">
                <h1>Регистрация</h1>
            </div>
            <div class="wf-td">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>registration">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- Page title End -->

<!-- Animation -->

 <div class="bubblingG registrBubbling">
	<span id="bubblingG_1"></span>
	<span id="bubblingG_2"></span>
	<span id="bubblingG_3"></span>
</div>

<!-- Animation  End -->

<!-- Main Content -->

<div id="main">

    <div class="container wf-wrap">
        <div class="row">

            <div class="form-container">
                <form name="registform" action="" method="POST" class="validate-form">

                    <legend>Зарегистрироваться как</legend>

                    <div class="btn-group validate-form-tabs" data-toggle="buttons" id="chooseRole">
                        <label class="btn active">
                            <input type="radio" name="usercat" id="buyer" autocomplete="off" checked value="buyer"> Покупатель
                        </label>
                        <label class="btn">
                            <input type="radio" name="usercat" id="seller" autocomplete="off" value="seller"> Продавец
                        </label>
                    </div>

                    <div class="form-fields">

                        <!-- Buyer Set -->
                        <div class="buyer-set">

                            <h4>Персональные данные</h4>

                            <span class="form-name">
                                <input type="text" class="validate" data-validate="w" placeholder="Фамилия *" name="surname">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" class="validate" data-validate="w" placeholder="Имя *" name="name">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" placeholder="Отчество" name="patronymic">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" class="validate" data-validate="e" placeholder="E-mail *" name="email">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" class="validate" data-validate="p" placeholder="Телефон *" name="phone">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="password" class="validate" data-validate="wn" placeholder="Пароль * (минимум 8 символов)" name="password">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="password" class="validate" data-validate="re" placeholder="Повторите пароль *" name="password_repeat">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>

                            <p>
                                <label for="country">Страна</label>
                                <select class="cabinet-form-input" name="country" id="country">
                                    <option value="Украина">Украина</option>
                                    <option value="Россия">Россия</option>
                                    <option value="США">США</option>
                                    <!-- AJAX or foreach -->
                                </select>
                            </p>
                            <p>
                                <label for="location">Область</label>
                                <select class="cabinet-form-input" name="location" id="location" data-ajax="region" rel="registr-buyer">
                                     <option value="default">Выберите Область</option>
                                    <?php
                                    foreach($location as $k) {
                                        ?>
                                        <option value="<?=$k['id']?>"><?=$k['name']?></option> 
                                        <?php
                                    }
                                    ?>                               
                                </select>
                                <label for="city">Город</label>
                                <select class="cabinet-form-input" name="city" id="city" rel="registr-buyer-city">
                                     <option value="default">Выберите Населенный Пункт</option> 
                                </select>
                            </p>

                            <p class="form-name">
                                <input type="text" placeholder="Улица" name="street" id="street">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </p>
                            <p class="form-name">
                                <input type="text" placeholder="Дом" name="building" id="building">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </p>

                        </div>
                        <!-- Buyer set End -->

                    </div>

                    <div class="form-fields">

                        <!-- Seller Set -->
                        <div class="seller-set">

                            <h4>Информация о компании</h4>

                            <span class="form-name">
                                <input type="text" class="validate" data-validate="any" placeholder="Название компании *" name="company">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" class="validate" data-validate="e" placeholder="Email компании *" name="company_email">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" class="validate" data-validate="p" placeholder="Телефон компании *" name="company_phone">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <span class="form-name">
                                <input type="text" placeholder="Дополнительные телефон" name="company_phone_more">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </span>
                            <p>
                                <label for="company_country">Страна</label>
                                <select class="cabinet-form-input" name="company_country" id="company_country">
                                    <option value="Украина">Украина</option>
                                    <option value="Россия">Россия</option>
                                    <option value="США">США</option>
                                </select>
                            </p>
                            <p>
                                <label for="company_location">Область</label>
                                <select class="cabinet-form-input" name="company_location" id="company_location" data-ajax="region" rel="registr-seller">
                                    <option value="default">Выберите Область</option> 
                                    <?php
                                    foreach($location as $k) {
                                        ?>
                                        <option value="<?=$k['id']?>"><?=$k['name']?></option> 
                                        <?php
                                    }
                                    ?>                               
                                </select>
							</p>
							<p>
                                <label for="company_city">Город</label>
                                <select class="cabinet-form-input" name="company_city" id="company_city" rel="registr-seller-city">
                                    <option value="default">Выберите Населенный Пункт</option> 
                                </select>
                            </p>
                            <p class="form-name">
                                <input type="text" placeholder="Улица" name="company_street">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </p>
                            <p class="form-name">
                                <input type="text" placeholder="Дом" name="company_building">
                                <span class="form-icon">
                                    <i class="fa"></i>
                                </span>
                            </p>

                        </div>
                        <!-- Seller set End -->

                    </div>   

                    <p>
                        <span class="form-submit">
                            <input type="button" name="register" value="Зарегистрироваться" class="validate-submit">                            
                        </span>                        
                    </p>
                </form>
				
				<!-- Response -->
				
				<div class="alert alert-success" role="alert" id="registrResponseSuccess">
					<strong>Регистрация прошла успешно, спасибо!</strong>
				</div>
				<div class="alert alert-danger" role="alert" id="registrResponseDanger">
					<strong>Ошибка при регистрации. Такой Email уже зарегистрирован</strong>
				</div>
				
				<!-- Response End -->
				
            </div>

        </div>

        <hr>


    </div>
</div>
<!-- Main Content End -->


