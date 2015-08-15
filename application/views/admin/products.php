<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Товары
                        <small>Products</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Товары
                        </li>
                    </ol>                    
                </div>                 
            </div>

            <!-- Menu -->

            <div class="row well" id="prod-nav-bar">

                <!-- Filters -->
                <form action='subcat' method='POST'/>
                <div class="col-sm-9 prod-nav-filters">

                    <div class="col-sm-12">
                        <h2 class="col-sm-12 prod-nav-head">Фильтры</h2>
                    </div>

                    <div class="col-sm-5">
                        <h4>Категория</h4>
                        <select id="_prod_cat" class="form-control ajax-first-select">
                            <option value="default">Выберите категорию</option>
                            <?php
                            foreach ($category as $item) {
                                ?>
                                <option value = "<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-5">
                        <h4>Подкатегория</h4>
                        <select id="_prod_subcat" class="form-control ajax-second-select" name='subcat_id' disabled="disabled"></select>
                    </div>

                    <div class="col-sm-2">
                        <input type="submit" id="prod-nav-apply" name='filter' class="btn btn-success" value="Применить"> 
                    </div>

                </div>
                </form>

                <div class="pull-right col-lg-3 col-sm-auto">
                    <a href="<?= base_url('admin'); ?>/product_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                        <span class="btn-label icon fa fa-plus"></span>
                        Добавить товар
                    </a>
                </div>
            </div>


            <!-- Menu end -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="" method="POST" class="form-submit" enctype="multipart/form-data">
                    <table class='col-lg-12 table-bordered table-responsive table table-hover ' >
                        <tbody >
                        <thead>
                        <th >
                            #id
                        </th>
                        <th class='col-lg-6'>
                            Название
                        </th>
                        <th class='col-lg-3'>
                            Фото
                        </th>  
                        <th class='col-lg-3'>
                            Операции
                        </th> 
                        </thead>
                        <?php
                        if (!empty($list)) {
                            foreach ($list as $item) {
                                if ($item['status'] == 'enable') {
                                    $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                                } else {
                                    $btn_name = '<i class = "fa fa-eye"></i> Показать';
                                }
                                ?>
                                <tr>
                                    <td style="vertical-align: middle;"class="text-center"><?= $item['id'] ?></td>
                                    <td style="vertical-align: middle;" class="text-center" ><h4><a href="<?= base_url('admin/edit_product/' . $item['id']) ?>"><?= $item['name'] ?></a></h4></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/edit_product/' . $item['id']) ?>">
                                            <img src='<?= $item['image_path'] ?>'  height="100"  alt=""> 
                                        </a>
                                    </td>                            

                                    <td><a href="<?= base_url('admin/edit_product/' . $item['id']) ?>"<button class="btn btn-success col-lg-12" type='button' ><i class="fa fa-pencil"></i> Редактировать</button></a>
                                        <button class="btn btn-danger col-lg-12"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-trash-o"></i> Удалить</button>
                                        <button class = "btn btn-default col-lg-12"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>"><?= $btn_name ?></button></td>   
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>


            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

