<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Комментарии
                        <small>Comments</small>
                        <div class="pull-right col-lg-3 col-sm-auto">
                            <a href="<?= base_url('admin'); ?>/partner_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Комментарии
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i>  Комментарии
                        </li>                        
                    </ol>                    
                </div>                 
            </div>
            <form action="<?= base_url('admin/fake_comment') ?>" method="POST">
                <table class='col-lg-12 table-bordered table-responsive table'>
                    <tbody>
                    <thead>
                    <th>
                        #id
                    </th>
                    <th class='col-lg-5'>
                        Имя
                    </th>  
                    <th >
                        Фото
                    </th> 
                    <th class='col-lg-4'>
                        Текст
                    </th> 
                    <th class='col-lg-4'>
                        Должность
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
                    if (!empty($fake)) {

                        foreach ($fake as $item) {
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
                                    <input class="form-control" type='text' name="name[<?= $item['id'] ?>]" value="<?= $item['user_name'] ?>"/>                               
                                </td>
                                <td>
                                    <img src="<?= $item['photo_path'] ?>" width='100' alt="">                       
                                </td>
                                <td>
                                    <textarea rows='9' class="form-control"  name="text[<?= $item['id'] ?>]"><?= $item['text'] ?></textarea>
                                </td> 
                                <td>
                                    <input class="form-control" type='text' name="office[<?= $item['id'] ?>]" value="<?= $item['office'] ?>"/>                               
                                </td>                                      
                                <td><button class="btn btn-success" type='submit' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></td>
                                <td><button class="btn btn-danger"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-trash-o"></i> Удалить</button></td>
                                <td><button class = "btn btn-default"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>"><?= $btn_name ?></button></td>   
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

