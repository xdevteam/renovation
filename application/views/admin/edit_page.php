<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?=$page_inf[0]['name']?>
                        <small><?=$page_inf[0]['link']?></small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/pages">Страницы</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> О нас
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                <!-- about us editor -->
                <form action="<?= base_url('admin/edit_user_page') ?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    <!-- text Wysiwyg editor -->
                    <textarea name="page_editor" id="about_us_editor" cols="45" rows="5" height="200">
                        <?= $current; ?>                        
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('about_us_editor');
                    </script>
                    <!-- end text Wysiwyg editor -->
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="save_user_page" value="<?=$page_inf[0]['link']?>">
                            <i class="fa fa-save"></i> Сохранить
                        </button>
                        <button class="btn btn-danger" type='reset' name="reset" value="">
                            <i class="fa fa-remove"></i> Сбросить
                        </button>
                    </div>
                </form>
<!--                <form action="<?= base_url('admin/edit_about_page') ?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    
                </form>-->
                <!-- end about us editor -->
            </div>         

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

