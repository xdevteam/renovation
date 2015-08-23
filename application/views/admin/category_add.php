<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить категорию
                        <small>Add category</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/category">Категории</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить категорию
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="add_category" method="POST" class="form-submit"enctype="multipart/form-data" >
                    <label>Направление</label>
                    <select class='form-control' name='focus_product'>
                        <?php
                        foreach ($fpl as $item) {
                            ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="Например Отопление (Максимум 250 символов)" type='text'/>
                    <label>Ссылка</label>
                    <input class='form-control' name='link' placeholder="Например otoplenie (Максимум 50 символов)" type='text'/>                   
                    <label>Статус</label>
                    <select class='form-control ' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    <p>
                        <label for="description">
                            Описание <span class="required">*</span>
                        </label>
                        <textarea class="cabinet-form-input" name="description" id="prod_description" cols="15" rows="6"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('prod_description');
                        </script>
                    </p>

                    <p>
                        <label for="prod_photo">
                            Фото
                        </label>
                        <input type="file" id="prod_photo_1" name="prod_photo" accept="image/*">                       
                    </p>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_category" value=""><i class="fa fa-save"></i> Сохранить</button>
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




