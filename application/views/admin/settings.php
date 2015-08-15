<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Настройки
                        <small>Settings</small>                        
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i>  Настройки
                        </li>                        
                    </ol>                    
                </div>                 
            </div>
            <form action="<?= base_url('admin/edit_setting') ?>" method="POST">
                <table class='col-lg-12 table-bordered table-responsive table'>
                    <tbody>
                    <thead>                   
                    <th class='col-lg-3'>
                        Параметр
                    </th>
                    <th class='col-lg-8'>
                        Значение
                    </th> 
                    <th class='col-lg-1'>
                        Редактировать
                    </th>
                    </thead>
                    <?php
                    foreach ($settings as $item) {
                        ?>
                        <tr>
                            <td>
                                <label><?= $item['name'] ?></label>                    
                            </td>
                            <td>
                                <input class="form-control" type='text' name="set[<?= $item['id'] ?>]" value="<?= $item['value'] ?>"/>                               
                            </td>                                         
                            <td><button class="btn btn-success" type='submit' name="edit[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"><i class="fa fa-pencil"></i> Редактировать</button></td>
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



