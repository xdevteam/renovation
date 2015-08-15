<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Все Статьи
                        <small>All posts</small>
                        <div class="col-lg-3 col-sm-auto pull-right">
                            <a href="<?= base_url('admin'); ?>/blog_article_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Пост
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Блог
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
      

            <div class="col-lg-12 tab_margin_top">               
                <form action="<?=base_url('admin/edit_article')?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    <table class='col-lg-12 table-bordered table-responsive table'>
                        <tbody>
                        <thead>
                        <th>
                            #id
                        </th>
                        <th class='col-lg-6'>
                            Название
                        </th>
                        <th class=''>
                            Фото
                        </th>                        

                        <th class=''>
                            Редактировать
                        </th>  
                        <th class=''>
                            Удалить
                        <th class=''>                    
                            Скрыть
                        </th>  
                        </thead>
                        <?php
                        if (!empty($post)) {
                            foreach ($post as $item) {
                                if ($item['status'] == 'enable') {
                                    $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                                } else {
                                    $btn_name = '<i class = "fa fa-eye"></i> Показать';
                                }
                                ?>
                                <tr>
                                    <td><?= $item['id'] ?> <input class="" type='checkbox' name="id[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"/></td>
                                    <td><input class="form-control" type='text' name="cat[<?= $item['id'] ?>]" value="<?= $item['name'] ?>"/></td>
                                    <td>
                                        <img src='<?= $item['image_path'] ?>' width="70" height="50"alt="">
                                        <div style="opacity: 0; margin-top: -50px;" >
                                            <input type="file" name="prod_photo<?= $item['id'] ?>" style='height: 52px;' class='col-lg-12'>
                                            <input type="hidden" name='old_path[<?= $item['id'] ?>]' value='<?= $item['image_path'] ?>'>
                                        </div>
                                    </td>                             

                                    <td><a href="<?=base_url('admin/blog_article_edit/'.$item['id'])?>"><button class="btn btn-success" type='button'  value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></a></td>
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

