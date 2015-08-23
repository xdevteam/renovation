<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить пункт меню
                        <small>Add menu item </small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/main">Управление Меню</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>Добавить пункт меню
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-6 tab_margin_top " >               
                <form action="add_item_menu" method="POST" class="form-submit" enctype="multipart/form-data">
                    <input name='owner'  type='text'  value="user" hidden>
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="Например МОЙ КАБИНЕТ (Максимум 25 символов)" type='text'/>
                    <label>Статус</label>
                    <select class='form-control ' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    <input type='hidden' name="group" value='default'> 
                    <label>Ccылка</label>
                    <input class='form-control' name='link' placeholder="Например account (Максимум 25 символов)" type='text' id="page_url">

                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_item_menu" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
            </div> 
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


