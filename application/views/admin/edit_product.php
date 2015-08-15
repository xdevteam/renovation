<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Редактироватьть товар
                        <small>Edit product</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/products">Товары</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Редактироватьть товар
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
            <?php $param = unserialize($prod[0]['parametr']); ?>
            <form action="<?= base_url('admin/prod_edit') ?>" method="POST" class="form-submit dynamic" enctype="multipart/form-data">
                <div class="col-lg-6 tab_margin_top"> 
                    <label>Название</label>
                    <input class='form-control' value="<?= $prod[0]['name'] ?>" name='name' type='text'/>
                    <input class='form-control' value="<?= $prod[0]['id'] ?>" name='id' type='hidden'/>
                    <label>Подкатегория товара</label>
                    <select class='form-control' name='subcat_id' id="prod_subcat">
                        <?php
                        foreach ($all_subcat as $item) {
                            if ($item['id'] == $prod[0]['subcat_id']) {
                                ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        foreach ($all_subcat as $item) {
                            if ($item['id'] != $prod[0]['id']) {
                                ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="">
                        <label>Размер</label>
                        <div class="">                   
                            <input type="text" id="size" name="size" value="<?= $prod[0]['size'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label>Цвет</label>
                        <div class="">                   
                            <input type="text" id="color" value="<?= $prod[0]['color'] ?>" name="color" class="form-control">                           
                        </div>
                    </div>
                    <div class="">
                        <label>Mощность</label>
                        <div class="">                   
                            <input type="text" id="power" value="<?= $prod[0]['power'] ?>"  name="power"  class="form-control">                           
                        </div>
                    </div>
                    <p>
                        <label for="param">
                            Характеристики <span class="required">*</span>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Тип вентилятора</td>
                                        <td><input type="text" name="param[]"  value="<?= $param[0] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Размер</td>
                                        <td><input type="text" name="param[]" value="<?= $param[1] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Продуктивность</td>
                                        <td><input type="text" name="param[]" value="<?= $param[2] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Потребляемая мощность</td>
                                        <td><input type="text" name="param[]" value="<?= $param[3] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Класс защиты</td>
                                        <td><input type="text" name="param[]" value="<?= $param[4] ?>"  class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Управление</td>
                                        <td><input type="text" name="param[]" value="<?= $param[5] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Фильтр</td>
                                        <td><input type="text" name="param[]"  value="<?= $param[6] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Освещение</td>
                                        <td><input type="text" name="param[]" value="<?= $param[7] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Вес</td>
                                        <td><input type="text" name="param[]" value="<?= $param[8] ?>" class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <td>Уровень шума</td>
                                        <td><input type="text" name="param[]" value="<?= $param[9] ?>" class='form-control'></td>
                                    </tr>
                                </tbody>
                            </table>
                        </label>
                    </p>

                </div>

                <div class="col-lg-6 tab_margin_top">   
                    <p>
                        <label for="description">
                            Описание <span class="required">*</span>
                        </label>
                        <textarea class="cabinet-form-input" name="description" id="prod_description" cols="15" rows="10"><?= $prod[0]['description'] ?></textarea>                   
                        <script type="text/javascript">
                            CKEDITOR.replace('prod_description');
                        </script>
                    </p>
                    <div class="">
                        <label>Путь к Видеообзору</label>
                        <div class=" ">                   
                            <input type="text" id="video_path" name="video_path" value="<?= $prod[0]['video_path'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12 tab_margin_top">
                        <div class="col-lg-12">  
                            <label>Загрузить PDF документ</label>
                        </div>
                        <div class="col-lg-4"> 
                            <?if(!empty($prod[0]['pdf_path'])){ ?>
                            <a href="<?= $prod[0]['pdf_path'] ?>">
                                <img src="../../../images/pdf.png"  class="img-thumbnail">
                            </a>
                            <?}?>
                        </div>
                        <div class="col-lg-8">                   
                            <input type="file" id="interior_img"  name="pdf" class="form-control"> 
                            <?if(!empty($prod[0]['pdf_path'])){ ?>
                            <button class="btn btn-danger col-lg-12 tab_margin_top" type="submit" value="<?= $prod[0]['id'] ?>" name="del_pdf_path">
                                <i class="fa fa-trash-o"></i> Удалить
                            </button>
                            <?}?>
                            <input type="hidden" id="old_pdf_path" name="old_pdf_path" value="<?= $prod[0]['pdf_path'] ?>">
                        </div>
                    </div>



                </div>  
                <div class="col-lg-12 tab_margin_top">  
                    <div class="col-lg-4 " >
                        <div  style="height: 269px;">
                            <label>Главное Фото</label><br>
                            <?if(!empty($prod[0]['image_path'])){ ?>
                            <img src="<?= $prod[0]['image_path'] ?>" alt="" height="180">
                            <button class="btn btn-danger col-lg-7 tab_margin_top" type="submit" value="<?= $prod[0]['id'] ?>" name="del_image_path">
                                <i class="fa fa-trash-o"></i> Удалить
                            </button>
                            <?}?> 
                        </div>
                        <div class="tab_margin_top col-lg-12" >

                            <input type="file" id="main_photo" name="main_photo" accept="image/*" class="form-control col-lg-12 ">
                            <input type="hidden" id="old_image_path" name="old_image_path" value="<?= $prod[0]['image_path'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div  style="height: 269px;">
                            <label>Фото размеров</label><br>
                            <?if(!empty($prod[0]['size_img'])){ ?>
                            <img src="<?= $prod[0]['size_img'] ?>" alt="" height="180">
                            <button class="btn btn-danger col-lg-7 tab_margin_top" type="submit" value="<?= $prod[0]['id'] ?>" name="del_size_img"><i class="fa fa-trash-o"></i> Удалить</button>
                            <?}?>
                        </div>
                        <div class="tab_margin_top col-lg-12">                   
                            <input type="file" id="size" name="size_img" accept="image/*" class="form-control col-lg-12 ">    
                            <input type="hidden" id="old_size_img" name="old_size_img" value="<?= $prod[0]['size_img'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div  style="height: 269px;">
                            <label>Фото в интерьере</label><br>
                            <?if(!empty($prod[0]['interior_img'])){ ?>
                            <img src="<?= $prod[0]['interior_img'] ?>" alt="" height="180">
                            <button class="btn btn-danger col-lg-7 tab_margin_top" type="submit" value="<?= $prod[0]['id'] ?>" name="del_interior_img"><i class="fa fa-trash-o"></i> Удалить</button>
                            <?}?>
                        </div>
                        <div class="tab_margin_top col-lg-12">                   
                            <input type="file" id="interior_img" name="interior_img" accept="image/*" class="form-control col-lg-12 ">
                            <input type="hidden" id="old_interior_img" name="old_interior_img" value="<?= $prod[0]['interior_img'] ?>">
                        </div> 
                    </div>   
                    <div class="tab_margin_top col-lg-12">
                        <label>Дополнительные Фото</label>                          
                        <table class="table table-bordered col-lg-12">
                            <tbody>
                            <thead>
                            <th >Фото</th>
                            <th class="col-lg-8">Загрузить новое</th>
                            <th class="col-lg-2">Операции</th>
                            </thead>
                            <?php
                            $min = unserialize($prod[0]['min_img']);
                            if (!empty($min)) {
                                foreach ($min as $k => $v) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?= $v ?>" alt="" width="100">
                                        </td>
                                        <td>
                                            <input type="file" id="prod_photo_<?= $k ?>" name="prod_photo[<?= $k ?>]" accept="image/*" class="form-control">
                                            <input type="hidden" id="old_photo_<?= $k ?>" name="old_min_path[<?= $k ?>]"value="<?= $v ?>">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger col-lg-12" type="submit" value="<?= $k ?>" name="del_min[<?= $k ?>]"><i class="fa fa-trash-o"></i> Удалить</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $count_min = count($min);
                            } else {
                                $count_min = 1;
                            }
                            if ($count_min > 0) {
                                for ($i = $count_min; $i < 10; $i++) {
                                    ?>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input type="file" id="prod_photo_<?= $i + 1 ?>" name="prod_photo[<?= $i + 1 ?>]" accept="image/*" class="form-control">
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>                          
                    </div>
                    <div class='col-lg-12 tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="edit_product" value=""><i class="fa fa-save"></i> Сохранить</button>
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


