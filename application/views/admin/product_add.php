<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить товар
                        <small>Add product</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/products">Товары</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить товар
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
            <form action="add_product" method="POST" class="form-submit dynamic" enctype="multipart/form-data">
                <div class="col-lg-6 tab_margin_top"> 
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="Например Отопление (Максимум 250 символов)" type='text'/>
                    <label>Группа товара</label>
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
                    <select class='form-control' name='cat_id' id="prod_cat">

                    </select>
                    <label>Подкатегория товара</label>
                    <select class='form-control' name='subcat_id' id="prod_subcat">

                    </select>
                    <label>Статус</label>
                    <select class='form-control ' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    <p>
                        <label for="param">
                            Характеристики <span class="required">*</span>
                            <table class="table table-bordered">
                                <tbody>
                                    <thead>
                                        <th>Параметр</th>
                                        <th>Значение</th>
                                    </thead>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                        <td><input type="text" name="param[]" class='form-control'></td>
                                    </tr>
                                </tbody>
                            </table>
                        </label>
                    </p>
                    
                </div>

                <div class="col-lg-6 tab_margin_top">   
                   
                    <label>Загрузить PDF документ</label>
                    <div class="">                   
                        <input type="file" id="interior_img" name="pdf" class="form-control">    
                    </div>
                    <label>Размер</label>
                    <div class="">                   
                        <input type="text" id="size" name="size" class="form-control">
                    </div>
                    <label>Цвет</label>
                    <div class="">                   
                        <input type="text" id="color" name="color" class="form-control">                           
                    </div>
                    <label>Mощность</label>
                    <div class="">                   
                        <input type="text" id="power" name="power"  class="form-control">                           
                    </div>
                    <p>                    
                        <label>Главное Фото</label>
                    <div class="">     
                        <input type="file" id="main_photo" name="main_photo" accept="image/*" class="form-control">
                    </div>
                    <div class="">
                        <label>Минимальный заказ</label>
                        <div class="">                   
                            <input type="text" id="size" name="prod_quantity" value="" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label>Цена</label>
                        <div class="">                   
                            <input type="text" id="size" name="price" value="" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label>Валюта</label>
                        <div class="">                   
                            <select type="text" id="size" name="currency" value="" class="form-control">
                                <option value="Грн.">Грн.</option>
                                <option value="Руб.">Руб.</option>
                                <option value="USD">USD</option>                                
                            </select>
                        </div>
                    </div>
                    <label>Дополнительные Фото</label>
                    <div class="">                   
                        <input type="file" id="prod_photo_0" name="prod_photo[0]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_1" name="prod_photo[1]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_2" name="prod_photo[2]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_3" name="prod_photo[3]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_4" name="prod_photo[4]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_5" name="prod_photo[5]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_6" name="prod_photo[6]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_7" name="prod_photo[3]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_8" name="prod_photo[4]" accept="image/*" class="form-control">
                        <input type="file" id="prod_photo_9" name="prod_photo[5]" accept="image/*" class="form-control">                        
                    </div>
                    <label>Фото размеров</label>
                    <div class="">                   
                        <input type="file" id="size" name="size_img" accept="image/*" class="form-control">    
                    </div>
                    
                    <label>Путь к Видеообзору</label>
                    <div class="">                   
                        <input type="text" id="video_path" name="video_path" class="form-control">   

                    </div>
                    </p>
                </div>        
                <div class="col-lg-12">
                     <p>
                        <label for="description">
                            Описание <span class="required">*</span>
                        </label>
                        <textarea class="cabinet-form-input" name="description" id="prod_description" cols="15" rows="6"></textarea>  
                        <script type="text/javascript">
                            CKEDITOR.replace('prod_description');
                        </script>
                    </p>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_product" value=""><i class="fa fa-save"></i> Сохранить</button>
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


