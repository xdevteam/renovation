<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Редактировать категорию
                        <small>Edit category</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/category">Категории</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>Редактировать категорию 
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->           
            <div class="col-lg-12 tab_margin_top">               
                <form action="<?= base_url('admin') ?>/edit_category/<?= $category[0]['id'] ?>" method="POST" class="form-submit"enctype="multipart/form-data" >                    
                    <label>Название</label>
                    <input class='form-control' name='name'  value="<?= $category[0]['name'] ?>" type='text'/>
                    <label>Ссылка</label>
                    <input class='form-control' name='link'  value="<?= $category[0]['link'] ?>" type='text'/>                    

                    <p>
                        <label for="description">
                            Описание <span class="required">*</span>
                        </label>                        
                        <textarea class="cabinet-form-input" name="description" id="prod_description" cols="15" rows="6"><?= $category[0]['description'] ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('prod_description');
                        </script>
                    </p>
                    <img src="<?= $category[0]['image_path'] ?>" alt="" width="250">
                    <input class='form-control' name='path'  value="<?= $category[0]['image_path'] ?>" type='hidden'/>    
                    <p>
                        <label for="prod_photo">
                            Фото
                        </label>
                        <input type="file" id="prod_photo_1" name="prod_photo" accept="image/*">                       
                    </p>
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="edit" value=""><i class="fa fa-save"></i> Сохранить</button>
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




