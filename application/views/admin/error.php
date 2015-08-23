<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        ОШИБКА!
                        <small>Error!</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> ОШИБКА
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->  
            <div class="row ">                
                <div  class="col-lg-3"></div>
                <div  class="col-lg-6">
                    <img src="../../../img/error3.png" class="col-lg-12" alt=""/>
                    <h3><?= $error; ?></h3> 
                </div>
                <div  class="col-lg-3"></div>
            </div>

        </div> 
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

