<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Галерея
                        <small>Setting menu</small>
                        <div class="pull-right col-lg-3 col-sm-auto">
                            <a href="<?= base_url('admin'); ?>/add_gallery" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Картинку
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Галерея
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->  

            <div class="col-lg-12 ">  

                <!--NAV START -->


                <form action="edit_gallery_del_hide" method="POST" class="form-submit">
                    <!--TABLE NAV START -->
                    
                    <div class="col-lg-12">

                        <table class='col-lg-6 table-bordered table-responsive table'>
                            <tbody>
                            <thead>
                            <th>
                                #id
                            </th>
                            <th class='col-lg-4'>
                                Название
                            </th>  
                            <th class='col-lg-4'>
                                Картинка
                            </th> 
                            <th class='col-lg-4'>
                              Операции
                            </th>  
                            </thead>
                            <?php                           
                            if (!empty($gallery)) {
                                foreach ($gallery as $item) {
                                    if ($item['status'] == 'enable') {
                                        $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                                    } else {
                                        $btn_name = '<i class = "fa fa-eye"></i> Показать';
                                    }
                                                           
                                    ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $item['id'] ?>                                            
                                        </td>                                        
                                        <td style="vertical-align: middle;"><a href="<?=base_url('admin/gallery_editor/'.$item['id'])?>" class="text-center"><h3><?=$item['name']?></h3></a></td>  
                                        <td style="vertical-align: middle;"><img  src="<?= $item['image_path'] ?>" alt="img" title="post_img" width="250"></td>
                                        <td><a href="<?=base_url('admin/gallery_editor/'.$item['id'])?>" class = "btn btn-success col-lg-12"><i class="fa fa-pencil"></i> Редактировать</a>
                                        <button class="btn btn-danger col-lg-12"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>" ><i class="fa fa-trash-o"></i> Удалить</button>
                                        <button class = "btn btn-default col-lg-12"type = 'submit' name = "status[<?= $item['id'] ?>]" value = "<?= $item['status'] ?>"><?= $btn_name ?></button></td>   
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                    </div> 
                    
                    <!--TABLE NAV END -->
                </form>



            </div> 
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

