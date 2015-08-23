<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row ">  
                <div class="col-lg-12">
                    <div class="pull-left col-lg-12 col-sm-auto">
                        <h1 class="page-header">
                            Слайдер
                            <small>Slider</small>

                            <div class="pull-right col-lg-4 col-sm-auto">
                                <a href="<?= base_url('admin'); ?>/slide_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                    <span class="btn-label icon fa fa-plus"></span>
                                    Добавить изображение в слайдер
                                </a>
                            </div>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>Слайдер
                            </li>                        
                        </ol>          
                    </div> 
                </div> 
            </div> 
            <form action="<?= base_url('admin') . '/slider' ?>" method="POST"  class="form-submit validate-form" enctype="multipart/form-data">

                <div class='form-container col-lg-10'>
                    <div class='col-lg-3'>
                        <h5><label>Загружается Первым:</label></h5>
                    </div>
                    <div class='col-lg-5'>                        
                        <select class='form-control ' name="act" id='slider_adm'>
                            <?php
                            foreach ($slider as $item) {
                                if ($item['act'] == '1') {
                                    ?>
                                    <option  value="<?= $item['id'] ?>">Картинка с ID: <?= $item['id'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            foreach ($slider as $item) {
                                if ($item['act'] != '1' && $item['status'] != 'disable') {
                                    ?>
                                    <option value="<?= $item['id'] ?>">Картинка с ID: <?= $item['id'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class='col-lg-3'>
                        <input type='submit' value='Применить' name="first" class='btn btn- btn-info '>
                    </div>
                </div>
                <?php
                foreach ($slider as $item) {
                    ?>
                    <table class='col-lg-6 table-bordered table-responsive table tab_margin_top'>
                        <tbody>
                        <thead>
                        <th>
                            #id
                        </th>
                        <th class='col-lg-3'>
                            Картинка
                        </th>    
                        <th class='col-lg-3'>
                            Заглавие
                        </th>                       

                        <th class='col-lg-2'>
                            Эффект слайдера
                        </th>                   
                        <th class='col-lg-1'>                   
                            Операции
                        </th>  
                        </thead>  
                        <?php
                        if ($item['status'] == 'enable') {
                            $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                        } else {
                            $btn_name = '<i class = "fa fa-eye"></i> Показать';
                        }
                        if ($item['act'] == '1') {
                            $status = 'disabled';
                        } else {
                            $status = '';
                        }
                        ?>      
                        <tr>                                  
                            <td><?= $item['id'] ?></td>
                            <td><img src='<?= $item['path'] ?>' alt='' class='col-lg-12'></td>
                            <td>
                                <label>Первое(белый)</label>
                                <input class="form-control" type="text" value="<?= $item['header1'] ?>" name="name[<?= $item['id'] ?>]"> 
                                <label>Второе(синий)</label>
                                <input class="form-control" type="text" value="<?= $item['header2'] ?>" name="name2[<?= $item['id'] ?>]">
                            </td>  

                            <td>
                                <select name="position[<?= $item['id'] ?>]" class="form-control">
                                    <?php if ($item['position'] == 'style2') { ?>
                                        <option value="style2">Эффект 2</option>
                                        <option value="style1">Эффект 1</option>
                                        <option value="style3">Эффект 3</option>
                                    <?php } elseif ($item['position'] == 'style1') { ?>                                      
                                        <option value="style1">Эффект 1</option> 
                                        <option value="style2">Эффект 2</option>
                                        <option value="style3">Эффект 3</option>                                                                          
                                    <?php } elseif ($item['position'] == 'style3') { ?>
                                        <option value="style3">Эффект 3</option>         
                                        <option value="style1">Эффект 1</option> 
                                        <option value="style2">Эффект 2</option>
                                    <?php }
                                    ?>
                                </select>
                            </td>
                            <td><button class="btn btn-success col-lg-12" type='submit' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button>
                                <button class="btn btn-danger col-lg-12"type='submit' name="delete[<?= $item['id'] ?>]" <?= $status ?> value="<?= $item['id'] ?>" ><i class="fa fa-trash-o"></i> Удалить</button>
                                <button class = "btn btn-default col-lg-12"type = 'submit' name = "status[<?= $item['id'] ?>]" <?= $status ?> value = "<?= $item['status'] ?>"><?= $btn_name ?></button></td>   
                        </tr>                        
                        </tbody>
                    </table>
                    <div class="col-lg-12">  
                        <label for="slide_<?= $item['id'] ?>">Описание <span class="required">*</span></label>
                        <textarea rows='10' cols="15" class="form-control" id="slide_<?= $item['id'] ?>" name="text[<?= $item['id'] ?>]"><?= $item['text'] ?></textarea>                       
                        <script type="text/javascript">
                            CKEDITOR.replace('slide_<?= $item['id'] ?>');
                        </script>
                    </div>
                   
                <?php } ?>
            </form>
        </div> 
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



