<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                         Группы товаров
                        <small>Group product</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Группы товаров
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
<!--            <div class="pull-right col-lg-3 col-sm-auto">
                <a href="<?= base_url('admin'); ?>/focus_product_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                    <span class="btn-label icon fa fa-plus"></span>
                    Добавить направление
                </a>
            </div>            -->
            <div class="col-lg-12 tab_margin_top">               
                <form action="" method="POST" class="form-submit">
                    <table class='col-lg-12 table-bordered table-responsive table'>
                        <tbody>
                        <thead>
                        <th>
                            #id
                        </th>
                        <th class='col-lg-8'>
                            Название
                        </th>                        
                        <th class='col-lg-1'>
                            Редактировать
                        </th>  
                        <th class='col-lg-1'>
                            Удалить
                        <th class='col-lg-1'>                    
                            Скрыть
                        </th>  
                        </thead>  
                        <?php
                        $count = count($fpl);
                        if ($count <= 3) {
                            $disable = 'disabled';
                        }else{
                            $disable='';
                        }
                        foreach ($fpl as $item) {
                            if ($item['status'] == 'enable') {
                                $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                            } else {
                                $btn_name = '<i class = "fa fa-eye"></i> Показать';
                            }
                            ?>
                            <tr>
                                <td><?= $item['id'] ?> <input class="" type='checkbox' name="id[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"/></td>
                                <td><input class="form-control" type='text' name="fp[<?= $item['id'] ?>]" value="<?= $item['name'] ?>"/></td>                                
                                <td><button class="btn btn-success" type='submit' name="edit_fp[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></td>                                
                                <td><button class="btn btn-danger"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>" <?= $disable ?>><i class="fa fa-trash-o"></i> Удалить</button></td>
                                <td><button class = "btn btn-default"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>" <?= $disable ?>><?= $btn_name ?></button></td>   
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

