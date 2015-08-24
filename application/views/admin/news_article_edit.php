<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Редактировать статью
                        <small>Edit article</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/blog_article">Блог</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Редактировать статью
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->
            <div class="col-lg-6 tab_margin_top">               
                <form action="<?=base_url('admin/edit_article_news')?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    <label>Название</label>
                    <input class='form-control' name='name' value="<?= $post_edit[0]['name'] ?>" type='text'/>
                    <input class='form-control' name='id' value="<?= $post_edit[0]['id'] ?>" type='hidden'/>
                    <label>Статус</label>
                    <select class='form-control' name='status'>
                        <?php if ($post_edit[0]['status'] == 'enable') { ?>
                            <option value='enable'>Показывать</option>
                            <option value='disable'>Скрывать</option>
                        <?php } else { ?>
                            <option value='disable'>Скрывать</option>
                            <option value='enable'>Показывать</option>
                        <?php } ?>
                    </select>
                    <!-- text Wysiwyg editor -->
                    <textarea  name="news_page" id="editor1" cols="45" rows="5"><?= $post_edit[0]['news_page'] ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('editor1');
                    </script>
                    <!-- end text Wysiwyg editor -->
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="edit_article_news" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
            </div>
            <div class="col-lg-6 tab_margin_top">   
                <p>
                    <label for="article_description">
                        Цитата <span class="required">*</span>
                    </label>
                    <textarea class="cabinet-form-input" name="article_description" id="article_description"  cols="15" rows="6"><?= $post_edit[0]['article_description'] ?></textarea>
                </p>
                <p>
                    <label for="prod_photo">
                        Фото
                    </label><br>
                    <img src="<?= $post_edit[0]['image_path'] ?>"  width='300' alt="">
                    <input type="hidden" id="old_path" name="image_path" value="<?= $post_edit[0]['image_path'] ?>">    
                    <input type="file" id="prod_photo_1" name="prod_photo_1" accept="image/*">                   
                </p>
            </div>      
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


