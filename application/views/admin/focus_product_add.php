<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить направление
                        <small>Add focus product</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/focus_product">Направление товаров</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить категорию
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
            
            <div class="col-lg-12 tab_margin_top">               
                <form action="add_focus_product" method="POST" class="form-submit">                    
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="Например Помышленные товары (Максимум 250 символов)" type='text'/>                    
                    <label>Позиция</label>
                    <input class='form-control' name='position' placeholder="<?= count($fpl)+1?>" type='text' disabled=""/>
                    <label>Статус</label>
                    <select class='form-control ' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_focus_product" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
                   
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

