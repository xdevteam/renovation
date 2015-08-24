<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить Новость
                        <small>Add news</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/news_article">Новости</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Добавить новость
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-6 tab_margin_top">               
                <form action="add_article_news" method="POST" class="form-submit" enctype="multipart/form-data">
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="(Максимум 250 символов)" type='text'/>

                    <label>Статус</label>
                    <select class='form-control' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    

                    <!-- text Wysiwyg editor -->
                    <textarea  name="blog_page" id="editor1" cols="45" rows="5"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('editor1');
                    </script>
                    <!-- end text Wysiwyg editor -->
                   
                    <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="add_news" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
            </div>



            <div class="col-lg-6 tab_margin_top">   



                <p>
                    <label for="article_description">
                        Цитата <span class="required">*</span>
                    </label>
                    <textarea class="cabinet-form-input" name="article_description" id="article_description" cols="15" rows="6"></textarea>
                </p>

                <p>
                    <label for="prod_photo">
                        Фото
                    </label>
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


