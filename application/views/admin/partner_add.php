<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить Партнера
                        <small>Add Partner</small>
                        <div class="pull-right col-lg-3 col-sm-auto">
                            <a href="<?= base_url('admin'); ?>/partner_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Партнера
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">                      
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/partners">Партнеры</a>
                        </li>                       

                        <li>
                            <i class="fa fa-file"></i>  Добавить Партнера
                        </li>                        
                    </ol>                    
                </div>                 
            </div>
            <div class='col-lg-4'>
                <form action='add_partner' method='POST' class="form-group" enctype="multipart/form-data">
                    <p>
                        <label for="prod_name">
                            Название <span class="required">*</span>
                        </label>
                        <input type="text" id="prod_name" name="name" class="form-control">
                    </p>
                    <p>
                        <label for="prod_link">
                            Ссылка <span class="required">*</span>
                        </label>
                        <input type="text" id="prod_link" name="link" class="form-control">
                    </p>
                    <p>
                        <label for="prod_photo">
                            Статус <span class="required">*</span>
                        </label>
                        <select class='form-control ' name='status'>
                            <option value='enable'>Показывать</option>
                            <option value='disable'>Скрывать</option>
                        </select>
                    </p>
                    <p>
                        <label for="prod_photo">
                            Логотип <span class="required">*</span>
                        </label>
                        <input type="file" id="prod_photo" name="logo"  accept="image/*">
                    </p>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_partner" value=""><i class="fa fa-save"></i> Сохранить</button>
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
