<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить пользователя
                        <small>Add user</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/users">Пользователи</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить пользователя
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="<?=base_url('admin/add_user')?>" method="POST" class="form-submit"enctype="multipart/form-data" >
                    <label>Тип</label>
                    <select class='form-control' name='user_type'>
                        <option value="admin">Администратор</option>
                        <option value="cm">Контент менеджер</option>
                        <option value="bloger">Блогер</option>
                    </select>
                    <label>Имя</label>
                    <input class='form-control' name='name' placeholder="Например Андрей (Максимум 50 символов)" type='text'/>
                    <label>Фамилия</label>
                    <input class='form-control' name='surname' placeholder="Например Иванов (Максимум 50 символов)" type='text'/>
                    <label>Отчество</label>
                    <input class='form-control' name='patronymic' placeholder="Например Александрович (Максимум 50 символов)" type='text'/>
                    <label>Логин(Email)</label>
                    <input class='form-control' name='email' placeholder="Например eleyus@gmail.com (Максимум 50 символов)" type='text'/>
                    <label>Пароль</label>
                    <input class='form-control' name='password' placeholder="Например eleyus12345 (Максимум 16 символов)" type='text'/>
                    <label>Телефон</label>
                    <input class='form-control' name='phone' placeholder="Например 380938246066 (Максимум 12 символов)" type='text'/>
                    
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit'  value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->




