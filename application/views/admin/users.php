<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Пользователи
                        <small>Users</small>
                        <div class="pull-right col-lg-4 col-sm-auto">
                            <a href="<?= base_url('admin'); ?>/user_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                                <span class="btn-label icon fa fa-plus"></span>
                                Добавить Пользователя
                            </a>
                        </div>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Пользователи
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                <table class='col-lg-12 table-bordered table-responsive table'>
                    <tbody>
                    <thead>
                    <th>
                        #id
                    </th>
                    <th>
                        Фамилия 
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Отчество
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Тип Пользователя
                    </th>                    
                    </thead>
                    <?php
                    if (!empty($user)) {
                        foreach ($user as $item) {
                            ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['surname'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['patronymic'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td>
                                    <select  class="form-control" name='user_type'>
                                        <?php
                                        if ($item['user_type'] == 'cm') {
                                            ?>
                                            <option value="cm">Контент менеджер</option>
                                            <option value="bloger">Блогер</option>
                                            <option value="admin">Администратор</option>
                                            <?php
                                        } elseif ($item['user_type'] == 'admin') {
                                            ?>
                                            <option value="admin">Администратор</option>
                                            <option value="cm">Контент менеджер</option>
                                            <option value="bloger">Блогер</option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="bloger">Блогер</option>
                                            <option value="admin">Администратор</option>
                                            <option value="cm">Контент менеджер</option>
                                            <?php
                                        }
                                        ?>                                        
                                    </select>


                                </td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

