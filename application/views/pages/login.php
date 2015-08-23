<!-- Page title -->

<div class="page-title">
    <div class="wf-wrap">

        <div class="wf-table">
            <div class="wf-td hgroup">
                <h1>Вход</h1>
            </div>
            <div class="wf-td">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>login">Вход</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Page title -->

<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap">
        <div class="row">

            <div class="form-container">
                <form name="loginform" method="POST" class="validate-form">
                    <div class="form-fields">
                        <span class="form-name">
                            <input type="text" class="validate" data-validate="e" placeholder="E-mail *" name="email">
							<span class="form-icon">
								<i class="fa"></i>
							</span>
                        </span>
                        <span class="form-name">
                            <input type="text" class="validate" data-validate="wn" placeholder="Пароль *" name="password">
							<span class="form-icon">
								<i class="fa"></i>
							</span>
                        </span>
                    </div>
					<!--
                    <p class="remember-me">
                        <label>
                            <input name="rememberme" type="checkbox" id="rememberme" value="">
                            Запомнить меня
                        </label>
                    </p>
					-->
					<p class="forgot">
						<a href="" data-toggle="modal" data-target="#forgotModal">
							<span>Забыли пароль?</span>
						</a>
					</p>
					
                    <p>
                        <span class="form-submit">
                            <input type="submit" name="login" value="Войти" class="validate-submit">
                        </span>
                    </p>
                </form>
            </div>

        </div>

        <hr>

    </div>
</div>

<!-- Main Content End -->

