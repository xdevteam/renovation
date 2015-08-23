<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить слайд
                        <small>Add slide</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/slider">Cлайдер</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить слайд
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-6 tab_margin_top">               
                <form action="<?= base_url('admin/slide_add') ?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    <p>
                        <label for="header1">Заглавие(белый)
                        </label>
                        <input type="text" name="header1"  class="cabinet-form-input">
                        <label for="header2">Заглавие(синий)
                        </label>
                        <input type="text" name="header2"  class="cabinet-form-input">
                    </p>
                    <p>                                            
                        <label>Текст на Слайде</label>
                        <textarea class='form-control' name='text' type='text' rows="8"></textarea>       
                    </p> 
                    <p>                                            
                        <label>Эффект текста</label>
                        <select name="position" class="form-control">
                            <option value="style1">Эффект 1</option> 
                            <option value="style2">Эффект 2</option>
                            <option value="style3">Эффект 3</option>    
                        </select>     
                    </p> 
                    <p>
                        <label>Статус</label>
                        <select class='form-control ' name='status'>
                            <option value='enable'>Показывать</option>
                            <option value='disable'>Скрывать</option>
                        </select>
                    </p>           

                    <label>Cлайд</label>
                    <input class='' name='prod_photo'  type='file'/>  
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="slide_add" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
            </div>        

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


