<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Категории товаров
                        <small>Category products</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Категории товаров
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
            <div class="pull-right col-lg-3 col-sm-auto">
                <a href="<?= base_url('admin'); ?>/category_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                    <span class="btn-label icon fa fa-plus"></span>
                    Добавить категорию 
                </a>
            </div>
            <div class="col-lg-12 tab_margin_top">               
                <form action="" method="POST" class="form-submit">
                    <table class='col-lg-12 table-bordered table-responsive table table-hover ' >
                        <tbody>
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
                        foreach ($cat_list as $item) {
                            if ($item['status'] == 'enable') {
                                $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                            } else {
                                $btn_name = '<i class = "fa fa-eye"></i> Показать';
                            }
                            ?>
                            <tr>
                                <td style="vertical-align: middle;"class="text-center"><?= $item['id'] ?></td>
                                <td style="vertical-align: middle;" class="text-center" ><h4><a href="<?= base_url('admin/edit_category/' . $item['id']) ?>"><?= $item['name'] ?></a></h4></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/edit_category/' . $item['id']) ?>">
                                        <img src='<?= $item['image_path'] ?>'  height="100" alt=""> 
                                    </a>
                                </td> 
                                <td>
                                    <a href="<?= base_url('admin') ?>/edit_category/<?= $item['id'] ?>"<button class="btn btn-success col-lg-12" type='button' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></a>
                                    <button class="btn btn-danger col-lg-12"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-trash-o"></i> Удалить</button> 
                                    <button class = "btn btn-default col-lg-12"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>"><?= $btn_name ?></button>
                                </td>   
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
