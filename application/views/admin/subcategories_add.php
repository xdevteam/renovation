<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить подкатегорию
                        <small>Add focus product</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/subcategories">Подкатегории</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить подкатегорию
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="add_subcategory" method="POST" class="form-submit" enctype="multipart/form-data">
                    <label>Направление</label>
                    <select class='form-control' name='group' id="prod_group">
                        <option value="default">Выберите Группу</option>
                        <?php
                        foreach ($fpl as $item) {
                            ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Категория товара</label>
                    <select class='form-control' name='category' id="prod_cat">

                    </select>  
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="Например Отопление (Максимум 250 символов)" type='text'/>
                    <label>Ссылка</label>
                    <input class='form-control' name='link' placeholder="Например otoplenie (Максимум 50 символов)" type='text'/>                    
                    <label for="prod_photo">
                        Фото
                    </label>
                    <input type="file" id="prod_photo" name="prod_photo" accept="image/*">  
                    <label>Статус</label>
                    <select class='form-control ' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_subcategory" value=""><i class="fa fa-save"></i> Сохранить</button>
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

