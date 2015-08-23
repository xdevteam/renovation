<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Партнеры
                        <small>Partners</small>
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
                            <i class="fa fa-file"></i>  Партнеры
                        </li>                        
                    </ol>                    
                </div>                 
            </div>
            <form action="<?= base_url('admin/partners') ?>" method="POST">
                <table class='col-lg-12 table-bordered table-responsive table'>
                    <tbody>
                    <thead>
                    <th>
                        #id
                    </th>
                    <th class='col-lg-5'>
                        Название
                    </th>  
                    <th >
                        Логотип
                    </th> 
                    <th class='col-lg-4'>
                        Ссылка
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
                    foreach ($partner as $item) {
                        if ($item['status'] == 'enable') {
                            $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                        } else {
                            $btn_name = '<i class = "fa fa-eye"></i> Показать';
                        }
                        ?>
                        <tr>
                            <td>
                                <?= $item['id'] ?> <input class="" type='checkbox' name="id[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"/>                               
                            </td>
                            <td>
                                <input class="form-control" type='text' name="name[<?= $item['id'] ?>]" value="<?= $item['name'] ?>"/>                               
                            </td>
                            <td>
                                <img src="<?= $item['logo'] ?>" width='100' alt="">                       
                            </td>
                            <td><input class="form-control" type='text' name="link[<?= $item['id'] ?>]" value="<?= $item['link'] ?>"/></td>               
                            <td><button class="btn btn-success" type='submit' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></td>
                            <td><button class="btn btn-danger"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-trash-o"></i> Удалить</button></td>
                            <td><button class = "btn btn-default"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>"><?= $btn_name ?></button></td>   
                        </tr>
                        <?php
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

