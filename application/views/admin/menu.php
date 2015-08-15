<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Управление меню
                        <small>Setting menu</small>
                        <div class="pull-right col-lg-3 col-sm-auto">
                            <a href="<?= base_url('admin'); ?>/menu_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Пункт Меню
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Управление меню
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->  

            <div class="col-lg-12 ">  

                <!--NAV START -->


                <form action="edit_menu" method="POST" class="form-submit">
                    <!--TABLE NAV START -->
                    <div class="row">               
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Меню 
                                <small>Menu </small>
                            </h1>  
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>Меню 
                                </li>                        
                            </ol>                    
                        </div>                 
                    </div>
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
                                Ccылка
                            </th> 
                            <th class='col-lg-4'>
                              Операции
                            </th>  
                            </thead>
                            <?php
                            if (!empty($fst_level)) {
                                foreach ($fst_level as $item) {
                                    if ($item['status'] == 'enable') {
                                        $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                                    } else {
                                        $btn_name = '<i class = "fa fa-eye"></i> Показать';
                                    }
                                    if ($item['owner'] == 'admin') {
                                        $dis = 'disabled';
                                    } else {
                                        $dis = '';
                                    }                                   
                                    ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $item['id'] ?> 
                                            <input  type='text' name="link[<?= $item['id'] ?>]" value="<?= $item['link'] ?>" hidden=""/>
                                            <input  type='text' name="parent[<?= $item['id'] ?>]" value="<?= $item['p_id'] ?>" hidden=""/>
                                            <input  type='text' name="parent2[<?= $item['id'] ?>]" value="<?= $item['p_id2'] ?>" hidden=""/>
                                        </td>                                        
                                        <td style="vertical-align: middle;"><input class="form-control " type='text' name="name[<?= $item['id'] ?>]" value="<?= $item['name'] ?>"/></td>  
                                        <td style="vertical-align: middle;"><input  type='text' class="form-control" name="link[<?= $item['id'] ?>]" value="<?= $item['link'] ?>" disabled="disabled"></td>
                                        <td><button class="btn btn-success col-lg-12" type='submit' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button>
                                        <button class="btn btn-danger col-lg-12"type='submit' name="delete[<?= $item['id'] ?>]" value="<?= $item['id'] ?>" <?= $dis ?>><i class="fa fa-trash-o"></i> Удалить</button>
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

